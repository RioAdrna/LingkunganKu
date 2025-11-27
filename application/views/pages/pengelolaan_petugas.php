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

    <!-- Detail Modal -->
    <div class="modal fade" id="detailModal" aria-labelledby="detailModalLabel" aria-hidden="true">
    	<div class="modal-dialog modal-lg">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h5 class="modal-title" id="detailModalLabel"><i class="fas fa-user"></i>&nbsp; Detail Petugas</h5>
    				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
    			</div>
    			<div class="modal-body">
    				<div class="row">
    					<!-- Foto Section (Left) -->
    					<div class="col-md-4 text-center mb-3 mb-md-0">
    						<img id="detail_foto" src="" alt="Foto Petugas" style="max-width:100%;height:auto;border:1px solid #ddd;padding:8px;border-radius:8px;display:none;" />
    						<div id="no_foto" style="display:none;padding:20px;background-color:#f0f0f0;border-radius:8px;color:#999;">
    							<i class="fas fa-image" style="font-size:48px;"></i>
    							<p class="mt-2">Tidak ada foto</p>
    						</div>
    					</div>
    					<!-- Information Section (Right) -->
    					<div class="col-md-8">
    						<div class="detail-item mb-3">
    							<label class="detail-label fw-bold">ID:</label>
    							<span id="detail_id" class="detail-value">-</span>
    						</div>
    						<div class="detail-item mb-3">
    							<label class="detail-label fw-bold">NIK:</label>
    							<span id="detail_nik" class="detail-value">-</span>
    						</div>
    						<div class="detail-item mb-3">
    							<label class="detail-label fw-bold">Nama:</label>
    							<span id="detail_nama" class="detail-value">-</span>
    						</div>
    						<div class="detail-item mb-3">
    							<label class="detail-label fw-bold">Email:</label>
    							<span id="detail_email" class="detail-value">-</span>
    						</div>
    						<div class="detail-item mb-3">
    							<label class="detail-label fw-bold">No. HP:</label>
    							<span id="detail_no_hp" class="detail-value">-</span>
    						</div>
    						<div class="detail-item mb-3">
    							<label class="detail-label fw-bold">Alamat:</label>
    							<span id="detail_alamat" class="detail-value">-</span>
    						</div>
    						<div class="detail-item mb-3">
    							<label class="detail-label fw-bold">Cabang:</label>
    							<span id="detail_cabang" class="detail-value">-</span>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
    			</div>
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
    		let id_petugas = "";

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

    				if (id_petugas != "") {
    					fd.append("id", id_petugas);
    					fd.append("status", "update");
    				} else {
    					fd.append("status", "insert");
    				}

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
    							table.ajax.reload();
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
    				id_petugas = "";
    				$('#form_petugas')[0].reset();
    				$('#preview_foto').hide().attr('src', '');
    				if ($('#cabang').data('select2')) {
    					$('#cabang').val(null).trigger('change');
    				}
    				$('#password').attr('placeholder', 'Buat password');
    				$('#exampleModalLabel').html('<i class="fas fa-plus"></i>&nbsp; Tambah Petugas');
    				$('#nik').closest('.mb-3').show();
    				$('#nik').attr('required', true);
    			};

    			// Edit function to populate form from table row
    			window.edit = function(btn) {
    				var row = table.row($(btn).closest('tr')).data();
    				if (!row) return;

    				id_petugas = row.id;
    				$('#nik').val(row.nik || '');
    				$('#nama').val(row.nama || '');
    				$('#email').val(row.email || '');
    				$('#no_hp').val(row.no_hp || '');
    				$('#alamat').val(row.alamat || '');

    				// Hide NIK field in edit mode
    				$('#nik').closest('.mb-3').hide();
    				$('#nik').attr('required', false);

    				// Set password placeholder for edit mode
    				$('#password').attr('placeholder', 'Kosongkan jika tidak ingin mengubah password');

    				// Update modal title
    				$('#exampleModalLabel').html('<i class="fas fa-edit"></i>&nbsp; Edit Petugas');

    				// Set cabang if available
    				if (row.id_cabang) {
    					var option = new Option(row.nama_cabang, row.id_cabang, true, true);
    					$('#cabang').append(option).trigger('change');
    				}

    				// Show photo preview if exists
    				if (row.foto) {
    					$('#preview_foto').attr('src', origin + 'assets/img/profile/' + row.foto).show();
    				}

    				// Open modal
    				var modalEl = document.getElementById('exampleModal');
    				var bsModal = new bootstrap.Modal(modalEl);
    				bsModal.show();
    			};

    			// Detail function to display petugas information
    			window.detail = function(btn) {
    				var row = table.row($(btn).closest('tr')).data();
    				if (!row) return;

    				console.log(row);

    				// Populate detail fields
    				$('#detail_id').text(row.id || '-');
    				$('#detail_nik').text(row.nik || '-');
    				$('#detail_nama').text(row.nama || '-');
    				$('#detail_email').text(row.email || '-');
    				$('#detail_no_hp').text(row.no_hp || '-');
    				$('#detail_alamat').text(row.alamat || '-');
    				$('#detail_cabang').text(row.nama_cabang || '-');

    				// Handle photo display
    				if (row.foto) {
    					$('#detail_foto').attr('src', origin + 'assets/img/profile/' + row.foto).show();
    					$('#no_foto').hide();
    				} else {
    					$('#detail_foto').hide();
    					$('#no_foto').show();
    				}

    				// Open detail modal
    				var modalEl = document.getElementById('detailModal');
    				var bsModal = new bootstrap.Modal(modalEl);
    				bsModal.show();
    			};
    		});
    	})(window.jQuery || window.$ || function(fn) {
    		fn();
    	});
    	$(document).ready(function() {
    		dataTableConfig = {
    			serverSide: true,
    			ajax: {
    				url: origin + "petugas/read",
    				dataSrc: "data",
    			},
    			order: [0, "desc"],
    			columnDefs: [{
    				width: "20%",
    				targets: 1,
    			}, ],
    			columns: [{
    					title: "ID",
    					data: "id",
    				},
					{
    					title: "Nama",
    					data: "nama",
    				},
    				{
    					title: "Cabang",
    					data: "nama_cabang",
    				},
    				{
    					title: "Action",
    					render: function(data, type, row, meta) {
    						return (
    							`
                            <button class="btn btn-sm btn-info" onclick="detail(this)" title="Detail">
                            	<i class="bi bi-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-warning" onclick="edit(this)" title="Edit">
                            	<i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="deleteM(this)" title="Hapus">
                            	<i class="bi bi-trash"></i>
                            </button>
                        `
    						);
    					},
    				},
    			],
    		};
    		table = $("#tabel_lapor").DataTable(dataTableConfig);
    	});

    	function deleteM(btn) {
    		var tr = $(btn).closest('tr');
    		var table = $('#tabel_lapor').DataTable();
    		var row = table.row(tr);
    		var data = row.data();
    		if (!data) {
    			console.error("Data tidak ditemukan");
    			return;
    		}
    		const swalWithBootstrapButtons = Swal.mixin({
    			customClass: {
    				confirmButton: "btn btn-success ms-1",
    				cancelButton: "btn btn-danger"
    			},
    			buttonsStyling: false
    		});
    		swalWithBootstrapButtons.fire({
    			title: 'Perhatian?',
    			text: 'Apakah anda yakin ingin menghapus data ini?',
    			icon: 'warning',
    			showCancelButton: true,
    			confirmButtonText: 'Ya, hapus',
    			cancelButtonText: 'Tidak',
    			buttons: true,
    			dangerMode: true,
    			reverseButtons: true
    		}).then((willDelete) => {
    			if (!willDelete.isConfirmed) return;
    			$.ajax({
    				url: origin + "petugas/hapus_petugas",
    				method: "post",
    				data: {
    					id: data.id
    				},
    				dataType: "json",
    				success: function(res) {
    					Swal.fire({
    						title: res.judul,
    						icon: res.icon,
    					}).then(function() {
    						if (res.icon == "error") return;
    						id_cabang = "";
    						$("#exampleModal").modal("hide");
    						table.ajax.reload();
    					});
    				},
    			});
    		});
    	}
    </script>