    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-2">
                            <div class="d-flex justify-content-between">
                                <div class="col-10">
                                    <h6><i class="fas fa-info-square"></i>&nbsp; Laporan Masalah </h6>
                                </div>

                                <!-- Button trigger modal -->
                                <br>
                                <button id="tambah_data" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fas fa-plus"></i> &nbsp;Tambah Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="laporan_masalah" class="table table-stripped" style="width:100%">

                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Masalah Laporan</th>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i>&nbsp; Tambah Laporan</h5>
                </div>
                <div class="modal-body">
                    <div id="baris_text" class="row mb-3">
                        <div class="col-md-4 col-xs-6">
                            <label for="note_laporan" class="form-label">Keluhan</label>
                        </div>
                        <div class="col-md-8 col-xs-6">
                            <textarea class="form-control" id="note_laporan" style=" width:100%;max-height: 200px; overflow:scroll; height:150px"></textarea>
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