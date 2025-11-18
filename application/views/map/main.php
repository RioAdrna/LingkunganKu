<body>
    <style>
        #map {
            height: 700px;
            width: 100%;
        }

        #control-map {
            height: 10vh;
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
                                    <input type="text" style="cursor: pointer;" id="kategori_selector"
                                        value="Tampilkan semua" class="form-control" readonly aria-describedby="helpId"
                                        data-bs-toggle="modal" data-bs-target="#kategori-modal">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">Dari tanggal</label>
                                    <input type="date" class="form-control" name="" id="" aria-describedby="helpId" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">Sampai tanggal</label>
                                    <input type="date" class="form-control" name="" id="" aria-describedby="helpId" />
                                </div>
                            </div>
                            <div class="col-sm-2 d-grid place-items-center">
                                <button type="button" class="btn btn-primary" onclick="showPins()">
                                    Tampilkan
                                </button>
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
                            <input type="checkbox" value="0" id="kat-semua" class="checkbox"
                                onclick="toggleAllCheckboxes(this)">
                            <label for="kat-semua">Tampilkan semua</label>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($kategori_laporan as $kategori) { ?>
                            <div class="col-sm-6">
                                <input type="checkbox" value="<?= $kategori->id_kategori ?>|<?= $kategori->nama_kategori ?>"
                                    id="kat-<?= $kategori->id_kategori ?>" class="checkbox item_checkbox">
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

    <!-- Load Leaflet JS -->
	<script src="<?= base_url('assets/vendor/jquery/dist/jquery.min.js') ?>"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src=" <?= base_url("assets/js/core/bootstrap.min.js") ?> "></script>
    <script src=" <?= base_url("assets/js/core/popper.min.js") ?> "></script>


    <script>

        var map = L.map('map').setView([-6.9, 107.6], 11); // posisi awal (misal: Bandung)

        // Tambahkan basemap (OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        let endpoint = "<?= base_url("/map/show_pin") ?>";
        let showList = [];
        var markerGroup = L.layerGroup().addTo(map);

        function showPins() {
            $.ajax({
                url: endpoint, // <-- GANTI DENGAN URL ENDPOINT ANDA
                type: "POST",
                data: {
                    kategori_id: showList
                },
                dataType: "json",
                success: function (response) {
                    markerGroup.clearLayers();
                    console.log(response);
                    response.data.forEach(function (value, index) {
                        if(value.latitude == null || value.longitude == null ) return;
                        L.marker([value.latitude, value.longitude], {
                            icon: coloredIcon('red')
                        })
                            .addTo(markerGroup)
                            .bindPopup(`${value.deskripsi}`);
                    });
                    map.fitBounds(geoLayer.getBounds());
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", error);
                    alert("Terjadi kesalahan, coba lagi nanti");
                }
            });
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

        function coloredIcon(color) {
            const markerHtmlStyles = `
                background-color: ${color};
                width: 3rem;
                height: 3rem;
                display: block;
                left: -1.5rem;
                top: -1.5rem;
                position: relative;
                border-radius: 3rem 3rem 0;
                transform: rotate(45deg);
                border: 1px solid #FFFFFF;`;
            return new L.divIcon({
                className: "my-custom-pin",
                iconAnchor: [0, 24],
                labelAnchor: [-6, 0],
                popupAnchor: [0, -36],
                html: `<span style="${markerHtmlStyles}" />`
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

        // === 1. Data GeoJSON (contoh polygon sederhana untuk batas wilayah) ===
        fetch('<?= base_url("/assets/geojson/Jabar_By_Kab.geojson") ?>')
            .then(response => response.json())
            .then(data => {
                L.geoJSON(data, {
                    style: function (feature) {
                        const idx = feature.properties.OBJECTID - 1 || 0; // pastikan setiap feature punya id unik (0–26)
                        return {
                            color: "black",
                            weight: 0,
                            fillColor: colors[idx],
                            fillOpacity: 0.4
                        };
                    },
                    onEachFeature: function (feature, layer) {
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
                        }
                        else if (rata_rata_keparahan_7 > rata_rata_keparahan) {
                            arrow = '<i class="bi bi-arrow-up-right text-danger"></i>'
                        }
                        else {
                            arrow = '<i class="bi bi-dash-lg text-success"></i>'
                        }

                        layer.bindPopup(`
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
                        `);

                        // Hitung titik tengah polygon
                        const center = layer.getBounds().getCenter();

                        // Tambahkan label teks besar di tengah polygon
                        L.tooltip({
                            permanent: true,
                            direction: "center",
                            className: "wilayah-label"
                        })
                            .setContent(nama)
                            .setLatLng(center)
                            .addTo(map);
                    }
                }).addTo(map);

                // Sesuaikan zoom agar semua terlihat
                map.fitBounds(L.geoJSON(data).getBounds());
            });

        // === 2. Tambahkan beberapa titik marker ===
        var titikData = [{
            nama: "Titik 1",
            lat: -6.91,
            lng: 107.60,
            info: "Sangat Ringan",
            warna: "#00d9ffff"
        },
        {
            nama: "Titik 2",
            lat: -6.92,
            lng: 107.64,
            info: "Ringan",
            warna: "#16c000ff"
        },
        {
            nama: "Titik 3",
            lat: -6.89,
            lng: 107.58,
            info: "Sedang",
            warna: "#ffd900ff"
        },
        {
            nama: "Titik 4",
            lat: -6.88,
            lng: 107.62,
            info: "Berat",
            warna: "#ff6600ff"
        },
        {
            nama: "Titik 5",
            lat: -6.90,
            lng: 107.67,
            info: "Sangat Berat",
            warna: "#8b0000"
        }
        ];

        // titikData.forEach(function (titik) {
        //     L.marker([titik.lat, titik.lng], {
        //         icon: coloredIcon(titik.warna)
        //     })
        //         .addTo(map)
        //         .bindPopup(`<b>${titik.nama}</b><br>${titik.info}`);
        // });

        // Sesuaikan tampilan peta agar pas dengan batas wilayah
        map.fitBounds(geoLayer.getBounds());
    </script>
</body>

</html>