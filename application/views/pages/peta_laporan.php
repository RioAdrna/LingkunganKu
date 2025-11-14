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
                       <div id="map_laporan" style="height: 500px; width: 100%; border-radius: 8px;"></div>

                            <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

                            <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

                            <script>

                                var map = L.map('map_laporan').setView([-6.9175, 107.6191], 12); 

                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    maxZoom: 19,
                                    attribution: '© OpenStreetMap'
                                }).addTo(map);

                                var dataLaporan = [
                                    {
                                        kategori: "Banjir",
                                        deskripsi: "Banjir setinggi 30 cm",
                                        lat: -6.9175,
                                        lng: 107.6191,
                                        tanggal: "2025-01-11"
                                    },
                                    {
                                        kategori: "Sampah",
                                        deskripsi: "Tumpukan sampah di pinggir jalan",
                                        lat: -6.9200,
                                        lng: 107.6208,
                                        tanggal: "2025-01-12"
                                    }
                                ];

                                dataLaporan.forEach(function(item){
                                    L.marker([item.lat, item.lng])
                                        .addTo(map)
                                        .bindPopup(
                                            "<b>Kategori:</b> " + item.kategori +
                                            "<br><b>Tanggal:</b> " + item.tanggal +
                                            "<br><b>Deskripsi:</b> " + item.deskripsi
                                        );
                                });
                            </script>

                         </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i>&nbsp; Tambah Laporan</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
                        <div class="col-md-7 col-xs-6">
                            <select class="form-control" id="kategori">
                                <option value="banjir">Banjir</option>
                                <option value="sampah">Sampah</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                        <div class="col-md-7 col-xs-6">
                            <textarea class="form-control" id="deskripsi" style=" width:100%;max-height: 200px; overflow:scroll; height:150px"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="foto" class="col-sm-4 col-form-label">Foto</label>
                        <div class="col-md-7 col-xs-6">
                            <input type="file" class="form-control" id="foto" name="foto">
                            <input type="hidden" id="nm_file">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="date" class="col-sm-4 col-form-label">Tanggal</label>
                        <div class="col-md-7 col-xs-8">
                            <input type="date" class="form-control" id="date" placeholder="Masukan Tanggal" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="clear" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button id="simpan_laporan" type="button" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>