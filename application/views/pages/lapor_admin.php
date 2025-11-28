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
    									<i class="fas fa-bullhorn"></i>&nbsp; Lapor Masalah
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
    <!-- Scripts for lapor admin form -->
    <script src="<?= base_url('assets/vendor/jquery/dist/jquery.min.js') ?>"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@turf/turf@6/turf.min.js"></script>
    <script>
    	Dropzone.autoDiscover = false;
    	$(document).ready(function() {
    		var endpoint = "<?= base_url('/lapor/proses_laporan') ?>";

    		// init dropzone
    		var myDropzoneAdmin = new Dropzone("#lampiranDropzoneAdmin", {
    			url: endpoint,
    			paramName: "foto",
    			maxFilesize: 5,
    			addRemoveLinks: true,
    			dictRemoveFile: "Hapus file",
    			autoProcessQueue: false,
    			uploadMultiple: true
    		});

    		// initialize map focused on Jawa Barat
    		var map = L.map('laporan_map').setView([-6.9, 107.6], 8);
    		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    			attribution: '&copy; OSM'
    		}).addTo(map);
    		var marker = null;
    		var userLocation = null;
    		var geoData = null; // will be populated with Jawa Barat geojson

    		function setMarker(lat, lng) {
    			if (marker) map.removeLayer(marker);
    			marker = L.marker([lat, lng]).addTo(map);
    			$('#laporan_lat').val(lat);
    			$('#laporan_lng').val(lng);

    			// determine kabkot using turf if geoData is available
    			if (geoData) {
    				try {
    					var point = turf.point([lng, lat]);
    					var found = null;
    					geoData.features.forEach(function(feature) {
    						if (!found && turf.booleanPointInPolygon(point, feature)) {
    							found = feature;
    						}
    					});

    					if (found) {
    						userLocation = {
    							latitude: lat,
    							longitude: lng,
    							kabkot: found.properties.KABKOT,
    							geojson_id: found.properties.OBJECTID
    						};
    					} else {
    						userLocation = {
    							latitude: lat,
    							longitude: lng,
    							kabkot: null,
    							geojson_id: null
    						};
    					}
    					console.log('userLocation:', userLocation);
    				} catch (err) {
    					console.warn('Error computing kabkot:', err);
    					userLocation = {
    						latitude: lat,
    						longitude: lng,
    						kabkot: null
    					};
    				}
    			} else {
    				// fallback if geojson not loaded yet
    				userLocation = {
    					latitude: lat,
    					longitude: lng,
    					kabkot: null
    				};
    			}
    		}
    		$('#exampleModal').on('shown.bs.modal', function() {
    			setTimeout(() => {
    				map.invalidateSize();
    			}, 300);
    		});

    		// click to pick location
    		map.on('click', function(e) {
    			var lat = e.latlng.lat;
    			var lng = e.latlng.lng;
    			setMarker(lat, lng);
    		});

    		fetch(`${origin}/assets/geojson/Jabar_By_Kab.geojson`)
    			.then((response) => response.json())
    			.then((data) => {
    				geoData = data;
    				L.geoJSON(data, {
    					style: function(feature) {
    						const idx = feature.properties.OBJECTID - 1 || 0; // pastikan setiap feature punya id unik (0–26)
    						return {
    							color: "black",
    							weight: 0,
    							fillColor: "#00c8faff",
    							fillOpacity: 0.15,
    						};
    					},
    				}).addTo(map);
    			});

    		// form submit
    		$('#laporanAdminForm').on('submit', function(e) {
    			e.preventDefault();
    			var form = this;
    			if ($(form)[0].checkValidity() === false) {
    				$(form).addClass('was-validated');
    				return;
    			}
    			$(form).removeClass('was-validated');

    			var queuedFiles = myDropzoneAdmin.getQueuedFiles();
    			if (!userLocation) {
    				Swal.fire({
    					icon: 'warning',
    					title: 'Pilih Lokasi',
    					text: 'Silahkan pilih lokasi laporan pada peta terlebih dahulu.'
    				});
    				return;
    			}

    			$('#simpan').prop('disabled', true).text('Mengirim...');

    			if (queuedFiles.length > 0) {
    				myDropzoneAdmin.on('sendingmultiple', function(files, xhr, dropzoneFormData) {
    					dropzoneFormData.append('deskripsi', $('#deskripsi').val());
    					dropzoneFormData.append('location_info', JSON.stringify(userLocation));
    				});

    				myDropzoneAdmin.on('successmultiple', function(files, response) {
    					if (response.status < 200 || response.status >= 300) {
    						Swal.fire({
    							icon: 'error',
    							title: 'Error',
    							text: response.message
    						});
    						$('#simpan').prop('disabled', false).text('Kirim Laporan');
    					} else {
    						Swal.fire({
    							icon: 'success',
    							title: 'Berhasil',
    							text: 'Laporan berhasil dikirim'
    						}).then(function() {
    							myDropzoneAdmin.removeAllFiles(true);
    							$('#laporanAdminForm')[0].reset();
    							$('#simpan').prop('disabled', false).text('Kirim Laporan');
    							$('#exampleModal').modal('hide');
    						});
    					}
    				});

    				myDropzoneAdmin.on('error', function(file, err) {
    					Swal.fire({
    						icon: 'error',
    						title: 'Gagal',
    						text: 'Terjadi kesalahan saat mengirim'
    					});
    					$('#simpan').prop('disabled', false).text('Kirim Laporan');
    				});

    				myDropzoneAdmin.processQueue();
    			} else {
    				var fd = new FormData();
    				fd.append('deskripsi', $('#deskripsi').val());
    				fd.append('location_info', JSON.stringify(userLocation));

    				$.ajax({
    					url: endpoint,
    					method: 'POST',
    					data: fd,
    					processData: false,
    					contentType: false,
    					success: function(resp) {
    						console.log(resp);
    						if (resp.status < 200 || resp.status >= 300) {
    							Swal.fire({
    								icon: 'error',
    								title: 'Error',
    								text: resp.message
    							});
    							$('#simpan').prop('disabled', false).text('Kirim Laporan');
    						} else {
    							Swal.fire({
    								icon: 'success',
    								title: 'Berhasil',
    								text: 'Laporan berhasil dikirim'
    							}).then(function() {
    								$('#laporanAdminForm')[0].reset();
    								$('#simpan').prop('disabled', false).text('Kirim Laporan');
    								$('#exampleModal').modal('hide');
    							});
    						}
    					},
    					error: function() {
    						Swal.fire({
    							icon: 'error',
    							title: 'Gagal',
    							text: 'Terjadi kesalahan saat mengirim'
    						});
    						$('#simpan').prop('disabled', false).text('Kirim Laporan');
    					}
    				});
    			}
    		});

    	});
    </script>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i>&nbsp; Tambah Laporan</h5>
    				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
    			</div>
    			<div class="modal-body">
    				<form id="laporanAdminForm" novalidate>
    					<!-- kategori field removed as requested -->

    					<div class="row mb-3">
    						<label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
    						<div class="col-md-7 col-xs-6">
    							<textarea class="form-control shadow-sm border-1" id="deskripsi" name="deskripsi" placeholder="Tulis deskripsi laporan di sini..." style="min-height:120px;max-height:350px;resize:vertical;border-radius:8px"></textarea>
    						</div>
    					</div>

    					<div class="row mb-3">
    						<label class="col-sm-4 col-form-label">Lampiran (Opsional)</label>
    						<div class="col-md-7 col-xs-6">
    							<div id="lampiranDropzoneAdmin" class="dropzone">
    								<div class="dz-message">Tarik & lepas file di sini<br>atau<br><span class="text-primary fw-bold">Klik untuk memilih file</span></div>
    							</div>
    						</div>
    					</div>

    					<div class="row mb-3">
    						<label class="col-sm-4 col-form-label">Pilih Lokasi</label>
    						<div class="col-md-7 col-xs-6">
    							<div id="laporan_map" style="width:100%; height:300px; border:1px solid #ddd; border-radius:8px; overflow:hidden;"></div>
    							<input type="hidden" id="laporan_lat" name="latitude">
    							<input type="hidden" id="laporan_lng" name="longitude">
    							<div class="form-text">Klik di peta untuk memilih lokasi laporan. Peta difokuskan ke Jawa Barat.</div>
    						</div>
    					</div>

    					<div class="modal-footer">
    						<button id="clear" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
    						<button id="simpan" type="submit" class="btn btn-primary">Kirim Laporan</button>
    					</div>
    				</form>
    			</div>
    		</div>
    	</div>
    </div>
