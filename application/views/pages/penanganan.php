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
    									data-bs-toggle="modal" data-bs-target="#exampleModal">
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
    		<div class="modal-content border-0 shadow-lg">
    			<!-- Header -->
    			<div class="modal-header border-bottom bg-white">
    				<div class="d-flex align-items-center">
    					<div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-3"
    						style="width: 40px; height: 40px;">
    						<i class="fas fa-info-circle text-dark"></i>
    					</div>
    					<div>
    						<h5 class="modal-title mb-0 fw-bold text-dark" id="detailModalLabel">Detail Penanganan</h5>
    						<small class="text-muted">Informasi lengkap penanganan laporan</small>
    					</div>
    				</div>
    				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    			</div>

    			<!-- Body -->
    			<div class="modal-body p-4 bg-white">
    				<div class="row">
    					<div class="col-12">
    						<!-- Informasi Utama dalam Grid -->
    						<div class="row g-3 mb-4">
    							<!-- Kolom 1 -->
    							<div class="col-md-6">
    								<div class="card border h-100">
    									<div class="card-body">
    										<label class="text-xs text-muted mb-2 fw-semibold text-uppercase">
    											<i class="fas fa-id-card me-1"></i>ID Penanganan
    										</label>
    										<div id="detail_id" class="fw-bold text-dark fs-6">-</div>
    									</div>
    								</div>
    							</div>

    							<div class="col-md-6">
    								<div class="card border h-100">
    									<div class="card-body">
    										<label class="text-xs text-muted mb-2 fw-semibold text-uppercase">
    											<i class="fas fa-user me-1"></i>Petugas
    										</label>
    										<div id="detail_petugas" class="fw-bold text-dark">-</div>
    									</div>
    								</div>
    							</div>

    							<div class="col-md-6">
    								<div class="card border h-100">
    									<div class="card-body">
    										<label class="text-xs text-muted mb-2 fw-semibold text-uppercase">
    											<i class="fas fa-building me-1"></i>Cabang
    										</label>
    										<div id="detail_cabang" class="fw-bold text-dark">-</div>
    									</div>
    								</div>
    							</div>

    							<div class="col-md-6">
    								<div class="card border h-100">
    									<div class="card-body">
    										<label class="text-xs text-muted mb-2 fw-semibold text-uppercase">
    											<i class="fas fa-tasks me-1"></i>Status
    										</label>
    										<div id="detail_status_penanganan" class="fw-bold text-dark">-</div>
    									</div>
    								</div>
    							</div>
    						</div>

    						<!-- Catatan -->
    						<div class="card border mb-4">
    							<div class="card-body">
    								<label class="text-xs text-muted mb-2 fw-semibold text-uppercase">
    									<i class="fas fa-sticky-note me-1"></i>Catatan Penanganan
    								</label>
    								<div id="detail_catatan" class="text-dark lh-base bg-light rounded p-3">
    									<span class="text-muted">Tidak ada catatan</span>
    								</div>
    							</div>
    						</div>

    						<!-- Lampiran -->
    						<div class="card border mb-4">
    							<div class="card-body">
    								<label class="text-xs text-muted mb-2 fw-semibold text-uppercase">
    									<i class="fas fa-paperclip me-1"></i>Lampiran
    								</label>
    								<div id="detail_lampiran" class="text-dark">
    									<span class="text-muted">Tidak ada lampiran</span>
    								</div>
    							</div>
    						</div>

    						<!-- Timeline -->
    						<div class="card border mb-4">
    							<div class="card-body">
    								<label class="text-xs text-muted mb-3 fw-semibold text-uppercase">
    									<i class="fas fa-clock me-1"></i>Timeline
    								</label>
    								<div class="row g-3">
    									<div class="col-md-4">
    										<div class="text-center">
    											<div class="bg-light rounded p-3">
    												<i class="fas fa-plus-circle text-primary mb-2 fs-4"></i>
    												<div class="text-xs text-muted fw-semibold">Dibuat Pada</div>
    												<div id="detail_created_at" class="fw-bold text-dark small">-</div>
    											</div>
    										</div>
    									</div>
    									<div class="col-md-4">
    										<div class="text-center">
    											<div class="bg-light rounded p-3">
    												<i class="fas fa-check-circle text-success mb-2 fs-4"></i>
    												<div class="text-xs text-muted fw-semibold">Selesai Ditangani</div>
    												<div id="detail_waktu_selesai" class="fw-bold text-dark small">-</div>
    											</div>
    										</div>
    									</div>
    									<div class="col-md-4">
    										<div class="text-center">
    											<div class="bg-light rounded p-3">
    												<i class="fas fa-check-double text-info mb-2 fs-4"></i>
    												<div class="text-xs text-muted fw-semibold">Dikonfirmasi Selesai</div>
    												<div id="detail_waktu_dikonfirmasi" class="fw-bold text-dark small">-</div>
    											</div>
    										</div>
    									</div>
    								</div>
    							</div>
    						</div>

    						<!-- Daftar Laporan -->
    						<div class="card border">
    							<div class="card-header bg-light border-bottom">
    								<h6 class="mb-0 fw-bold text-dark">
    									<i class="fas fa-list me-2"></i>Daftar Laporan
    								</h6>
    							</div>
    							<div class="card-body">
    								<div id="detail-laporan-list" class="mt-2">
    									<div class="text-center text-muted py-3">
    										<i class="fas fa-inbox fs-1 mb-2"></i>
    										<p class="mb-0">Tidak ada daftar laporan</p>
    									</div>
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>

    			<!-- Footer -->
    			<div class="modal-footer border-top bg-white">
    				<button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">
    					<i class="fas fa-times me-1"></i>Tutup
    				</button>
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

    	let id_penanganan = "";

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
    				var fd = new FormData();

    				// Normalize and validate selected laporan -> array of ids
    				var laporanIds = [];
    				if (Array.isArray(selectedLaporan)) {
    					laporanIds = selectedLaporan.map(function(item) {
    						return (typeof item === 'object') ? item.id : item;
    					}).filter(Boolean);
    				} else if (selectedLaporan) {
    					// single item (defensive)
    					laporanIds = [(typeof selectedLaporan === 'object') ? selectedLaporan.id : selectedLaporan].filter(Boolean);
    				}

    				if (!laporanIds || laporanIds.length === 0) {
    					Swal.fire({
    						icon: 'error',
    						title: 'Gagal',
    						text: 'Silahkan pilih laporan terlebih dahulu'
    					});
    					return;
    				}

    				// Validate selected petugas (selectedPetugas is expected to be an object when chosen)
    				var petugasId = null;
    				if (selectedPetugas && typeof selectedPetugas === 'object') {
    					petugasId = selectedPetugas.id || null;
    				} else if (selectedPetugas) {
    					petugasId = selectedPetugas; // defensive: if an id was stored directly
    				}

    				if (!petugasId) {
    					Swal.fire({
    						icon: 'error',
    						title: 'Gagal',
    						text: 'Silahkan pilih petugas terlebih dahulu'
    					});
    					return;
    				}

    				// Append petugas id
    				fd.append('selectedPetugas', petugasId);
    				// Append laporan ids as array entries so PHP receives them as an array
    				laporanIds.forEach(function(id) {
    					fd.append('selectedLaporan[]', id);
    				});

    				if (id_penanganan != "") {
    					fd.append("id", id_penanganan);
    					fd.append("status", "update");
    				} else {
    					fd.append("status", "insert");
    				}

    				// Disable button to prevent duplicate submits
    				$btn.prop('disabled', true).text('Menyimpan...');

    				$.ajax({
    					url: '<?= base_url("penanganan/kelola_penanganan") ?>',
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
    							selectedLaporan = false;
    							selectedPetugas = false;
    							confirmLaporanSelection(false);
    							confirmPetugasSelection(false);
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
    				id_penanganan = "";
    				$('#exampleModalLabel').html('<i class="fas fa-plus"></i>&nbsp; Tugas Baru');
    			};

    			// Edit function to populate assignment form from penanganan table row
    			window.edit = function(btn) {
    				var row = table.row($(btn).closest('tr')).data();
    				if (!row) return;

    				// set current penanganan id (used by submit handler)
    				id_penanganan = row.id || "";

    				// Populate selectedPetugas from row (expecting fields 'petugas_id' and 'petugas')
    				if (row.petugas_id) {
    					selectedPetugas = {
    						id: row.petugas_id,
    						nama: row.petugas || ''
    					};
    					$('#pilih-petugas').html('Petugas Terpilih: ' + (selectedPetugas.nama || selectedPetugas.id));
    					$('#pilih-petugas').removeClass('btn-primary').addClass('btn-success');
    				} else {
    					selectedPetugas = [];
    					$('#pilih-petugas').html('<i class="fas fa-add"></i>&nbsp; Pilih Petugas');
    					$('#pilih-petugas').removeClass('btn-success').addClass('btn-primary');
    				}

    				// Fetch laporan list assigned to this penanganan from backend
    				// backend endpoint: origin + 'penanganan/laporan_by_id_penanganan'
    				if (id_penanganan) {
    					$.ajax({
    						url: origin + 'penanganan/laporan_by_id_penanganan',
    						method: 'GET',
    						data: {
    							id: id_penanganan
    						},
    						dataType: 'json',
    						success: function(resp) {
    							// Expecting an array of laporan objects or { data: [...] }
    							var data = [];
    							if (!resp) data = [];
    							else if (Array.isArray(resp)) data = resp;
    							else if (Array.isArray(resp.data)) data = resp.data;
    							else if (Array.isArray(resp.laporan)) data = resp.laporan;

    							selectedLaporan = data || [];

    							// Render selected laporan into the UI (reuse confirmLaporanSelection rendering)
    							try {
    								if (selectedLaporan.length > 0) {
    									confirmLaporanSelection(true);
    								} else {
    									// clear list if none
    									$('#selected-laporan-list').html('');
    									$('#pilih-laporan').removeClass('btn-success').addClass('btn-primary');
    								}
    							} catch (e) {
    								console.error('render laporan selection failed', e);
    							}
    						},
    						error: function(xhr, status) {
    							console.error('Failed to load laporan for penanganan', status);
    							selectedLaporan = [];
    							$('#selected-laporan-list').html('');
    							$('#pilih-laporan').removeClass('btn-success').addClass('btn-primary');
    						}
    					});
    				} else {
    					selectedLaporan = [];
    					$('#selected-laporan-list').html('');
    					$('#pilih-laporan').removeClass('btn-success').addClass('btn-primary');
    				}

    				// Set modal title and open modal
    				$('#exampleModalLabel').html('<i class="fas fa-edit"></i>&nbsp; Edit Penanganan');
    				var modalEl = document.getElementById('exampleModal');
    				var bsModal = new bootstrap.Modal(modalEl);
    				bsModal.show();
    			};

    			// Detail function to display penanganan information
    			window.detail = function(btn) {
    				var row = table.row($(btn).closest('tr')).data();
    				if (!row) return;

    				console.log('detail row', row);

    				// Basic fields from row (use fallbacks)
    				$('#detail_id').text(row.id || '-');
    				$('#detail_petugas').text(row.petugas || row.petugas_nama || '-');
    				$('#detail_cabang').text(row.cabang || row.nama_cabang || '-');
    				$('#detail_catatan').text(row.catatan || row.keterangan || '-');
    				$('#detail_status_penanganan').text(row.status_penanganan || row.status || '-');
    				$('#detail_created_at').text(row.created_at || row.tanggal || row.created || '-');
    				$('#detail_waktu_selesai').text(row.waktu_selesai_ditangani || row.waktu_selesai || '-');
    				$('#detail_waktu_dikonfirmasi').text(row.waktu_dikonfirmasi_selesai || row.waktu_dikonfirmasi || '-');

    				// Lampiran: show download button if available
    				var lampiranHtml = '-';
    				if (row.lampiran) {
    					// try to form a usable URL; if row.lampiran already an absolute URL, use it
    					var lampiranUrl = row.lampiran.indexOf('http') === 0 ? row.lampiran : origin + (row.lampiran.startsWith('/') ? row.lampiran.substring(1) : row.lampiran);
    					lampiranHtml = '<a class="btn btn-sm btn-outline-primary" href="' + lampiranUrl + '" target="_blank" rel="noopener" download>Download Lampiran</a>';
    				}
    				$('#detail_lampiran').html(lampiranHtml);

    				// Clear laporan list while loading
    				$('#detail-laporan-list').html('<div class="spinner" style="width:20px;height:20px;border-width:3px;margin:10px auto"></div>');

    				// Fetch laporan list assigned to this penanganan
    				if (row.id) {
    					$.ajax({
    						url: origin + 'penanganan/laporan_by_id_penanganan',
    						method: 'GET',
    						data: {
    							id: row.id
    						},
    						dataType: 'json',
    						success: function(resp) {
    							var data = [];
    							if (!resp) data = [];
    							else if (Array.isArray(resp)) data = resp;
    							else if (Array.isArray(resp.data)) data = resp.data;
    							else if (Array.isArray(resp.laporan)) data = resp.laporan;

    							// render list similar to selected laporan cards
    							try {
    								if (!data || data.length === 0) {
    									$('#detail-laporan-list').html('<div class="text-muted">Tidak ada laporan terkait.</div>');
    									return;
    								}
    								var listHtml = '';
    								data.forEach(function(item) {
    									var iid = item.id || '-';
    									var user_id = item.user_id || item.id_user || '-';
    									var nama_user = item.nama_user || item.nama_pelapor || item.nama || '-';
    									var kategori = item.kategori || '-';
    									var kabkot = item.kabkot || item.kabupaten || item.kota || '-';
    									var deskripsi = item.deskripsi || item.keterangan || '-';
    									var foto = item.foto || '';
    									var tingkat = item.tingkat_keparahan || item.level || '-';
    									var tanggal = item.tanggal_laporan || item.tanggal || item.created_at || '-';
    									var lon = item.longitude || item.lng || item.lon || '';
    									var lat = item.latitude || item.lat || '';
    									var collapseDesc = 'detail_collapse_desc_' + iid;
    									var collapseMap = 'detail_collapse_map_' + iid;
    									var mapDivId = 'detail_leaflet_map_' + iid;

    									listHtml += '<div class="card mt-2 mb-2" style="border:1px solid #ddd;">';
    									listHtml += '<div class="card-body p-2">';
    									listHtml += '<div class="d-flex justify-content-between align-items-start">';
    									listHtml += '<div><strong>ID: ' + iid + '</strong> &nbsp;|&nbsp; <strong>' + kategori + '</strong><br><small>' + kabkot + ' - Pelapor: ' + nama_user + ' (ID:' + user_id + ')</small></div>';
    									if (foto) {
    										var fotoUrl = (foto.indexOf('http') === 0) ? foto : origin + 'assets/img/dokumentasi/' + foto;
    										listHtml += '<div><a class="btn btn-sm btn-outline-secondary me-1" href="' + fotoUrl + '" target="_blank" rel="noopener">View Foto</a></div>';
    									} else {
    										listHtml += '<div class="text-muted small">No Foto</div>';
    									}
    									listHtml += '</div>';

    									listHtml += '<div class="mt-2 small text-muted">Level: <strong>' + tingkat + '</strong> &nbsp;|&nbsp; Tanggal: ' + tanggal + '</div>';

    									listHtml += '<div class="mt-2 d-flex gap-2">';
    									listHtml += '<button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#' + collapseDesc + '" aria-expanded="false" aria-controls="' + collapseDesc + '" onclick="event.stopPropagation();">Deskripsi</button>';
    									listHtml += '<button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#' + collapseMap + '" aria-expanded="false" aria-controls="' + collapseMap + '" onclick="event.stopPropagation(); initLaporanMapDetail(\'' + iid + '\',' + (lat || 0) + ',' + (lon || 0) + ');">Map</button>';
    									listHtml += '</div>';

    									listHtml += '<div class="collapse mt-2" id="' + collapseDesc + '"><div class="card card-body p-2 border-0" style="background:#f8f9fa; font-size:0.95rem;">' + deskripsi + '</div></div>';

    									listHtml += '<div class="collapse mt-2" id="' + collapseMap + '"><div class="card card-body p-2 border-0" style="background:#fff; font-size:0.95rem;"><div style="width:100%; height:220px;"><div id="' + mapDivId + '" style="width:100%; height:100%; border-radius:6px; overflow:hidden;"></div><div class="mt-1 small text-muted">Longitude: ' + lon + ' &nbsp;|&nbsp; Latitude: ' + lat + '</div></div></div></div>';

    									listHtml += '</div></div>';
    								});
    								$('#detail-laporan-list').html(listHtml);
    							} catch (e) {
    								console.error('render detail laporan failed', e);
    								$('#detail-laporan-list').html('<div class="text-muted">Gagal menampilkan daftar laporan.</div>');
    							}
    						},
    						error: function() {
    							$('#detail-laporan-list').html('<div class="text-muted">Gagal memuat daftar laporan.</div>');
    						}
    					});
    				} else {
    					$('#detail-laporan-list').html('<div class="text-muted">Tidak ada laporan terkait.</div>');
    				}

    				// Open detail modal
    				$('#detailModalLabel').text('Detail Penanganan');
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
    		let tanggal_laporan = data.tanggal_laporan;
    		// format MySQL timestamp (YYYY-MM-DD HH:MM:SS) to user-friendly format
    		function formatTimestamp(ts) {
    			if (!ts) return '-';
    			try {
    				// ensure ISO format for reliable parsing
    				var iso = ts.replace(' ', 'T');
    				var d = new Date(iso);
    				if (isNaN(d.getTime())) {
    					// fallback: try replace space with 'T' and append Z
    					d = new Date(iso + 'Z');
    					if (isNaN(d.getTime())) return ts;
    				}
    				// Indonesian locale, readable format
    				return d.toLocaleString('id-ID', {
    					day: '2-digit',
    					month: 'long',
    					year: 'numeric',
    					hour: '2-digit',
    					minute: '2-digit'
    				});
    			} catch (e) {
    				return ts;
    			}
    		}
    		let tanggal_readable = formatTimestamp(tanggal_laporan);
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
		
								<div class="text-muted small">` + kabkot + `</div>
								<div class="text-muted small mb-2" style="font-size: 11px"><i class="bi bi-calendar-event"></i>&nbsp;` + tanggal_readable + `</div>
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

    	// init map for detail modal (uses separate map container ids)
    	function initLaporanMapDetail(id, lat, lon) {
    		try {
    			var mapDivId = 'detail_leaflet_map_' + id;
    			var container = document.getElementById(mapDivId);
    			if (!container) return;
    			window.laporanMapsDetail = window.laporanMapsDetail || {};
    			if (window.laporanMapsDetail[id]) {
    				try {
    					window.laporanMapsDetail[id].invalidateSize();
    				} catch (e) {}
    				window.laporanMapsDetail[id].setView([lat, lon], 13);
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
    			window.laporanMapsDetail[id] = map;
    			setTimeout(function() {
    				try {
    					map.invalidateSize();
    				} catch (e) {}
    			}, 200);
    		} catch (e) {
    			console.error('initLaporanMapDetail error', e);
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

    		/**
    		 * Submit selectedPetugas and selectedLaporan to penanganan/kelola_penanganan via AJAX
    		 * Optional: pass a selector for the triggering button to disable it during request
    		 */
    		// function submitSelectedForPenanganan(btnSelector = '#kirim-penanganan'){
    		// 	// normalize arrays
    		// 	var petugasArr = Array.isArray(selectedPetugas) ? selectedPetugas : (selectedPetugas ? [selectedPetugas] : []);
    		// 	var laporanArr = Array.isArray(selectedLaporan) ? selectedLaporan : (selectedLaporan ? [selectedLaporan] : []);

    		// 	if(petugasArr.length === 0){
    		// 		Swal.fire({icon:'warning', title:'Pilih Petugas', text:'Silahkan pilih minimal 1 petugas untuk dikirim.'});
    		// 		return;
    		// 	}

    		// 	// Bind modal save button to submitSelectedForPenanganan
    		// 	// Use event delegation in case modal is rendered after script runs
    		// 	$(document).on('click', '#exampleModal #simpan', function(e){
    		// 		e.preventDefault();
    		// 		// call the submit function and pass the button selector so it will be disabled during request
    		// 		submitSelectedForPenanganan('#exampleModal #simpan');
    		// 	});
    		// 	if(laporanArr.length === 0){
    		// 		Swal.fire({icon:'warning', title:'Pilih Laporan', text:'Silahkan pilih minimal 1 laporan untuk dikirim.'});
    		// 		return;
    		// 	}

    		// 	// Extract ids (support objects or plain ids)
    		// 	var petugasIds = petugasArr.map(function(p){ return (typeof p === 'object') ? (p.id || p.ID || p.id_user || p.user_id) : p; }).filter(Boolean);
    		// 	var laporanIds = laporanArr.map(function(l){ return (typeof l === 'object') ? (l.id || l.ID || l.id_laporan) : l; }).filter(Boolean);

    		// 	if(petugasIds.length === 0 || laporanIds.length === 0){
    		// 		Swal.fire({icon:'error', title:'Data tidak valid', text:'Tidak dapat menemukan id pada selection.'});
    		// 		return;
    		// 	}

    		// 	Swal.fire({
    		// 		title: 'Konfirmasi Kirim',
    		// 		text: 'Kirim ' + petugasIds.length + ' petugas untuk menangani ' + laporanIds.length + ' laporan?',
    		// 		icon: 'question',
    		// 		showCancelButton: true,
    		// 		confirmButtonText: 'Ya, kirim',
    		// 		cancelButtonText: 'Batal'
    		// 	}).then(function(result){
    		// 		if(!result.isConfirmed) return;

    		// 		var $btn = $(btnSelector);
    		// 		if($btn.length) {
    		// 			$btn.prop('disabled', true).data('orig-text', $btn.text()).text('Mengirim...');
    		// 		}

    		// 		$.ajax({
    		// 			url: origin + 'penanganan/kelola_penanganan',
    		// 			method: 'POST',
    		// 			data: {
    		// 				petugas: petugasIds,
    		// 				laporan: laporanIds
    		// 			},
    		// 			traditional: true,
    		// 			dataType: 'json'
    		// 		}).done(function(resp){
    		// 			if(!resp){
    		// 				Swal.fire({icon:'error', title:'Error', text:'Response kosong dari server'});
    		// 				return;
    		// 			}
    		// 			if(resp.icon && resp.icon === 'success' || resp.success === true || resp.status == 200){
    		// 				Swal.fire({icon:'success', title: resp.judul || 'Berhasil', text: resp.message || resp.pesan || ''}).then(function(){
    		// 					// clear selections and update UI if helpers exist
    		// 					selectedPetugas = [];
    		// 					selectedLaporan = [];
    		// 					try{ $('#selected-petugas-list').html(''); }catch(e){}
    		// 					try{ $('#selected-laporan-list').html(''); }catch(e){}
    		// 					if(typeof window.refresh_table === 'function') window.refresh_table();
    		// 					if(typeof window.load_table === 'function') window.load_table();
    		// 				});
    		// 			} else {
    		// 				Swal.fire({icon:'error', title: resp.judul || 'Gagal', text: resp.message || JSON.stringify(resp)});
    		// 			}
    		// 		}).fail(function(jqXHR, textStatus){
    		// 			Swal.fire({icon:'error', title:'Terjadi Kesalahan', text: textStatus || 'Network error'});
    		// 		}).always(function(){
    		// 			if($btn.length) {
    		// 				$btn.prop('disabled', false).text($btn.data('orig-text') || 'Kirim');
    		// 			}
    		// 		});
    		// 	});
    		// }
    		searchInterval = setTimeout(() => {
    			$.ajax({
    				// url: origin + "petugas/search_petugas",
    				url: origin + "penanganan/search_laporan",
    				type: "get",
    				data: {
    					q: input.value ?? "",
    					id_penanganan: id_penanganan,
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

    	function clearForm() {
    		id_penanganan = "";
    		selectedPetugas = [];
    		selectedLaporan = [];
    		confirmLaporanSelection(false);
    		confirmPetugasSelection(false);
    		console.log('form cleared');
    	}

    	$("#tambah_data").on('click', clearForm);
    </script>