    <style>
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
                                        <i class="fas fa-info-square"></i>&nbsp; Lapor Masalah
                                    </h6>
                                </div>
                                <div class="col-12 col-sm-4 text-sm-end text-center mt-2 mt-sm-0">
                                    <button id="tambah_data" type="button" class="btn btn-warning shadow-sm"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fas fa-bullhorn"></i>&nbsp; Lapor
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tabel_lapor" class="table table-stripped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">NO</th>
                                            <th class="text-center">Keluhan</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
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
                        <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
                        <div class="col-md-7 col-xs-6">
                            <select class="form-select shadow-sm" id="kategori">
                                <option value="banjir">Banjir</option>
                                <option value="sampah">Sampah</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="file_foto" class="col-sm-4 col-form-label">Foto</label>
                        <div class="col-md-7 col-xs-6">
                            <input
                                type="file"
                                class="filepond w-100 shadow-sm"
                                id="file_foto"
                                name="file_foto">
                            <input type="hidden" id="nm_file">

                            <div id="preview_foto" class="mt-2 text-center" style="display:none;">
                                <img id="img_preview" src="" alt="Foto laporan" class="img-fluid" style="max-height:200px;">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                        <div class="col-md-7 col-xs-6">
                            <input type="hidden" autocomplete="off" id="id_laporan">
                            <textarea
                                class="form-control shadow-sm border-1"
                                id="deskripsi"
                                placeholder="Tulis deskripsi laporan di sini..."
                                style=" width: 100%;
                                        min-height: 120px;
                                        max-height: 350px;
                                        resize: vertical;
                                        border-radius: 8px;
                                        transition: all 0.2s ease;"></textarea>
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