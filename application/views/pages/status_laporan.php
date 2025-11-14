<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-2">
                        <div class="row align-items-center">
                            <div class="col-12 col-sm-8">
                                <h6 class="mb-0">
                                    <i class="fas fa-info-circle"></i>&nbsp; Status Laporan
                                </h6>
                            </div>
                            <div class="col-12 col-sm-4 text-sm-end text-center mt-2 mt-sm-0">
                                <button id="tambah_data" type="button" class="btn btn-warning shadow-sm"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fas fa-plus"></i>&nbsp; Tambah
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tabel_lapor" class="table table-striped align-middle" style="width:100%">
                                <thead class="table-success text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td>1</td>
                                        <td>Banjir</td>
                                        <td>Air menggenang di area parkir fakultas setelah hujan deras.</td>
                                        <td>2025-11-12</td>
                                        <td><span class="badge bg-warning text-dark">Proses</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-info" title="Lihat"><i class="fas fa-eye"></i></button>
                                            <button class="btn btn-sm btn-success" title="Selesai"><i class="fas fa-check"></i></button>
                                            <button class="btn btn-sm btn-danger" title="Hapus"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Sampah</td>
                                        <td>Tumpukan sampah di taman belakang kampus belum dibersihkan.</td>
                                        <td>2025-11-10</td>
                                        <td><span class="badge bg-success">Selesai</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-info" title="Lihat"><i class="fas fa-eye"></i></button>
                                            <button class="btn btn-sm btn-success disabled"><i class="fas fa-check"></i></button>
                                            <button class="btn btn-sm btn-danger" title="Hapus"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Kebersihan</td>
                                        <td>Rumput liar tumbuh di sekitar trotoar area fakultas.</td>
                                        <td>2025-11-08</td>
                                        <td><span class="badge bg-secondary">Menunggu</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-info" title="Lihat"><i class="fas fa-eye"></i></button>
                                            <button class="btn btn-sm btn-success" title="Selesai"><i class="fas fa-check"></i></button>
                                            <button class="btn btn-sm btn-danger" title="Hapus"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
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
                        <select class="form-control" id="kategori">
                            <option value="banjir">Banjir</option>
                            <option value="sampah">Sampah</option>
                            <option value="kebersihan">Kebersihan</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                    <div class="col-md-7 col-xs-6">
                        <textarea class="form-control" id="deskripsi"
                            style="width:100%;max-height:200px;overflow:scroll;height:150px"></textarea>
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

<script>
// contoh aksi tombol simpan (simulasi)
document.getElementById('simpan_laporan').addEventListener('click', function () {
    alert('Laporan baru berhasil disimpan (simulasi)!');
});
</script>
