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

    	.spinner {
    		border: 4px solid #f3f3f3;
    		/* Light gray */
    		border-top: 4px solid #3498db;
    		/* Blue */
    		border-radius: 50%;
    		width: 20px;
    		height: 20px;
    		animation: spin 1s linear infinite;
    		margin: 0 auto 5px;
    	}

    	@keyframes spin {
    		0% {
    			transform: rotate(0deg);
    		}

    		100% {
    			transform: rotate(360deg);
    		}
    	}

    	.loading {
    		display: none;
    		text-align: center;
    		padding: 10px;
    	}

    	.scroll-container {
    		height: 50vh;
    		overflow-y: auto;
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
    									<i class="fas fa-info-square"></i>&nbsp; Penanganan Laporan
    								</h6>
    							</div>
    							<div class="col-12 col-sm-4 text-sm-end text-center mt-2 mt-sm-0">
    								<button id="tambah_data" type="button" class="btn btn-primary shadow-sm"
    									data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="clearForm()">
    									<i class="fas fa-add"></i>&nbsp; Buat Tugas Baru
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
    				<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i>&nbsp; Buat Tugas Baru</h5>
    				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
    			</div>
    			<form id="form_petugas" enctype="multipart/form-data">
    				<div class="modal-body">
    					<div class="mb-3 row">
    						<label for="nik" class="col-sm-4 col-form-label">Petugas</label>
    						<div class="col-md-7 col-xs-8">
    							<button id="pilih-petugas" type="button" class="btn btn-primary shadow-sm"
    								data-bs-toggle="modal" data-bs-target="#modal" onclick="searchPetugas(document.getElementById('search-petugas'))">
    								<i class="fas fa-add"></i>&nbsp; Pilih Petugas
    							</button>
    						</div>
    					</div>

    					<div class="mb-3 row">
    						<label class="col-sm-4 col-form-label">Laporan</label>
    						<div class="col-md-7 col-xs-8">
    							<button id="pilih-laporan" type="button" class="btn btn-primary shadow-sm"
    								data-bs-toggle="modal" data-bs-target="#modal2" onclick="searchLaporan(document.getElementById('search-laporan'))">
    								<i class="fas fa-add"></i>&nbsp; Tambahkan Laporan
    							</button>
								<!-- Selected laporan list will be injected here -->
    						</div>
    					</div>

						<div id="selected-laporan-list" class="mt-2"></div>
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

    <!-- Select Petugas Modal -->
    <!-- Data search modal -->
    <div class="modal fade" id="modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    	<div class="modal-dialog modal-lg">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h5 class="modal-title" id="modal-title">
    					Pilih Petugas
    				</h5>
    			</div>
    			<div class="modal-body">
    				<div id="select-petugas-page-1">
    					<div class="row" style="width: 100%;">
    						<div class="col-sm-12">
    							<div class="input-group">
    								<span class="input-group-text" id="basic-addon1">
    									<i class="bi bi-search"></i>
    								</span>
    								<input id="search-petugas" type="search" class="form-control" placeholder="Search..." oninput="searchPetugas(this)">
    							</div>
    						</div>
    					</div>
    					<div class="scroll-container" id="scrollableDiv">
    						<div class="row mt-4 w-100" id="petugas-display">

    						</div>
    						<div id="loading" class="loading">
    							<div class="spinner"></div>
    							Loading...
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="confirmPetugasSelection(false)">
    					Batalkan
    				</button>
    				<buttonq id="submit" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="confirmPetugasSelection(true)">Ok</button>
    			</div>
    		</div>
    	</div>
    </div>

    <div class="modal fade" id="modal2" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    	<div class="modal-dialog modal-lg">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h5 class="modal-title" id="modal-title">
    					Pilih Laporan
    				</h5>
    			</div>
    			<div class="modal-body">
    				<div id="select-petugas-page-1">
    					<div class="row" style="width: 100%;">
    						<div class="col-sm-12">
    							<div class="input-group">
    								<span class="input-group-text" id="basic-addon1">
    									<i class="bi bi-search"></i>
    								</span>
    								<input id="search-laporan" type="search" class="form-control" placeholder="Search..." oninput="searchLaporan(this)">
    							</div>
    						</div>
    					</div>
    					<div class="scroll-container" id="scrollableDiv2">
    						<div class="row mt-4 w-100" id="laporan-display">

    						</div>
    						<div id="loading2" class="loading">
    							<div class="spinner"></div>
    							Loading...
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="confirmLaporanSelection(false)">
    					Batalkan
    				</button>
    				<buttonq id="submit" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="confirmLaporanSelection(true)">Ok</button>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- Select2 assets and initialization -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Select2 Bootstrap 5 theme -->
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@turf/turf@6/turf.min.js"></script>
    <script src="https://unpkg.com/leaflet.vectorgrid@latest/dist/Leaflet.VectorGrid.js"></script>

    <script>
    	let searchInterval;
    	let searchPage = 1;
    	let hasNextPage = false;
    	let apiResponse = [];
    	let selectedPetugas = [];
    	let selectedLaporan = [];
    	let isLoading = false;

    	const scrollableDiv = document.getElementById("scrollableDiv");
    	const content = document.getElementById("petugas-display");
    	const loading = document.getElementById("loading");

    	const scrollableDiv2 = document.getElementById("scrollableDiv2");
    	const content2 = document.getElementById("laporan-display");
    	const loading2 = document.getElementById("loading2");

    	function fetchMoreContent(content, loading) {
    		if (isLoading) return;
    		if (!hasNextPage) return;
    		isLoading = true;
    		loading.style.display = "block";
    		searchPage++;
    		console.log("panggil");
    		if (content === content2) {
    			searchLaporan(content, searchPage, () => {
    				isLoading = false;
    				loading.style.display = "none";
    			});
    		} else {
    			searchPetugas(content, searchPage, () => {
    				isLoading = false;
    				loading.style.display = "none";
    			});
    		}
    	}

    	function handleScroll(context, content, loading) {
    		console.log(context.scrollTop + context.clientHeight >= context.scrollHeight - 10);
    		if (context.scrollTop + context.clientHeight >= context.scrollHeight - 10) {
    			fetchMoreContent(content, loading);
    		}
    	}

    	scrollableDiv.addEventListener("scroll", () => {
    		handleScroll(scrollableDiv, content, loading);
    	});

    	scrollableDiv2.addEventListener("scroll", () => {
    		handleScroll(scrollableDiv2, content2, loading2);
    	});

    	fetchMoreContent(content, loading);

    	(function($) {
    		let id_petugas = "";

    		$(document).ready(function() {

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
    				url: origin + "penanganan/read",
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
    					title: "Petugas",
    					data: "petugas",
    				},
    				{
    					title: "Cabang",
    					data: "cabang",
    				},
    				{
    					title: "Status",
    					data: "status_penanganan",
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
    				url: origin + "penanganan/hapus_penanganan",
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


    	function selectPetugas(context, id) {
    		let value = {};
    		apiResponse.forEach((val, idx) => {
    			if (val.id == id) {
    				value = val;
    				return;
    			}
    		});
    		$(".petugas-item").each(function() {
    			this.classList.remove("bg-success");
    		});
    		if (selectedPetugas && selectedPetugas.id == id) {
    			selectedPetugas = [];
    		} else {
    			context.classList.add("bg-success");
    			selectedPetugas = value;
    		}
    		// context.classList.toggle("bg-success");
    		// let addNew = true;
    		// selectedPetugas.forEach((val, idx) => {
    		// 	if (val.id == id) {
    		// 		selectedPetugas.splice(idx, 1);
    		// 		addNew = false;
    		// 		return;
    		// 	}
    		// });
    		// if (addNew) {
    		// 	selectedPetugas.push(value);
    		// }

    		console.log(selectedPetugas);
    	}

    	function petugasDisplayGrid(image, data, is_selected = false) {
    		let id = data.id;
    		let name = data.nama;
    		let cabang = data.nama_cabang;
    		let sel = is_selected ? "bg-success" : "";
    		return `
				<div class="col-12 col-lg-6 d-flex justify-content-center mb-3">
					<div class="d-flex align-items-center p-2 mt-2 petugas-item ` + sel + `"
						style="width:100%; border-radius:10px; cursor:pointer; background:#fff;"
						onclick="selectPetugas(this, '` + id + `')"
						id="` + id + `">
						<div class="flex-shrink-0 me-3" style="width:90px; height:110px; overflow:hidden; border-radius:8px;">
							<img src="` + image + `" alt="` + name + `"
								style="width:100%; height:100%; object-fit:cover; display:block;" />
						</div>
						<div class="flex-grow-1" style="white-space:normal;">
							<h5 class="mb-1" style="font-weight:600;">` + name + `</h5>ID:` + id + `
							<div class="text-muted small">` + cabang.replace('-', '<br>') + `</div>
						</div>
					</div>
				</div>
			`;
    	}

    	function confirmPetugasSelection(confirm) {
    		if (confirm) {
    			if (!selectedPetugas || selectedPetugas.length == 0) {
    				Swal.fire({
    					icon: 'warning',
    					title: 'Pilih Petugas',
    					text: 'Silahkan pilih petugas terlebih dahulu.'
    				});
    				selectedPetugas = [];
    				$('#pilih-petugas').html('<i class="fas fa-add"></i>&nbsp;Pilih Petugas');
    				$('#pilih-petugas').addClass('btn-primary');
    				$('#pilih-petugas').removeClass('btn-success');
    				return;
    			}
    			$('#pilih-petugas').html('Petugas Terpilih: ' + selectedPetugas.nama);
    			$('#pilih-petugas').removeClass('btn-primary');
    			$('#pilih-petugas').addClass('btn-success');
    		} else {
    			selectedPetugas = [];
    			$('#pilih-petugas').html('<i class="fas fa-add"></i>&nbsp;Pilih Petugas');
    			$('#pilih-petugas').addClass('btn-primary');
    			$('#pilih-petugas').removeClass('btn-success');
    		}
    	}

    	function searchPetugas(input, page = 1, callback = () => {}) {
    		clearInterval(searchInterval);
    		if (page == 1) {
    			document.getElementById("scrollableDiv").scrollTo({
    				top: 0,
    				behavior: 'smooth'
    			});
    		}
    		searchInterval = setTimeout(() => {

    			$.ajax({
    				// url: origin + "petugas/search_petugas",
    				url: origin + "petugas/search_petugas",
    				type: "get",
    				data: {
    					q: input.value ?? "",
    					page: page
    				},
    				success: function(response) {
    					const animeDisplay = document.getElementById("petugas-display");
    					if (page == 1) {
    						animeDisplay.innerHTML = "";
    						searchPage = 1;
    					}
    					hasNextPage = response.has_next_page;
    					apiResponse = response.data;
    					response.data.forEach((value, index) => {
    						let selected = false;
    						if (selectedPetugas.id == value.id) {
    							selected = true;
    						}
    						animeDisplay.innerHTML += petugasDisplayGrid(origin + "assets/img/profile/" + value.foto, value, selected);
    					});
    					callback();
    				},
    				error: function(xhr) {
    					alert("<b>Error</b><br> Internal Server Error");
    					callback()
    				}
    			});
    		}, 500);
    	}

    	function selectLaporan(context, id) {
    		let value = {};
    		apiResponse.forEach((val, idx) => {
    			if (val.id == id) {
    				value = val;
    				return;
    			}
    		});

    		context.classList.toggle("bg-success");
    		let addNew = true;
    		selectedLaporan.forEach((val, idx) => {
    			if (val.id == id) {
    				selectedLaporan.splice(idx, 1);
    				addNew = false;
    				return;
    			}
    		});
    		if (addNew) {
    			selectedLaporan.push(value);
    		}

    		console.log(selectedLaporan);
    	}

    	function laporanDisplayGrid(image, data, is_selected = false) {
    		let id = data.id;
    		let kategori = data.kategori;
    		let level = data.tingkat_keparahan;
    		let kabkot = data.kabkot;
    		let deskripsi = data.deskripsi;
    		let longitude = data.longitude;
    		let latitude = data.latitude;
    		let sel = is_selected ? "bg-success" : "";
    		let collapseId = "collapse_" + id;
    		let collapseMapId = "collapse_map_" + id;
    		let mapDivId = "leaflet_map_" + id;
    		return `
				<div class="col-12 col-lg-6 d-flex justify-content-center mb-3">
					<div class="p-2 mt-2 petugas-item ` + sel + `"
						style="width:100%; border-radius:10px; cursor:pointer; background:#fff;"
						onclick="selectLaporan(this, '` + id + `')"
						id="` + id + `">
						<div class="d-flex align-items-center">
							<div class="flex-shrink-0 me-3" style="width:110px; height:110px; overflow:hidden; border-radius:8px;">
								<img src="` + image + `" alt="` + kategori + `"
									onerror="this.onerror=null;this.src='` + origin + `assets/img/dokumentasi/no-image.png';"
									style="width:100%; height:100%; object-fit:cover; display:block;" />
							</div>
							<div class="flex-grow-1" style="white-space:normal;">
								<h5 class="mb-2" style="font-weight:600;">` + kategori + `</h5>
								<div class="mb-1"><small><strong>ID:` + id + `</strong></small></div>
								<div class="mb-1"><small>Level <strong>` + level + `</strong></small></div>
								<div class="text-muted small mb-2">` + kabkot + `</div>
								<div class="d-flex gap-2">
									<button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#` + collapseId + `" aria-expanded="false" aria-controls="` + collapseId + `" onclick="event.stopPropagation();">
										<i class="bi bi-chevron-down"></i> Deskripsi
									</button>
									<button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#` + collapseMapId + `" aria-expanded="false" aria-controls="` + collapseMapId + `" onclick="event.stopPropagation(); initLaporanMap('` + id + `', ` + latitude + `, ` + longitude + `);">
										<i class="bi bi-geo-alt"></i> Map
									</button>
								</div>
							</div>
						</div>
						<div class="collapse mt-2" id="` + collapseId + `">
							<div class="card card-body p-2 border-0" style="background:#f8f9fa; font-size:0.9rem;">
								` + deskripsi + `
							</div>
						</div>

						<div class="collapse mt-2" id="` + collapseMapId + `">
							<div class="card card-body p-2 border-0" style="background:#fff; font-size:0.9rem;">
								<div style="width:100%; height:220px;">
									<div id="` + mapDivId + `" style="width:100%; height:100%; border-radius:6px; overflow:hidden;"></div>
									<div class="mt-1 small text-muted">Longitude: ` + longitude + ` &nbsp;|&nbsp; Latitude: ` + latitude + `</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			`;
    	}

    	// Initialize Leaflet map for laporan item. Creates map only once per id.
    	function initLaporanMap(id, lat, lon) {
    		try {
    			var mapDivId = 'leaflet_map_' + id;
    			var container = document.getElementById(mapDivId);
    			if (!container) return;
    			window.laporanMaps = window.laporanMaps || {};
    			if (window.laporanMaps[id]) {
    				try {
    					window.laporanMaps[id].invalidateSize();
    				} catch (e) {}
    				window.laporanMaps[id].setView([lat, lon], 13);
    				return;
    			}
    			if (typeof L === 'undefined') {
    				container.innerHTML = '<div style="padding:10px;color:#666">Leaflet tidak ditemukan. Pastikan library Leaflet dimuat.</div>';
    				return;
    			}
    			var map = L.map(mapDivId, {
    				scrollWheelZoom: false
    			}).setView([lat, lon], 13);
    			L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    				attribution: '&copy; OSM'
    			}).addTo(map);
    			L.marker([lat, lon]).addTo(map);
    			window.laporanMaps[id] = map;
    			// small delay to ensure container is visible and sized
    			setTimeout(function() {
    				try {
    					map.invalidateSize();
    				} catch (e) {}
    			}, 200);
    		} catch (e) {
    			console.error('initLaporanMap error', e);
    		}
    	}

    	function confirmLaporanSelection(confirm) {
    		if (confirm) {
    			if (!selectedLaporan || selectedLaporan.length == 0) {
    				Swal.fire({
    					icon: 'warning',
    					title: 'Pilih Laporan',
    					text: 'Silahkan pilih laporan terlebih dahulu.'
    				});
    				selectedLaporan = [];
					$('#pilih-laporan').addClass('btn-primary');
					$('#pilih-laporan').removeClass('btn-success');
					// clear displayed list
					$('#selected-laporan-list').html('');
    				return;
    			}
			$('#pilih-laporan').removeClass('btn-primary');
			$('#pilih-laporan').addClass('btn-success');
			// render selected laporan list below the button as cards
			try {
				var items = Array.isArray(selectedLaporan) ? selectedLaporan : [selectedLaporan];
				var listHtml = '';
				items.forEach(function(item) {
					var iid = item.id || '-';
					var ikat = item.kategori || item.nama || '-';
					listHtml += '<div class="card mt-2 mb-2" style="border:1px solid #ddd;">' +
						'<div class="card-body p-2 container px-3">' +
						'<span>ID:' + iid + ' - ' + ikat + '</span>' +
						'</div>' +
						'</div>';
				});
				$('#selected-laporan-list').html(listHtml);
			} catch (e) {
				console.error('render selected laporan list failed', e);
			}
    		} else {
    			selectedLaporan = [];
				$('#pilih-laporan').addClass('btn-primary');
				$('#pilih-laporan').removeClass('btn-success');
				// clear displayed list
				$('#selected-laporan-list').html('');
    		}
    	}

    	function searchLaporan(input, page = 1, callback = () => {}) {
    		clearInterval(searchInterval);
    		if (page == 1) {
    			document.getElementById("scrollableDiv2").scrollTo({
    				top: 0,
    				behavior: 'smooth'
    			});
    		}
    		searchInterval = setTimeout(() => {
    			$.ajax({
    				// url: origin + "petugas/search_petugas",
    				url: origin + "penanganan/search_laporan",
    				type: "get",
    				data: {
    					q: input.value ?? "",
    					page: page
    				},
    				success: function(response) {
    					const animeDisplay = document.getElementById("laporan-display");
    					if (page == 1) {
    						animeDisplay.innerHTML = "";
    						searchPage = 1;
    					}
    					hasNextPage = response.has_next_page;
    					apiResponse = response.data;
    					response.data.forEach((value, index) => {
    						let selected = false;
    						selectedLaporan.forEach((val, idx) => {
    							if (val.id == value.id) {
    								selected = true;
    							}
    						});
    						animeDisplay.innerHTML += laporanDisplayGrid(origin + "assets/img/dokumentasi/" + value.foto, value, selected);
    					});
    					callback();
    				},
    				error: function(xhr) {
    					alert("<b>Error</b><br> Internal Server Error");
    					callback()
    				}
    			});
    		}, 500);
    	}
    </script>