<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-2">
                        <div class="d-flex flex-wrap align-items-center">
                            <h4 class="mb-0 me-auto">
                                <i class="fas fa-user-circle"></i>&nbsp; Profile
                            </h4>
                            <a href="<?= base_url("?p=" . base64_encode('profile')) ?>"
                                class="btn btn-warning w-auto">
                                <i class="fas fa-arrow-left"></i> &nbsp; Kembali
                            </a>

                        </div>



                    </div>
                    <div class="card-body" id="load_data">
                        <input type="hidden" value="<?= $this->input->get('id') ?>" id="id">

                        <!-- Tab panes -->
                        <div class="tab-content">

                            <div class="tab-pane active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h6 class="card-title"><i class="fas fa-images"></i>&nbsp;</h6>
                                                        </div>
                                                        <div class="card-body shadow-sm">
                                                            <div class="d-flex flex-column align-items-center text-center">
                                                                <input type="hidden" id="old_foto" value="<?= $this->session->userdata("foto") ?>">
                                                                <img id="img_logo"
                                                                    src="<?= base_url('assets/img/profile/' . (!empty($this->session->userdata('foto')) ? $this->session->userdata('foto') : 'no-image.png')) ?>"
                                                                    alt="Foto"
                                                                    width="170"
                                                                    height="231"
                                                                    style="
                                                                            background: #f5f5f5;
                                                                            border-radius: 15px;
                                                                            border: 2px solid #e0e0e0;
                                                                            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
                                                                        ">


                                                                <br>

                                                                <input type="file" id="foto" class="form-control mt-2" accept="image/*">
                                                                <button class="btn btn-success btn-sm mt-2" id="btn_upload_foto">
                                                                    <i class="fas fa-upload"></i>&nbsp; Upload Foto
                                                                </button>

                                                                <input type="hidden" id="old_foto" value="<?= $this->session->userdata("foto") ?>">
                                                            </div>

                                                            <!-- <div class="card-body">
                    <div class="col-md-12">
                        <input type="file" class="form-control" id="jpeg" name="jpeg">
                        <input type="hidden" id="nm_file">
                      </div>
                  </div> -->
                                                            <br>
                                                            <div class="row">
                                                                <div class="text-secondary fw-bold text-center">
                                                                    <input type="hidden" id="id_hd">
                                                                    <input type="hidden" value="<?= $this->input->get('id') ?>" id="id">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-9 mb-4">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h6 class="card-title"><i class="fas fa-id-card"></i>&nbsp;</h6>
                                                        </div>

                                                        <div class="card-body shadow-sm">


                                                            <div class="tab-content p-3  " id="nav-tabContent">

                                                                <!-- IDENTITAS -->
                                                                <div class="col-md-12 border-right">
                                                                    <div class="p-3 py-1">

                                                                        <div class="row border-start border-end align-items-center mb-3">
                                                                            <div class="col-sm-4">
                                                                                <h6 class="mb-0 text-dark">Nama Lengkap</h6>
                                                                            </div>
                                                                            <div class="col-sm-8 border-start">
                                                                                <input type="text" class="form-control" id="nama"
                                                                                    value="<?= $this->session->userdata('nama') ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row border-start border-end align-items-center mb-3">
                                                                            <div class="col-sm-4">
                                                                                <h6 class="mb-0 text-dark">Email</h6>
                                                                            </div>
                                                                            <div class="col-sm-8 border-start">
                                                                                <input
                                                                                    type="email"
                                                                                    class="form-control"
                                                                                    id="email"
                                                                                    value="<?= $this->session->userdata('email') ?>"
                                                                                    readonly
                                                                                    style="pointer-events: none; background-color: #e9ecef;"
                                                                                    tabindex="-1">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row border-start border-end align-items-center mb-3">
                                                                            <div class="col-sm-4">
                                                                                <h6 class="mb-0 text-dark">Telp/HP</h6>
                                                                            </div>
                                                                            <div class="col-sm-8 border-start">
                                                                                <input type="text" class="form-control" id="no_hp"
                                                                                    value="<?= $this->session->userdata('no_hp') ?>">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row border-start border-end align-items-center mb-3">
                                                                            <div class="col-sm-4">
                                                                                <h6 class="mb-0 text-dark">Alamat</h6>
                                                                            </div>
                                                                            <div class="col-sm-8 border-start">
                                                                                <textarea class="form-control" id="alamat" rows="2"><?= $this->session->userdata('alamat') ?></textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row border-start border-end align-items-center mb-3">
                                                                            <div class="col-sm-4">
                                                                                <h6 class="mb-0 text-dark">Bergabung Sejak</h6>
                                                                            </div>
                                                                            <div class="col-sm-8 border-start">
                                                                                <input
                                                                                    type="text"
                                                                                    class="form-control"
                                                                                    id="created_at"
                                                                                    value="<?= date('d F Y', strtotime($this->session->userdata('created_at'))) ?>"
                                                                                    readonly
                                                                                    style="pointer-events: none; background-color: #e9ecef;"
                                                                                    tabindex="-1">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-3">
                                                                            <div class="col text-center">
                                                                                <button class="btn btn-success w-auto" id="btn_simpan">
                                                                                    <i class="fas fa-save"></i> &nbsp; Simpan
                                                                                </button>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
</div>
</div>

<div id="loading_overlay"
    style="display:none; position:fixed; top:0; left:0; width:100%; height:100%;
            background:rgba(0,0,0,0.4); z-index:9999;">
    <div style="display:flex; width:100%; height:100%; align-items:center; justify-content:center;">
        <img src="<?= base_url('assets/img/logos/loading.gif') ?>" width="120">
    </div>
</div>