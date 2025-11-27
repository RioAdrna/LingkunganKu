<style>
  /* Reset any stray inline weirdness */
  .card-body a {
    text-decoration: none;
  }

  /* Map area responsive */
  #map-container {
    width: 100%;
    min-height: 300px;
    height: 70vh;
    overflow: hidden;
    /* fleksibel */
  }

  #map {
    width: 100%;
    height: 100%;
  }

  #map-detail {
    margin: -500px;
    transition: margin 0.4s ease-in-out;
  }

  /* control area */
  #control-map {
    width: 100%;
  }

  /* sample map thumbnail */
  .sample-map {
    width: 100%;
    height: 100px;
    overflow: hidden;
    border-radius: 6px;
  }

  .sample-map img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }

  /* make filter row use flex for first row (so tombol tetap di kanan) */
  .filter-row {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    align-items: flex-end;
  }

  .filter-row .filter-item {
    flex: 1 1 220px;
    min-width: 160px;
  }

  .filter-row .filter-button {
    flex: 0 0 auto;
  }

  /* second row uses bootstrap columns but keep gaps tidy */
  .filter-row-2 {
    margin-top: .5rem;
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
  }

  .filter-row-2 .filter-item-2 {
    flex: 1 1 220px;
    min-width: 160px;
  }

  /* small tweaks */
  .form-label {
    font-weight: 600;
  }

  .btn-tampilkan {
    padding: 8px 18px;
    font-weight: 600;
    border-radius: 8px;
    white-space: nowrap;
  }

  /* ensure popups don't overflow on small screens */
  .leaflet-popup-content {
    word-wrap: break-word;
  }

  /* responsive height adjustments */
  @media (max-width: 992px) {
    #map-container {
      height: 60vh;
    }
  }

  @media (max-width: 768px) {
    #map-container {
      height: 50vh;
    }
  }

  @media (max-width: 576px) {
    #map-container {
      height: 45vh;
    }
  }
</style>

