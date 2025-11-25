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
    									<i class="fas fa-info-square"></i>&nbsp; Lapor Masalah
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
