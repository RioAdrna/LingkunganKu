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
    									<i class="fas fa-add"></i>&nbsp; Kelola Petugas
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
    				<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i>&nbsp; Tambah Petugas</h5>
    				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
    			</div>
    			<form id="form_petugas" enctype="multipart/form-data">
    				<div class="modal-body">
    					<div class="mb-3 row">
    						<label for="nik" class="col-sm-4 col-form-label">NIK</label>
    						<div class="col-md-7 col-xs-8">
    							<input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" required />
    						</div>
    					</div>

    					<div class="mb-3 row">
    						<label for="nama" class="col-sm-4 col-form-label">Nama</label>
    						<div class="col-md-7 col-xs-8">
    							<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required />
    						</div>
    					</div>

    					<div class="mb-3 row">
    						<label for="email" class="col-sm-4 col-form-label">Email</label>
    						<div class="col-md-7 col-xs-8">
    							<input type="email" class="form-control" id="email" name="email" placeholder="contoh@domain.com" />
    						</div>
    					</div>

    					<div class="mb-3 row">
    						<label for="password" class="col-sm-4 col-form-label">Password</label>
    						<div class="col-md-7 col-xs-8">
    							<input type="password" class="form-control" id="password" name="password" placeholder="Buat password" />
    						</div>
    					</div>

    					<div class="mb-3 row">
    						<label for="no_hp" class="col-sm-4 col-form-label">No. HP</label>
    						<div class="col-md-7 col-xs-8">
    							<input type="tel" class="form-control" id="no_hp" name="no_hp" placeholder="08xxxx" />
    						</div>
    					</div>

    					<div class="mb-3 row">
    						<label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
    						<div class="col-md-7 col-xs-8">
    							<textarea class="form-control" id="alamat" name="alamat" rows="2" placeholder="Masukkan alamat"></textarea>
    						</div>
    					</div>

    					<div class="mb-3 row">
    						<label for="foto" class="col-sm-4 col-form-label">Foto</label>
    						<div class="col-md-7 col-xs-8">
    							<input type="file" accept="image/*" class="form-control" id="foto" name="foto" />
    							<div class="mt-2">
    								<img id="preview_foto" src="" alt="Preview" style="max-width:120px;display:none;border:1px solid #ddd;padding:4px;border-radius:4px;" />
    							</div>
    						</div>
    					</div>

    					<div class="mb-3 row">
    						<label for="cabang" class="col-sm-4 col-form-label">Cabang</label>
    						<div class="col-md-7 col-xs-8">
    							<select id="cabang" name="cabang" class="form-select" style="width:100%"></select>
    						</div>
    					</div>
    				</div>

    				<div class="modal-footer">
    					<button id="clear" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
    					<button id="simpan" type="submit" class="btn btn-primary">Simpan</button>
    				</div>
    			</form>
    		</div>
    	</div>
    </div>

    <!-- Select2 assets and initialization -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Select2 Bootstrap 5 theme -->
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
    	(function($) {
    		$(document).ready(function() {
    			// Initialize select2 for cabang with AJAX source
    			$('#cabang').select2({
    				theme: 'bootstrap-5',
    				placeholder: 'Pilih cabang',
    				allowClear: true,
    				dropdownParent: $('#exampleModal'), // keep dropdown inside modal so search can be focused
    				minimumInputLength: 0,
    				ajax: {
    					url: '<?= base_url("cabang/get_cabang") ?>',
    					dataType: 'json',
    					delay: 250,
    					processResults: function(data) {
    						// Expecting data as array of objects {id:, nama:} or {id:, text:}
    						return {
    							results: (data || []).map(function(item) {
    								return {
    									id: item.id || item.value || item.id_cabang,
    									text: item.nama || item.text || item.label
    								};
    							})
    						};
    					},
    					cache: true
    				},
    				width: 'resolve'
    			});

    			// Photo preview
    			$('#foto').on('change', function() {
    				var file = this.files && this.files[0];
    				if (!file) {
    					$('#preview_foto').hide().attr('src', '');
    					return;
    				}
    				var reader = new FileReader();
    				reader.onload = function(e) {
    					$('#preview_foto').attr('src', e.target.result).show();
    				};
    				reader.readAsDataURL(file);
    			});

    			// Submit form via AJAX to petugas controller
    			$('#form_petugas').on('submit', function(e) {
    				e.preventDefault();
    				var form = this;
    				var $btn = $('#simpan');
    				var fd = new FormData(form);

    				fd.append("status", "insert");

    				// Disable button to prevent duplicate submits
    				$btn.prop('disabled', true).text('Menyimpan...');

    				$.ajax({
    					url: '<?= base_url("petugas/kelola_petugas") ?>',
    					method: 'POST',
    					data: fd,
    					processData: false,
    					contentType: false,
						dataType: 'json'
    				}).done(function(resp) {
    					// Expecting JSON like { icon: 'success'|'error', judul: '...', message: '...' }
    					var ok = false;
    					if (!resp) {
    						Swal.fire({
    							icon: 'error',
    							title: 'Error',
    							text: 'Response kosong dari server'
    						});
    					} else if (resp.icon && resp.icon === 'success') {
    						ok = true;
    					} else if (resp.success === true || resp.status == 200) {
    						ok = true;
    					}

    					if (ok) {
    						Swal.fire({
    							icon: 'success',
    							title: resp.judul || 'Berhasil',
    							text: resp.message || resp.pesan || ''
    						}).then(function() {
    							// close bootstrap modal if available
    							try {
    								var modalEl = document.getElementById('exampleModal');
    								var bsModal = bootstrap.Modal.getInstance(modalEl);
    								if (bsModal) bsModal.hide();
    							} catch (e) {}

    							// reset form and preview
    							$('#form_petugas')[0].reset();
    							$('#preview_foto').hide().attr('src', '');
    							if ($('#cabang').data('select2')) $('#cabang').val(null).trigger('change');

    							// optional: refresh table if function exists
    							if (typeof window.refresh_table === 'function') window.refresh_table();
    							if (typeof window.load_table === 'function') window.load_table();
    						});
    					} else {
    						Swal.fire({
    							icon: 'error',
    							title: resp.judul || 'Gagal',
    							text: resp.message || resp.pesan || JSON.stringify(resp)
    						});
    					}
    				}).fail(function(jqXHR, textStatus) {
    					Swal.fire({
    						icon: 'error',
    						title: 'Terjadi kesalahan',
    						text: textStatus || 'Network error'
    					});
    				}).always(function() {
    					$btn.prop('disabled', false).text('Simpan');
    				});
    			});

    			// Clear form function used by the button that opens the modal
    			window.clearForm = function() {
    				$('#form_petugas')[0].reset();
    				$('#preview_foto').hide().attr('src', '');
    				if ($('#cabang').data('select2')) {
    					$('#cabang').val(null).trigger('change');
    				}
    			};
    		});
    	})(window.jQuery || window.$ || function(fn) {
    		fn();
    	});
    </script>