<body>

  <div class="container-fluid py-3">
    <div class="row">
      <div class="col-12">
        <div class="card shadow-sm">
          <div class="card-header border-2">
            <div class="d-flex align-items-center">
              <div class="me-2"><i class="fas fa-route"></i></div>
              <div>
                <h6 class="mb-0">Peta Laporan</h6>
              </div>
            </div>
          </div>
          <div class="card-body">

            <!-- CONTROL (responsive) -->
            <div id="control-map">

              <!-- first row: Kategori | Dari | Sampai | Tampilkan (ke kanan) -->
              <div class="filter-row" role="group" aria-label="filter-row">
                <div class="filter-item">
                  <label class="form-label">Kategori</label>
                  <div class="input-group">
                    <span class="input-group-text bi bi-tags"></span>
                    <input id="kategori_selector" type="text" class="form-control" readonly value="Tampilkan semua"
                      data-bs-toggle="modal" data-bs-target="#kategori-modal" style="cursor:pointer;">
                  </div>
                </div>

                <div class="filter-item">
                  <label class="form-label">Dari tanggal</label>
                  <div class="input-group">
                    <span class="input-group-text bi bi-calendar"></span>
                    <input id="tanggal_awal" type="date" class="form-control" onchange="limitDate(this)">
                  </div>
                </div>

                <div class="filter-item">
                  <label class="form-label">Sampai tanggal</label>
                  <div class="input-group">
                    <span class="input-group-text bi bi-calendar-check"></span>
                    <input id="tanggal_akhir" type="date" class="form-control">
                  </div>
                </div>
              </div>

              <!-- second row with selects -->
              <div class="filter-row-2 mt-3">

                <div class="filter-item-2">
                  <label class="form-label">Kabupaten / Kota</label>
                  <div class="input-group">
                    <span class="input-group-text bi bi-buildings"></span>
                    <select id="kabkot_id" class="form-select">
                      <option value="">Semua Wilayah</option>
                      <!-- php server side options preserved -->
                      <?php foreach ($kabkot as $val) { ?>
                        <option value="<?= $val->id ?>"><?= $val->nama ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="filter-item-2">
                  <label class="form-label">Tingkat Keparahan</label>
                  <div class="input-group">
                    <span class="input-group-text bi bi-bar-chart"></span>
                    <select id="tingkat_keparahan" class="form-select">
                      <option value="">Semua Tingkat</option>
                      <option value="1">Level 1</option>
                      <option value="2">Level 2</option>
                      <option value="3">Level 3</option>
                      <option value="4">Level 4</option>
                      <option value="5">Level 5</option>
                    </select>
                  </div>
                </div>

                <div class="filter-item-2">
                  <label class="form-label">Status</label>
                  <div class="input-group">
                    <span class="input-group-text bi bi-question-diamond"></span>
                    <select id="status" class="form-select">
                      <option value="">Tampilkan Semua</option>
                      <option value="belum ditangani">belum ditangani</option>
                      <option value="ditugaskan">ditugaskan</option>
                      <option value="sudah ditangani">sudah ditangani</option>
                      <option value="selesai">selesai</option>
                      <option value="ditolak">ditolak</option>
                    </select>
                  </div>
                </div>

                <div class="filter-button">
                  <button id="btnTampilkanTop" style="height: 100%; width: 100%" type="button" class="btn btn-primary btn-tampilkan" onclick="showPins()">Tampilkan</button>
                </div>
              </div>

              <div class="filter-item-2 mt-3">
                <label class="form-label">Gaya Peta</label>
                <div class="input-group">
                  <span class="input-group-text bi bi-map"></span>
                  <input id="gaya_peta_selector" type="text" class="form-control" readonly value="Humanitarian"
                    data-bs-toggle="modal" data-bs-target="#gaya-peta-modal" style="cursor:pointer;">
                </div>
              </div>

            </div>

            <hr />

            <!-- MAP -->
            <div id="map-container" class="d-flex align-items-center">
              <div id="map"></div>
              <div class="card text-start" id="map-detail" style="background: rgba(255, 255, 255, 0.8); width:250px; max-height: 65vh; overflow: auto; position: absolute; z-index: 1000; right: 40px">
                <div class="card-body">
                  <div class="d-flex flex-row justify-content-between">
                    <h5 class="card-title" id="title-kabkot">Title</h5>
                    <button type="button" class="btn-close" onclick="$('#map-detail').css('margin-right', '-500px')"></button>
                  </div>
                  <b>Keseluruhan</b><br>
                  <table style="font-size:12px">
                    <tr>
                      <td>Jumlah laporan</td>
                      <td> : </td>
                      <td id="detail-jumlah_laporan"></td>
                    </tr>
                    <tr>
                      <td>Tingkat keparahan</td>
                      <td> : </td>
                      <td id="detail-rata_rata_keparahan"></td>
                    </tr>
                    <tr>
                      <td>Kategori terbanyak</td>
                      <td> : </td>
                      <td id="detail-kategori_terbanyak"></td>
                    </tr>
                  </table><br>
                  <b>Tujuh hari terakhir</b><br>
                  <table style="font-size:12px">
                    <tr>
                      <td>Jumlah laporan</td>
                      <td> : </td>
                      <td id="detail-jumlah_laporan_7"></td>
                    </tr>
                    <tr>
                      <td>Tingkat keparahan</td>
                      <td> : </td>
                      <td id="detail-rata_rata_keparahan_7"></td>
                    </tr>
                    <tr>
                      <td>Kategori terbanyak</td>
                      <td> : </td>
                      <td id="detail-kategori_terbanyak_7"></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>

            <!-- MODALS (kategori + gaya peta) kept mostly same structure -->
            <div class="modal fade" id="kategori-modal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Pilih kategori yang ingin ditampilkan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" id="kategori-modal-body">
                    <div class="mb-2">
                      <input type="checkbox" id="kat-semua" class="checkbox" checked onclick="toggleAllCheckboxes(this)">
                      <label for="kat-semua">Tampilkan semua</label>
                    </div>
                    <div class="row" id="kategori-checkbox-list">
                      <?php foreach ($kategori_laporan as $kategori) { ?>
                        <div class="col-6">
                          <input type="checkbox" value="<?= $kategori->id_kategori ?>|<?= $kategori->nama_kategori ?>"
                            id="kat-<?= $kategori->id_kategori ?>" class="checkbox item_checkbox" checked onclick="verifyCheckbox()">
                          <label for="kat-<?= $kategori->id_kategori ?>"><?= $kategori->nama_kategori ?></label>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="confirmSelectionCheckboxes()">Konfirmasi</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade" id="gaya-peta-modal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Pilih Gaya Peta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" id="gaya-peta-modal-body">
                    <div id="gaya-peta-row" class="d-flex flex-wrap" style="gap:12px"></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="selectGayaPeta()">Konfirmasi</button>
                  </div>
                </div>
              </div>
            </div>

          </div> <!-- card-body -->
        </div> <!-- card -->
      </div>
    </div>
  </div>

  <!-- SCRIPTS -->
  <script src="<?= base_url('assets/vendor/jquery/dist/jquery.min.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <script src="https://unpkg.com/leaflet.markercluster/dist/leaflet.markercluster.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@turf/turf@6/turf.min.js"></script>
  <script src="https://unpkg.com/leaflet.vectorgrid@latest/dist/Leaflet.VectorGrid.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      confirmSelectionCheckboxes();

      // If URL contains lat/long put marker
      const params = new URLSearchParams(window.location.search);
      const lat = params.get('latitude');
      const long = params.get('longitude');
      if (lat && long) {
        // wait map init
        setTimeout(() => {
          L.marker([lat, long]).addTo(map);
        }, 500);
      }

      // invalidateSize on resize so leaflet redraws correctly
      window.addEventListener('resize', () => {
        setTimeout(() => map.invalidateSize(), 200);
      });
    });

    $(document).ready(() => {
      confirmSelectionCheckboxes();
    });

    loadSample();

    var map = L.map('map').setView([-6.9, 107.6], 11); // posisi awal (misal: Bandung)

    // Semua daftar tile layer
    var baseLayers = {
      "osm": L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '© OSM'
        }
      ),
      "opentopomap": L.tileLayer(
        'https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
          attribution: '© OpenTopoMap'
        }
      ),
      "cyclosm": L.tileLayer(
        'https://{s}.tile-cyclosm.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', {
          maxZoom: 18,
          attribution: '© OpenStreetMap contributors'
        }),
      "humanitarian": L.tileLayer(
        'https://a.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
          maxZoom: 18,
          attribution: '© OpenStreetMap contributors'
        })
    };

    // Pasang default layer
    baseLayers["humanitarian"].addTo(map);

    // L.vectorGrid.protobuf('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    //     vectorTileLayerStyles: {
    //         buildings: {
    //             fill: true,
    //             weight: 1,
    //             fillColor: "#666",
    //             fillOpacity: 0.6
    //         }
    //     }
    // }).addTo(map);


    let endpoint = "<?= base_url("/map/show_pin") ?>";
    let showList = [];
    var markerGroup = L.markerClusterGroup();

    function selectGayaPeta() {
      const radio = document.querySelectorAll('.item_radio');
      for (let i = 0; i < radio.length; i++) {
        if (radio[i].checked) {
          var value = radio[i].value;

          // Hapus semua layer base terlebih dahulu
          Object.values(baseLayers).forEach(layer => map.removeLayer(layer));

          // Tambahkan basemap baru sesuai pilihan
          baseLayers[value].addTo(map);
          document.querySelector('#gaya_peta_selector').value = capitalizeFirstLetter(value);
          break;
        }
      }
    }

    function loadSample() {
      var sample = {
        "osm": "https://c.tile.openstreetmap.org/9/409/265.png",
        "opentopomap": "https://c.tile.opentopomap.org/9/409/265.png",
        "cyclosm": "https://c.tile-cyclosm.openstreetmap.fr/cyclosm/9/409/265.png",
        "humanitarian": "https://a.tile.openstreetmap.fr/hot/9/409/265.png"
      };
      Object.entries(sample).forEach(([key, value]) => {
        document.getElementById("gaya-peta-row").innerHTML +=
          `<div class="col-sm-6 row mt-3">
                        <div class="col-sm-1 d-flex align-items-center">
                            <input type="radio" value="${key}" id="peta-${key}"
                                class="radio item_radio" name="gaya_peta" ${key == 'humanitarian' ? 'checked' : ''}>
                        </div>
                        <div class="col-sm-11">
                            <h4>${capitalizeFirstLetter(key)}</h4>
                            <div class="sample-map">
                                <img src="${value}" style="object-fit:cover;">
                            </div>
                        </div>
                    </div>`;
      });
    }

    function capitalizeFirstLetter(str) {
      if (typeof str !== 'string' || str.length === 0) {
        return str; // Handle empty strings or non-string inputs
      }
      return str.charAt(0).toUpperCase() + str.slice(1);
    }

    function limitDate(context) {
      if (context.value == "") return;
      $('#tanggal_akhir').attr("min", context.value);

      const t1 = new Date(context.value);
      if ($('#tanggal_akhir').val() == "") return;
      const t2 = new Date($('#tanggal_akhir').val());

      if (t1 > t2) $('#tanggal_akhir').val("");
    }

    function showPins() {
      console.log("ngelog" + document.getElementById("tanggal_akhir").value);
      $.ajax({
        url: endpoint, // <-- GANTI DENGAN URL ENDPOINT ANDA
        type: "POST",
        data: {
          kategori_id: showList,
          tanggal_awal: document.getElementById("tanggal_awal").value,
          tanggal_akhir: document.getElementById("tanggal_akhir").value,
          kabkot_id: document.getElementById("kabkot_id").value,
          tingkat_keparahan: document.getElementById("tingkat_keparahan").value,
          status: document.getElementById("status").value,
        },
        dataType: "json",
        success: function(response) {
          markerGroup.clearLayers();
          console.log(response);
          response.data.forEach(function(value, index) {
            if (value.latitude == null || value.longitude == null) return;
            L.marker([value.latitude, value.longitude], {
                icon: coloredIcon(value.icon, value.tingkat_keparahan ?? 1)
              })
              .bindPopup(`
                                <b style="font-size: 17px">${value.nama_kategori}</b><br>
                                <table class="mb-2" style="font-size: 11px">
                                    <tr>
                                        <td>Level</td>
                                        <td>: </td>
                                        <td>${value.tingkat_keparahan}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>: </td>
                                        <td>${value.status}</td>
                                    </tr>
                                </table>
                                ${value.deskripsi}
                            `)
              .addTo(markerGroup);
          });
          map.addLayer(markerGroup);
          // map.fitBounds(geoLayer.getBounds());
        },
        error: function(xhr, status, error) {
          console.error("AJAX Error:", error);
          alert("Terjadi kesalahan, coba lagi nanti");
        }
      });
    }

    function verifyCheckbox() {
      const checkboxes = document.querySelectorAll('.item_checkbox');
      let all_checked = true;
      for (let i = 0; i < checkboxes.length; i++) {
        if (!checkboxes[i].checked) {
          all_checked = false;
          break;
        }
      }

      document.querySelector("#kat-semua").checked = all_checked;
    }

    function confirmSelectionCheckboxes() {
      showList = [];
      let dText = "";
      document.querySelector("#kategori_selector").value = "";
      const checkboxes = document.querySelectorAll('.item_checkbox');
      for (let i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked || document.querySelector("#kat-semua").checked) {
          showList.push(checkboxes[i].value.split("|")[0]);
          dText += checkboxes[i].value.split("|")[1] + ", ";
        }
      }
      if (document.querySelector("#kat-semua").checked) {
        document.querySelector("#kategori_selector").value = "Tampilkan semua";
      } else {
        document.querySelector("#kategori_selector").value = dText;
      }
      console.log(showList);
    }

    function toggleAllCheckboxes(source) {
      const checkboxes = document.querySelectorAll('.item_checkbox');
      for (let i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = source.checked;
      }
    }

    function coloredIcon(image, level) {
      const keparahan = [
        "#00eeffff",
        "#23e41cff",
        "#FCD34D",
        "#FB923C",
        "#EF4444"
      ];
      const markerHtmlStyles = `
                width: 100%;
            `;
      const levelHtmlStyles = `
                background-color: ${keparahan[level - 1]};
                box-shadow: 0px 0px 10px 0.5px rgba(0, 0, 0, 0.35);
                width: 1rem;
                height: 1rem;
                border-radius: 1rem;
                position: absolute;
                margin-left: 2rem;
            `;
      return new L.divIcon({
        className: "my-custom-pin",
        iconAnchor: [0, 24],
        labelAnchor: [-6, 0],
        popupAnchor: [0, -36],
        html: `
                <div class="d-flex" style="width: 3rem">
                    <img style="${markerHtmlStyles}" src="<?= base_url('assets/img/map/') ?>${image}">
                    <div style="${levelHtmlStyles}"></div>
                </div>
                `
      });
    }
    // Inisialisasi peta

    const colors = [
      "#e6194b", "#3cb44b", "#ffe119", "#4363d8", "#f58231", "#911eb4", "#46f0f0",
      "#f032e6", "#bcf60c", "#fabebe", "#008080", "#e6beff", "#9a6324", "#fffac8",
      "#800000", "#aaffc3", "#808000", "#ffd8b1", "#000075", "#808080", "#ffd700",
      "#6495ed", "#20b2aa", "#ff69b4", "#ff4500", "#2e8b57", "#9932cc"
    ];

    const jlapreg = JSON.parse('<?= $jumlah_laporan_average ?>');
    const kater = JSON.parse('<?= $kategori_terbanyak ?>');
    const jlapreg7 = JSON.parse('<?= $jumlah_laporan_average_7 ?>');
    const kater7 = JSON.parse('<?= $kategori_terbanyak_7 ?>');

    console.log(jlapreg);
    console.log(kater);
    console.log(kater7);

    let geoData;

    fetch('<?= base_url("/assets/geojson/Jabar_By_Kab.geojson") ?>')
      .then(response => response.json())
      .then(data => {
        geoData = data;
        L.geoJSON(data, {
          style: function(feature) {
            const idx = feature.properties.OBJECTID - 1 || 0; // pastikan setiap feature punya id unik (0–26)
            return {
              color: "black",
              weight: 0,
              fillColor: "#00c8faff",
              fillOpacity: 0.15
            };
          }
        }).addTo(map);
        map.fitBounds(L.geoJSON(data).getBounds());
      });

    let layer = L.geoJSON(null).addTo(map);

    map.on("click", (e) => {
      var point = turf.point([e.latlng.lng, e.latlng.lat]);

      var feature = null;

      // cari feature yg berisi titik klik

      geoData.features.forEach(feat => {
        if (turf.booleanPointInPolygon(point, feat)) {
          feature = feat;
        }
      });

      // Tidak ada wilayah cocok
      if (!feature) {
        layer.clearLayers();
        return;
      }

      // Bersihkan polygon sebelumnya
      layer.clearLayers();

      // Tampilkan polygon yg diklik
      layer.addData(feature);

      const nama = feature.properties.nama || feature.properties.KABKOT || "Wilayah tanpa nama";
      let jumlah_laporan = 0;
      let rata_rata_keparahan = 0;
      let kategori_terbanyak = "-";
      let kategori_count = 0;

      let jumlah_laporan_7 = 0;
      let rata_rata_keparahan_7 = 0;
      let kategori_terbanyak_7 = "-";
      let kategori_count_7 = 0;
      let arrow = "";

      for (let i = 0; i < jlapreg.length; i++) {
        if (jlapreg[i].geojson_id == feature.properties.OBJECTID) {
          jumlah_laporan = jlapreg[i].jumlah_laporan;
          rata_rata_keparahan = parseFloat(
            jlapreg[i].rata_rata_keparahan.toString()
          ).toFixed(2).toString().replace(".", ",");
          break;
        }
      }

      for (let i = 0; i < kater.length; i++) {
        if (kater[i].geojson_id == feature.properties.OBJECTID) {
          if (kater[i].jumlah_laporan > kategori_count) {
            kategori_terbanyak = kater[i].nama_kategori;
            kategori_count = kater[i].jumlah_laporan;
          }
        }
      }

      for (let i = 0; i < jlapreg7.length; i++) {
        if (jlapreg7[i].geojson_id == feature.properties.OBJECTID) {
          jumlah_laporan_7 = jlapreg7[i].jumlah_laporan;
          rata_rata_keparahan_7 = parseFloat(
            jlapreg7[i].rata_rata_keparahan.toString()
          ).toFixed(2).toString().replace(".", ",");
          break;
        }
      }

      for (let i = 0; i < kater7.length; i++) {
        if (kater7[i].geojson_id == feature.properties.OBJECTID) {
          if (kater7[i].jumlah_laporan > kategori_count_7) {
            kategori_terbanyak_7 = kater7[i].nama_kategori;
            kategori_count_7 = kater7[i].jumlah_laporan;
          }
        }
      }


      if (rata_rata_keparahan_7 < rata_rata_keparahan) {
        arrow = '<i class="bi bi-arrow-down-right text-success"></i>'
      } else if (rata_rata_keparahan_7 > rata_rata_keparahan) {
        arrow = '<i class="bi bi-arrow-up-right text-danger"></i>'
      } else {
        arrow = '<i class="bi bi-dash-lg text-success"></i>'
      }

      const info = `
                        <div>
                            <h6>${nama}</h6>
                            <a href="#summon" onclick="$('#map-detail').css('margin-right', '0px')">Klik untuk melihat detail</a>                     
                        </div>
                        `;

      $("#title-kabkot").html(nama);
      $("#detail-jumlah_laporan").html(jumlah_laporan);
      $("#detail-rata_rata_keparahan").html(rata_rata_keparahan);
      $("#detail-kategori_terbanyak").html(kategori_terbanyak);

      $("#detail-jumlah_laporan_7").html(jumlah_laporan_7);
      $("#detail-rata_rata_keparahan_7").html(rata_rata_keparahan_7 + arrow);
      $("#detail-kategori_terbanyak_7").html(kategori_terbanyak_7);

      var centroid = turf.center(feature).geometry.coordinates;



      L.popup()
        .setLatLng([centroid[1], centroid[0]])
        .setContent(info)
        .openOn(map);

      let bond = layer.getBounds();
      map.fitBounds(bond);

    });
  </script>
</body>