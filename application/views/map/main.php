<body>
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.Default.css">
    </style>
    <style>
        #map {
            height: 700px;
            width: 100%;
        }

        .sample-map {
            height: 100px;
            width: 200px;
        }

        .sample-map img {
            height: 100%;
            width: 100%;
        }

        #control-map {
            height: 20vh;
            width: 100%;
        }
    </style>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column">
                    <div id="control-map">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label for="" class="form-label">Kategori</label>
                                    <div class="input-group">
                                        <i class="input-group-text bi bi-tags"></i>
                                        <input type="text" style="cursor: pointer;" id="kategori_selector"
                                            value="Tampilkan semua" class="form-control" readonly aria-describedby="helpId"
                                            data-bs-toggle="modal" data-bs-target="#kategori-modal">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">Dari tanggal</label>
                                    <div class="input-group">
                                        <i class="input-group-text bi bi-calendar"></i>
                                        <input type="date" class="form-control" name="" id="tanggal_awal"
                                            onchange="limitDate(this)" aria-describedby="helpId" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">Sampai tanggal</label>
                                    <div class="input-group">
                                        <i class="input-group-text bi bi-calendar-check"></i>
                                        <input type="date" class="form-control" name="" id="tanggal_akhir"
                                            aria-describedby="helpId" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 d-grid place-items-center">
                                <button type="button" class="btn btn-primary" onclick="showPins()">
                                    Tampilkan
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label for="" class="form-label">Kabupaten/ Kota</label>
                                    <div class="input-group">
                                        <i class="input-group-text bi bi-buildings"></i>
                                        <select class="form-select" name="kabkot_id" id="kabkot_id">
                                            <option value="">Semua Wilayah</option>
                                            <?php foreach ($kabkot as $val) { ?>
                                                <option value="<?= $val->id ?>"><?= $val->nama ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">Tingkat Keparahan</label>
                                    <div class="input-group">
                                        <i class="input-group-text bi bi-bar-chart"></i>
                                        <select class="form-select" name="tingkat_keparahan" id="tingkat_keparahan">
                                            <option value="">Semua Tingkat</option>
                                            <option value="1">Level 1</option>
                                            <option value="2">Level 2</option>
                                            <option value="3">Level 3</option>
                                            <option value="4">Level 4</option>
                                            <option value="5">Level 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">Status</label>
                                    <div class="input-group">
                                        <i class="input-group-text bi bi-question-diamond"></i>
                                        <select class="form-select" name="status" id="status">
                                            <option value="">Tampilkan Semua</option>
                                            <option value="belum ditangani">belum ditangani</option>
                                            <option value="ditugaskan">ditugaskan</option>
                                            <option value="sudah ditangani">sudah ditangani</option>
                                            <option value="selesai">selesai</option>
                                            <option value="ditolak">ditolak</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="mb-3">
                                    <label for="" class="form-label">Gaya Peta</label>
                                    <div class="input-group">
                                        <i class="input-group-text bi bi-map "></i>
                                        <input type="text" style="cursor: pointer;" id="gaya_peta_selector" value="Humanitarian"
                                            class="form-control" readonly aria-describedby="helpId" data-bs-toggle="modal"
                                            data-bs-target="#gaya-peta-modal">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="kategori-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Pilih kategori yang ingin ditampilkan
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="kategori-modal-body">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <input type="checkbox" value="0" id="kat-semua" class="checkbox" checked
                                onclick="toggleAllCheckboxes(this)">
                            <label for="kat-semua">Tampilkan semua</label>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($kategori_laporan as $kategori) { ?>
                            <div class="col-sm-6">
                                <input type="checkbox" value="<?= $kategori->id_kategori ?>|<?= $kategori->nama_kategori ?>"
                                    id="kat-<?= $kategori->id_kategori ?>" class="checkbox item_checkbox"
                                    onclick="verifyCheckbox()" checked>
                                <label for="kat-<?= $kategori->id_kategori ?>"><?= $kategori->nama_kategori ?></label>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Tutup
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                        onclick="confirmSelectionCheckboxes()">Konfirmasi</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="gaya-peta-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Pilih Gaya Peta
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="gaya-peta-modal-body">
                    <div class="row" id="gaya-peta-row">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Tutup
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                        onclick="selectGayaPeta()">Konfirmasi</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Load Leaflet JS -->
    <script src="<?= base_url('assets/vendor/jquery/dist/jquery.min.js') ?>"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src=" <?= base_url("assets/js/core/bootstrap.min.js") ?> "></script>
    <script src=" <?= base_url("assets/js/core/popper.min.js") ?> "></script>
    <script src="https://unpkg.com/leaflet.markercluster/dist/leaflet.markercluster.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@turf/turf@6/turf.min.js"></script>
    <script src="https://unpkg.com/leaflet.vectorgrid@latest/dist/Leaflet.VectorGrid.js"></script>



    <script>
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
                "#A3E635",
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

        let layer = L.geoJSON(null, {
            style: function(feature) {
                const idx = feature.properties.OBJECTID - 1 || 0; // pastikan setiap feature punya id unik (0–26)
                return {
                    color: "black",
                    weight: 0,
                    fillColor: colors[idx],
                    fillOpacity: 0.5
                };
            }
        }).addTo(map);

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
                        <div style="width:200px">
                            <h5>${nama}</h5>
                            <b>Keseluruhan</b><br>
                            <table style="font-size:13px">
                                <tr>
                                    <td>Jumlah laporan</td>
                                    <td> : </td>
                                    <td>${jumlah_laporan}</td>
                                </tr>
                                <tr>
                                    <td>Tingkat keparahan</td>
                                    <td> : </td>
                                    <td>${rata_rata_keparahan}</td>
                                </tr>
                                <tr>
                                    <td>Kategori terbanyak</td>
                                    <td> : </td>
                                    <td>${kategori_terbanyak}</td>
                                </tr>
                            </table><br>
                            <b>Tujuh hari terakhir</b><br>
                            <table style="font-size:13px">
                                <tr>
                                    <td>Jumlah laporan</td>
                                    <td> : </td>
                                    <td>${jumlah_laporan_7}</td>
                                </tr>
                                <tr>
                                    <td>Tingkat keparahan</td>
                                    <td> : </td>
                                    <td>${rata_rata_keparahan_7} ${arrow}</td>
                                </tr>
                                 <tr>
                                    <td>Kategori terbanyak</td>
                                    <td> : </td>
                                    <td>${kategori_terbanyak_7}</td>
                                </tr>
                            </table>
                        </div>
                        `;

            var centroid = turf.center(feature).geometry.coordinates;

            L.popup()
                .setLatLng([centroid[1], centroid[0]])
                .setContent(info)
                .openOn(map);



            map.fitBounds(layer.getBounds());

            // Hitung titik tengah polygon
            // const center = layer.getBounds().getCenter();

            // Tambahkan label teks besar di tengah polygon
            // L.tooltip({
            //     permanent: true,
            //     direction: "center",
            //     className: "wilayah-label"
            // })
            //     .setContent(nama)
            //     .setLatLng(center)
            //     .addTo(map);
            // Sesuaikan zoom agar semua terlihat
        });

        // Sesuaikan tampilan peta agar pas dengan batas wilayah
        // map.fitBounds(layer.getBounds());
    </script>
</body>

</html>