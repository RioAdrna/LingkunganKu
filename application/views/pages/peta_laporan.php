    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-2">
                            <div class="row align-items-center">
                                <div class="col-12 col-sm-8">
                                    <h6 class="mb-0">
                                        <i class="fas fa-route"></i>&nbsp; Peta Laporan
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="map" style="height: 500px; width: 100%; border-radius: 8px;"></div>

                            <!-- Load Leaflet JS -->
                            <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

                            <script>
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
                                var map = L.map('map').setView([-6.9, 107.6], 11); // posisi awal (misal: Bandung)

                                // Tambahkan basemap (OpenStreetMap)
                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    maxZoom: 18,
                                    attribution: '© OpenStreetMap contributors'
                                }).addTo(map);

                                const colors = [
                                    "#e6194b", "#3cb44b", "#ffe119", "#4363d8", "#f58231", "#911eb4", "#46f0f0",
                                    "#f032e6", "#bcf60c", "#fabebe", "#008080", "#e6beff", "#9a6324", "#fffac8",
                                    "#800000", "#aaffc3", "#808000", "#ffd8b1", "#000075", "#808080", "#ffd700",
                                    "#6495ed", "#20b2aa", "#ff69b4", "#ff4500", "#2e8b57", "#9932cc"
                                ];

                                // === 1. Data GeoJSON (contoh polygon sederhana untuk batas wilayah) ===
                                fetch('<?= base_url("/assets/geojson/Jabar_By_Kab.geojson") ?>')
                                    .then(response => response.json())
                                    .then(data => {
                                        L.geoJSON(data, {
                                            style: function(feature) {
                                                const idx = feature.properties.OBJECTID - 1 || 0; // pastikan setiap feature punya id unik (0–26)
                                                return {
                                                    color: "black",
                                                    weight: 0,
                                                    fillColor: colors[idx],
                                                    fillOpacity: 0.4
                                                };
                                            },
                                            onEachFeature: function(feature, layer) {
                                                const nama = feature.properties.nama || feature.properties.KABKOT || "Wilayah tanpa nama";
                                                layer.bindPopup(`<b>${nama}</b>`);

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

                                titikData.forEach(function(titik) {
                                    L.marker([titik.lat, titik.lng], {
                                            icon: coloredIcon(titik.warna)
                                        })
                                        .addTo(map)
                                        .bindPopup(`<b>${titik.nama}</b><br>${titik.info}`);
                                });

                                // Sesuaikan tampilan peta agar pas dengan batas wilayah
                                map.fitBounds(geoLayer.getBounds());
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>