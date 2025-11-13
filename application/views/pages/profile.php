<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-2">
                        <div class="d-flex justify-content-between">
                            <div class="col-10">
                                <h4 class="mb-0"><i class="fas fa-user-circle"></i>&nbsp; Profile</h4>
                            </div>

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
                                            <div class="row gutters-sm">
                                                <div class="col-md-3 mb-3">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h6 class="card-title"><i class="fas fa-images"></i>&nbsp;FOTO</h6>
                                                        </div>
                                                        <div class="card-body shadow-sm">
                                                            <div class="d-flex flex-column align-items-center text-center">
                                                                <img id="img_logo" src="<?= base_url("assets/img/no-image.png") ?>" alt="Admin" class="rounded-square" width="170" height="231">
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

                                                <div class="col-md-9 mb-9">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h6 class="card-title"><i class="fas fa-exclamation"></i> Identitas </h6>
                                                        </div>

                                                        <div class="card-body shadow-sm">


                                                            <div class="tab-content p-3  " id="nav-tabContent">

                                                                <!-- IDENTITAS -->
                                                                <div class="col-md-12 border-right">
                                                                    <div class="p-3 py-1">
                                                                        <div class="row border-start border-end">
                                                                            <div class="col-sm-4">
                                                                                <h6 class="mb-0 text-primary">Nama Lengkap</h6>
                                                                            </div>
                                                                            <div class="col-sm-8 text-secondary border-start" id="nama"></div>
                                                                        </div>
                                                                        <hr>
                                                                        <div class="row border-start border-end">
                                                                            <div class="col-sm-4">
                                                                                <h6 class="mb-0 text-primary">Email</h6>
                                                                            </div>
                                                                            <div class="col-sm-8 text-secondary border-start" id="email"></div>
                                                                        </div>
                                                                        <hr>
                                                                        <div class="row border-start border-end">
                                                                            <div class="col-sm-4">
                                                                                <h6 class="mb-0 text-primary">Telp/HP</h6>
                                                                            </div>
                                                                            <div class="col-sm-8 text-secondary border-start" id="no_hp"></div>
                                                                        </div>
                                                                        <hr>
                                                                        <div class="row border-start border-end">
                                                                            <div class="col-sm-4">
                                                                                <h6 class="mb-0 text-primary">Alamat</h6>
                                                                            </div>
                                                                            <div class="col-sm-8 text-secondary border-start" id="alamat"></div>
                                                                        </div>
                                                                        <hr>
                                                                        <div class="row border-start border-end">
                                                                            <div class="col-sm-4">
                                                                                <h6 class="mb-0 text-primary">Bergabung Sejak</h6>
                                                                            </div>
                                                                            <div class="col-sm-8 text-secondary border-start" id="created_at"></div>
                                                                        </div>
                                                                        <hr>

                                                                        <div class="row mb-3">
                                                                            <div class="col-md-12 col-xs-12">
                                                                                <!-- <button onclick="location.replace('<?= base_url('?p=guru_edit&id') ?>')" class="btn btn-danger float-end"><i class="fa fa-edit"></i> Edit</button> -->
                                                                            </div>
                                                                        </div>
                                                                        <!-- BATAS RUANG IDENTITAS -->

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