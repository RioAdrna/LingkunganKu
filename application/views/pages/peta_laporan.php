<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <title>Peta Laporan - LingkunganKu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap (opsional, sesuai proyek) -->
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.min.css") ?>">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <!-- MarkerCluster CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.Default.css" />

    <style>
        /* Style umum */
        #map {
            height: 700px;
            width: 100%;
            border-radius: 4px;
        }

        .sample-map {
            height: 100px;
            width: 100%;
            overflow: hidden;
            border-radius: 4px;
        }

        .sample-map img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            display: block;
        }

        #control-map {
            margin-bottom: 1rem;
        }

        /* Tooltip / popup styling kecil (opsional) */
        .wilayah-label {
            font-weight: 700;
            font-size: 18px;
            color: #222;
        }

        /* Responsive kecil */
        @media (max-width: 575px) {
            #map {
                height: 400px;
            }
        }
    </style>
</head>

<body>
    <div class="content p-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header border-2">
                    <div class="row align-items-center">
                        <div class="col-12 col-sm-8">
                            <h6 class="mb-0"><i class="fas fa-route"></i>&nbsp; Peta Laporan</h6>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Kontrol Pencarian / Filter -->
                    <div id="control-map" class="mb-3">
                        <div class="row g-2">
                            <div class="col-sm-4">
                                <label class="form-label">Kategori</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-tags"></i></span>
                                    <input type="text" id="kategori_selector" value="Tampilkan semua" class="form-control" readonly
                                        data-bs-toggle="modal" data-bs-target="#kategori-modal" style="cursor:pointer;">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label class="form-label">Dari tanggal</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                    <input type="date" id="tanggal_awal" class="form-control" onchange="limitDate(this)">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label class="form-label">Sampai tanggal</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-calendar-check"></i></span>
                                    <input type="date" id="tanggal_akhir" class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-2 d-grid">
                                <label class="form-label d-block">&nbsp;</label>
                                <button type="button" class="btn btn-primary" onclick="showPins()">Tampilkan</button>
                            </div>
                        </div>

                        <div class="row g-2 mt-2">
                            <div class="col-sm-4">
                                <label class="form-label">Kabupaten / Kota</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-buildings"></i></span>
                                    <select class="form-select" id="kabkot_id">
                                        <option value="">Semua Wilayah</option>
                                        <?php foreach ($kabkot as $val) { ?>
                                            <option value="<?= $val->id ?>"><?= $val->nama ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label class="form-label">Tingkat Keparahan</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-bar-chart"></i></span>
                                    <select class="form-select" id="tingkat_keparahan">
                                        <option value="">Semua Tingkat</option>
                                        <option value="1">Level 1</option>
                                        <option value="2">Level 2</option>
                                        <option value="3">Level 3</option>
                                        <option value="4">Level 4</option>
                                        <option value="5">Level 5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label class="form-label">Status</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-question-diamond"></i></span>
                                    <select class="form-select" id="status">
                                        <option value="">Tampilkan Semua</option>
                                        <option value="belum ditangani">belum ditangani</option>
                                        <option value="ditugaskan">ditugaskan</option>
                                        <option value="sudah ditangani">sudah ditangani</option>
                                        <option value="selesai">selesai</option>
                                        <option value="ditolak">ditolak</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <label class="form-label">Gaya Peta</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-map"></i></span>
                                    <input type="text" id="gaya_peta_selector" value="Humanitarian" class="form-control" readonly
                                        data-bs-toggle="modal" data-bs-target="#gaya-peta-modal" style="cursor:pointer;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Peta -->
                    <div id="map"></div>

                    <!-- Modal Pilih Kategori -->
                    <div class="modal fade" id="kategori-modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Pilih kategori yang ingin ditampilkan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-2">
                                        <input type="checkbox" id="kat-semua" class="checkbox" checked onclick="toggleAllCheckboxes(this)">
                                        <label for="kat-semua">Tampilkan semua</label>
                                    </div>
                                    <div class="row">
                                        <?php foreach ($kategori_laporan as $kategori) { ?>
                                            <div class="col-sm-6 mb-2">
                                                <input type="checkbox" value="<?= $kategori->id_kategori ?>|<?= $kategori->nama_kategori ?>"
                                                    id="kat-<?= $kategori->id_kategori ?>" class="checkbox item_checkbox" onclick="verifyCheckbox()" checked>
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

                    <!-- Modal Pilih Gaya Peta -->
                    <div class="modal fade" id="gaya-peta-modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Pilih Gaya Peta</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row" id="gaya-peta-row"></div>
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

    <!-- JS dependencies -->
    <script src="<?= base_url('assets/vendor/jquery/dist/jquery.min.js') ?>"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet.markercluster/dist/leaflet.markercluster.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@turf/turf@6/turf.min.js"></script>
    <script src="https://unpkg.com/leaflet.vectorgrid@latest/dist/Leaflet.VectorGrid.js"></script>

    <!-- Bootstrap JS (opsional) -->
    <script src="<?= base_url("assets/js/core/popper.min.js") ?>"></script>
    <script src="<?= base_url("assets/js/core/bootstrap.min.js") ?>"></script>

    <script>
        // Variabel global
        const endpoint = "<?= base_url("/map/show_pin") ?>"; // endpoint untuk mengambil pins
        let showList = []; // kategori yg dipilih
        let markerGroup = L.markerClusterGroup();
        let geoData = null;

        // Inisialisasi map
        const map = L.map('map').setView([-6.9, 107.6], 11);

        const baseLayers = {
            "osm": L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '© OSM' }),
            "opentopomap": L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', { attribution: '© OpenTopoMap' }),
            "cyclosm": L.tileLayer('https://{s}.tile-cyclosm.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', { maxZoom: 18, attribution: '© OpenStreetMap contributors' }),
            "humanitarian": L.tileLayer('https://a.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', { maxZoom: 18, attribution: '© OpenStreetMap contributors' })
        };

        // default
        baseLayers["humanitarian"].addTo(map);

        // load preview gaya peta
        function loadSample() {
            const sample = {
                "osm": "https://c.tile.openstreetmap.org/9/409/265.png",
                "opentopomap": "https://c.tile.opentopomap.org/9/409/265.png",
                "cyclosm": "https://c.tile-cyclosm.openstreetmap.fr/cyclosm/9/409/265.png",
                "humanitarian": "https://a.tile.openstreetmap.fr/hot/9/409/265.png"
            };

            const row = document.getElementById("gaya-peta-row");
            row.innerHTML = "";

            Object.entries(sample).forEach(([key, value]) => {
                row.innerHTML += `
                    <div class="col-sm-6 row mt-3">
                        <div class="col-sm-1 d-flex align-items-center">
                            <input type="radio" value="${key}" id="peta-${key}" class="radio item_radio" name="gaya_peta" ${key === 'humanitarian' ? 'checked' : ''}>
                        </div>
                        <div class="col-sm-11">
                            <h5>${capitalizeFirstLetter(key)}</h5>
                            <div class="sample-map">
                                <img src="${value}" alt="${key}">
                            </div>
                        </div>
                    </div>
                `;
            });
        }

        function capitalizeFirstLetter(str) {
            if (typeof str !== 'string' || str.length === 0) return str;
            return str.charAt(0).toUpperCase() + str.slice(1);
        }

        // pilih gaya peta
        function selectGayaPeta() {
            const radio = document.querySelectorAll('.item_radio');
            for (let i = 0; i < radio.length; i++) {
                if (radio[i].checked) {
                    const value = radio[i].value;
                    // remove semua base layer
                    Object.values(baseLayers).forEach(layer => map.removeLayer(layer));
                    baseLayers[value].addTo(map);
                    document.getElementById('gaya_peta_selector').value = capitalizeFirstLetter(value);
                    break;
                }
            }
        }

        // menampilkan checkbox kategori
        function confirmSelectionCheckboxes() {
            showList = [];
            let dText = "";
            const checkboxes = document.querySelectorAll('.item_checkbox');

            for (let i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked || document.querySelector("#kat-semua").checked) {
                    const parts = checkboxes[i].value.split("|");
                    showList.push(parts[0]);
                    dText += parts[1] + ", ";
                }
            }

            if (document.querySelector("#kat-semua").checked) {
                document.getElementById("kategori_selector").value = "Tampilkan semua";
            } else {
                document.getElementById("kategori_selector").value = dText.replace(/, $/, "");
            }
            // default update pins setelah konfirmasi (opsional)
            // showPins();
        }

        function toggleAllCheckboxes(source) {
            const checkboxes = document.querySelectorAll('.item_checkbox');
            checkboxes.forEach(cb => cb.checked = source.checked);
        }

        function verifyCheckbox() {
            const checkboxes = document.querySelectorAll('.item_checkbox');
            let all_checked = true;
            checkboxes.forEach(cb => { if (!cb.checked) all_checked = false; });
            document.getElementById("kat-semua").checked = all_checked;
        }

        // fungsi membatasi tanggal akhir
        function limitDate(context) {
            if (!context.value) return;
            document.getElementById('tanggal_akhir').min = context.value;
            const t1 = new Date(context.value);
            const t2v = document.getElementById('tanggal_akhir').value;
            if (!t2v) return;
            const t2 = new Date(t2v);
            if (t1 > t2) document.getElementById('tanggal_akhir').value = "";
        }

        // load geojson administrasi dan fit bounds
        fetch('<?= base_url("/assets/geojson/Jabar_By_Kab.geojson") ?>')
            .then(res => res.json())
            .then(data => {
                geoData = data;
                L.geoJSON(data, {
                    style: function(feature) {
                        return {
                            color: "black",
                            weight: 0,
                            fillColor: "#00c8faff",
                            fillOpacity: 0.15
                        };
                    }
                }).addTo(map);

                // fit bounds to geojson
                const bounds = L.geoJSON(data).getBounds();
                if (bounds.isValid()) map.fitBounds(bounds);
            }).catch(err => {
                console.error("Gagal load GeoJSON:", err);
            });

        // show pins dari server
        function showPins() {
            const tanggal_awal = document.getElementById("tanggal_awal").value;
            const tanggal_akhir = document.getElementById("tanggal_akhir").value;
            const kabkot_id = document.getElementById("kabkot_id").value;
            const tingkat_keparahan = document.getElementById("tingkat_keparahan").value;
            const status = document.getElementById("status").value;

            $.ajax({
                url: endpoint,
                type: "POST",
                dataType: "json",
                data: {
                    kategori_id: showList,
                    tanggal_awal,
                    tanggal_akhir,
                    kabkot_id,
                    tingkat_keparahan,
                    status
                },
                success: function(response) {
                    markerGroup.clearLayers();

                    if (!response || !response.data) {
                        alert("Tidak ada data ditemukan");
                        return;
                    }

                    response.data.forEach(function(item) {
                        if (!item.latitude || !item.longitude) return;

                        const icon = coloredIcon(item.icon, item.tingkat_keparahan || 1);

                        const popup = `
                            <div style="min-width:200px">
                                <b style="font-size: 17px">${item.nama_kategori}</b><br>
                                <table class="mb-2" style="font-size: 12px">
                                    <tr><td>Level</td><td>: </td><td>${item.tingkat_keparahan}</td></tr>
                                    <tr><td>Status</td><td>: </td><td>${item.status}</td></tr>
                                </table>
                                ${item.deskripsi || ''}
                            </div>
                        `;

                        L.marker([item.latitude, item.longitude], { icon })
                            .bindPopup(popup)
                            .addTo(markerGroup);
                    });

                    map.addLayer(markerGroup);
                },
                error: function(xhr, status, err) {
                    console.error("AJAX Error:", err);
                    alert("Terjadi kesalahan saat memuat data. Coba lagi.");
                }
            });
        }

        // buat icon marker kustom (image + circle warna kecil)
        function coloredIcon(imageName, level) {
            const keparahan = ["#00eeff", "#23e41c", "#FCD34D", "#FB923C", "#EF4444"];
            const color = keparahan[Math.max(0, Math.min(level - 1, keparahan.length - 1))];

            const html = `
                <div style="display:flex; align-items:center; gap:6px;">
                    <img src="<?= base_url('assets/img/map/') ?>${imageName}" style="width:36px; height:36px; object-fit:contain;">
                    <span style="display:inline-block; width:12px; height:12px; background:${color}; border-radius:50%; box-shadow:0 0 4px rgba(0,0,0,0.25);"></span>
                </div>
            `;

            return L.divIcon({
                className: "custom-pin",
                html,
                iconSize: [50, 36],
                iconAnchor: [25, 36],
                popupAnchor: [0, -36]
            });
        }

        // klik peta -> highlight wilayah & tampilkan popup statistik
        map.on("click", function(e) {
            if (!geoData) return;

            const point = turf.point([e.latlng.lng, e.latlng.lat]);
            let feature = null;

            geoData.features.forEach(feat => {
                if (turf.booleanPointInPolygon(point, feat)) feature = feat;
            });

            if (!feature) return;

            // hapus layer highlight sebelumnya
            if (window._highlightLayer) {
                window._highlightLayer.clearLayers();
            } else {
                window._highlightLayer = L.geoJSON(null).addTo(map);
            }

            window._highlightLayer.addData(feature);

            const nama = feature.properties.nama || feature.properties.KABKOT || "Wilayah";
            // ambil data statistik dari PHP yang sudah di-encode ke JS
            const jlapreg = JSON.parse('<?= $jumlah_laporan_average ?>');
            const kater = JSON.parse('<?= $kategori_terbanyak ?>');
            const jlapreg7 = JSON.parse('<?= $jumlah_laporan_average_7 ?>');
            const kater7 = JSON.parse('<?= $kategori_terbanyak_7 ?>');

            let jumlah_laporan = 0, rata_rata_keparahan = "0,00", kategori_terbanyak = "-", jumlah_laporan_7 = 0, rata_rata_keparahan_7 = "0,00", kategori_terbanyak_7 = "-";
            for (let i = 0; i < jlapreg.length; i++) {
                if (jlapreg[i].geojson_id == feature.properties.OBJECTID) {
                    jumlah_laporan = jlapreg[i].jumlah_laporan;
                    rata_rata_keparahan = parseFloat(jlapreg[i].rata_rata_keparahan).toFixed(2).toString().replace(".", ",");
                    break;
                }
            }

            for (let i = 0; i < kater.length; i++) {
                if (kater[i].geojson_id == feature.properties.OBJECTID) {
                    if (kater[i].jumlah_laporan > 0) kategori_terbanyak = kater[i].nama_kategori;
                }
            }

            for (let i = 0; i < jlapreg7.length; i++) {
                if (jlapreg7[i].geojson_id == feature.properties.OBJECTID) {
                    jumlah_laporan_7 = jlapreg7[i].jumlah_laporan;
                    rata_rata_keparahan_7 = parseFloat(jlapreg7[i].rata_rata_keparahan).toFixed(2).toString().replace(".", ",");
                    break;
                }
            }

            for (let i = 0; i < kater7.length; i++) {
                if (kater7[i].geojson_id == feature.properties.OBJECTID) {
                    if (kater7[i].jumlah_laporan > 0) kategori_terbanyak_7 = kater7[i].nama_kategori;
                }
            }

            let arrow = '<i class="bi bi-dash-lg text-secondary"></i>';
            if (parseFloat(rata_rata_keparahan_7.replace(',', '.')) < parseFloat(rata_rata_keparahan.replace(',', '.'))) {
                arrow = '<i class="bi bi-arrow-down-right text-success"></i>';
            } else if (parseFloat(rata_rata_keparahan_7.replace(',', '.')) > parseFloat(rata_rata_keparahan.replace(',', '.'))) {
                arrow = '<i class="bi bi-arrow-up-right text-danger"></i>';
            }

            const info = `
                <div style="width:220px">
                    <h5>${nama}</h5>
                    <b>Keseluruhan</b>
                    <table style="font-size:13px">
                        <tr><td>Jumlah laporan</td><td> : </td><td>${jumlah_laporan}</td></tr>
                        <tr><td>Tingkat keparahan</td><td> : </td><td>${rata_rata_keparahan}</td></tr>
                        <tr><td>Kategori terbanyak</td><td> : </td><td>${kategori_terbanyak}</td></tr>
                    </table>
                    <br>
                    <b>Tujuh hari terakhir</b>
                    <table style="font-size:13px">
                        <tr><td>Jumlah laporan</td><td> : </td><td>${jumlah_laporan_7}</td></tr>
                        <tr><td>Tingkat keparahan</td><td> : </td><td>${rata_rata_keparahan_7} ${arrow}</td></tr>
                        <tr><td>Kategori terbanyak</td><td> : </td><td>${kategori_terbanyak_7}</td></tr>
                    </table>
                </div>
            `;

            const centroid = turf.center(feature).geometry.coordinates;
            L.popup().setLatLng([centroid[1], centroid[0]]).setContent(info).openOn(map);

            // zoom to feature
            map.fitBounds(window._highlightLayer.getBounds(), { maxZoom: 12 });
        });

        // on load
        document.addEventListener("DOMContentLoaded", function() {
            loadSample();
            confirmSelectionCheckboxes(); // inisialisasi kategori yang dipilih
        });
    </script>
</body>

</html>
