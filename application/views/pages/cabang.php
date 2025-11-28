    <style>
        #tabel_lapor td:first-child,
        #tabel_lapor th:first-child {
            text-align: center !important;
        }

        #tabel_lapor td,
        #tabel_lapor th {
            white-space: normal !important;
            word-wrap: break-word;
        }

        .text-wrap {
            white-space: normal !important;
        }

        @media (max-width: 576px) {

            #tabel_lapor td:nth-child(1),
            #tabel_lapor th:nth-child(1),
            #tabel_lapor td:nth-child(3),
            #tabel_lapor th:nth-child(3) {
                width: 40px !important;
            }
        }

        #map {
            height: 300px;
            width: 100%;
        }
    </style>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-2">
                            <div class="row align-items-center">
                                <div class="col-12 col-sm-8">
                                    <h6 class="mb-0">
                                        <i class="fas fa-info-square"></i>&nbsp; Cabang
                                    </h6>
                                </div>
                                <div class="col-12 col-sm-4 text-sm-end text-center mt-2 mt-sm-0">
                                    <button id="tambah_data" type="button" class="btn btn-primary shadow-sm"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="clearForm()">
                                        <i class="fas fa-add"></i>&nbsp; Tambah Cabang
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tabel_lapor" class="table table-stripped" style="width:100%">
                                </table>
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
                        <label for="kategori" class="col-sm-4 col-form-label">Nama Cabang</label>
                        <div class="col-md-7 col-xs-6">
                            <input type="text" class="form-control" name="nama_cabang" id="nama_cabang" placeholder="" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="file_foto" class="col-sm-4 col-form-label">Kabupaten/ Kota</label>
                        <div class="col-md-7 col-xs-6">
                            <select class="form-select" name="kabkot_id" id="kabkot_id">
                                <option value="" disabled selected>--Pilih Cabang--</option>
                                <?php foreach ($kabkot as $val) { ?>
                                    <option value="<?= $val->id ?>"><?= $val->nama ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="deskripsi" class="col-sm-4 col-form-label">Pilih Lokasi</label>
                            <div id="map"></div>
                        </div>
                    </div>


                    <!-- <div class="mb-3 row">
                        <label for="date" class="col-sm-4 col-form-label">Tanggal</label>
                        <div class="col-md-7 col-xs-8">
                            <input type="date" class="form-control" id="date" placeholder="Masukan Tanggal" required>
                        </div>
                    </div> -->
                    <div class="modal-footer">
                        <button id="clear" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button id="simpan" type="button" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@turf/turf@6/turf.min.js"></script>
    <script src="https://unpkg.com/leaflet.vectorgrid@latest/dist/Leaflet.VectorGrid.js"></script>

    <script>
        const url_map = "<?= base_url("?p=" . base64_encode('peta_laporan')) ?>";
    </script>

    <script>
        let map, marker;
        let lat = "";
        let lng = "";

        // ======================
        // INIT MAP INPUT LOKASI
        // ======================
        function initMap() {
            map = L.map("map").setView([-6.914744, 107.609810], 11);

            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                maxZoom: 19
            }).addTo(map);

            map.on("click", function(e) {
                lat = e.latlng.lat;
                lng = e.latlng.lng;

                if (marker) map.removeLayer(marker);

                marker = L.marker([lat, lng]).addTo(map);
            });
        }

        $('#exampleModal').on('shown.bs.modal', function() {
            setTimeout(() => {
                map.invalidateSize();
            }, 300);
        });

        // ======================
        // CLEAR FORM
        // ======================
        function clearForm() {
            $("#nama_cabang").val("");
            $("#kabkot_id").val("");
            lat = "";
            lng = "";

            if (marker) map.removeLayer(marker);
        }

        // ======================
        // SAVE CABANG
        // ======================
        $("#simpan").click(function() {
            if (lat === "" || lng === "") {
                alert("Silakan pilih lokasi di map!");
                return;
            }

            $.post("<?= base_url('cabang/tambah_cabang') ?>", {
                nama_cabang: $("#nama_cabang").val(),
                kabkot_id: $("#kabkot_id").val(),
                latitude: lat,
                longitude: lng,
                status: "insert"
            }, function(res) {
                let r = JSON.parse(res);
                alert(r.judul);
                $("#exampleModal").modal("hide");
                tabel.ajax.reload(null, false);
            });
        });

        // ======================
        // DATATABLES
        // ======================
        let tabel = $("#tabel_lapor").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?= base_url('cabang/data_cabang') ?>",
                type: "GET"
            },
            columns: [{
                    data: "id",
                    title: "#"
                },
                {
                    data: "nama_cabang",
                    title: "Nama Cabang"
                },
                {
                    data: "nama_kabkot",
                    title: "Kabupaten/Kota"
                },
                {
                    data: null,
                    title: "Lokasi",
                    render: function(data) {
                        return `
                    <button class="btn btn-info btn-sm lihatMap" 
                        data-lat="${data.latitude}" 
                        data-lng="${data.longitude}">
                        Lihat Lokasi
                    </button>
                `;
                    }
                },
                {
                    data: null,
                    title: "Aksi",
                    render: function(data) {
                        return `
                    <button class="btn btn-danger btn-sm hapus" data-id="${data.id}">
                        Hapus
                    </button>
                `;
                    }
                }
            ]
        });

        // ===============================
        // LIHAT LOKASI → BUKA PETA LAPORAN
        // ===============================
        $(document).on("click", ".lihatMap", function() {
            let lat = $(this).data("lat");
            let lng = $(this).data("lng");

            window.location.href = `<?= $url_map ?>?lat=${lat}&lng=${lng}`;
        });

        // ======================
        // HAPUS CABANG
        // ======================
        $(document).on("click", ".hapus", function() {
            if (!confirm("Hapus cabang ini?")) return;

            $.post("<?= base_url('cabang/hapus_cabang') ?>", {
                id: $(this).data("id")
            }, function(res) {
                let r = JSON.parse(res);
                alert(r.judul);
                tabel.ajax.reload(null, false);
            });
        });


        // INIT MAP SAAT PERTAMA KALI
        setTimeout(initMap, 500);
    </script>