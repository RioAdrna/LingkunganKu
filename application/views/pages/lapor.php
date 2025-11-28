<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header border-2">
						<div class="row align-items-center">
							<div class="col-12 col-sm-8">
								<h4 class="mb-0 text-dark">Forum Laporan Masalah Lingkungan</h4>
								<!-- <h6 class="mb-0">
                                        <i class="fas fa-info-square"></i>&nbsp; Lapor Masalah
                                    </h6> -->
							</div>

						</div>
					</div>
					<div class="card-body">
						<form id="laporanForm" novalidate>

							<div class="mb-3">
								<label for="teksLaporan" class="form-label fs-5">Isi Laporan Anda</label>
								<textarea class="form-control" id="deskripsi" name="deskripsi" rows="6"
									placeholder="Tuliskan detail laporan Anda di sini..." required></textarea>
								<div class="invalid-feedback">
									Mohon isi laporan Anda.
								</div>

								<div class="mb-3">
									<label class="form-label fs-5">Lampiran (Opsional)</label>
									<div id="lampiranDropzone" class="dropzone">
										<div class="dz-message">
											Tarik & lepas file di sini<br>atau<br>
											<span class="text-primary fw-bold">Klik untuk memilih file</span>
										</div>
									</div>
								</div>

								<hr>

								<div class="text-end">
									<button type="submit" id="submitButton" class="btn btn-primary btn-lg">
										Kirim Laporan
									</button>
								</div>

						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="<?= base_url('assets/vendor/jquery/dist/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/js/core/bootstrap.min.js"') ?>"></script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@turf/turf@6/turf.min.js"></script>

<script>
	let longitude;
	let latitude;

	getUserGeo();

	let userLocation = null;
	let locationAvailable = true;
	let endpoint = "<?= base_url("/lapor/proses_laporan") ?>";

	Dropzone.autoDiscover = false;
	$(document).ready(function() {

		// --- PENGATURAN DROPZONE ---

		// 2. Inisialisasi Dropzone pada div #lampiranDropzone
		var myDropzone = new Dropzone("#lampiranDropzone", {
			url: endpoint,
			paramName: "foto",
			maxFilesize: 5,
			addRemoveLinks: true,
			dictRemoveFile: "Hapus file",

			// PENTING: Matikan autoProcessQueue
			// Kita ingin memproses antrian file hanya saat form di-submit
			autoProcessQueue: false,

			// PENTING: Gabungkan unggahan file dalam satu request
			uploadMultiple: true,

			// Atur agar Dropzone tidak "mengambil alih" form submit
			// Kita akan menanganinya secara manual
			// (Ini dilakukan dengan tidak menginisialisasi Dropzone pada tag <form>)
		});

		// --- PENGATURAN SUBMIT FORM DENGAN AJAX ---

		// 3. Tangani event submit pada form #laporanForm
		$("#laporanForm").on("submit", function(e) {
			// Hentikan perilaku default form (agar tidak refresh halaman)
			e.preventDefault();


			// Tambahkan validasi Bootstrap
			var form = $(this);
			if (form[0].checkValidity() === false) {
				form.addClass('was-validated');
				return; // Hentikan jika textarea kosong
			}
			form.removeClass('was-validated');

			// Buat objek FormData untuk mengumpulkan data form (termasuk file)
			var formData = new FormData(this);

			// Ambil file yang ada di antrian Dropzone
			var queuedFiles = myDropzone.getQueuedFiles();

			if (!userLocation && locationAvailable) {
				Swal.fire({
					icon: "warning",
					title: "Izin Lokasi Dibutuhkan",
					text: "Mohon izinkan dulu akses lokasi.",
				});
				return;
			} else {
				//Nanti we
			}

			$("#submitButton").prop("disabled", true).text("Mengirim...");

			if (queuedFiles.length > 0) {
				console.log(queuedFiles);
				myDropzone.on("sendingmultiple", function(files, xhr, dropzoneFormData) {
					dropzoneFormData.append("deskripsi", $("#deskripsi").val());
					dropzoneFormData.append("location_info", JSON.stringify(userLocation));
				});

				// Tangani jika sukses
				myDropzone.on("successmultiple", function(files, response) {
					if (!(response.status >= 200 && response.status < 300)) {
						Swal.fire({
							icon: "error",
							title: "Gagal Mengirim",
							text: "Laporan gagal dikirim.",
						});
						$("#submitButton").prop("disabled", false).text("Kirim Laporan");
						return;
					};
					console.log("Server response:", response);
					Swal.fire({
						icon: "success",
						title: "Berhasil",
						text: "Laporan Anda berhasil dikirim!",
					});
					// Reset form
					resetForm();
				});

				// Tangani jika error
				myDropzone.on("error", function(file, errorMessage) {
					console.error("Error:", errorMessage);
					Swal.fire({
						icon: "error",
						title: "Kesalahan Upload",
						text: "Terjadi kesalahan saat mengunggah file.",
					});
					// Aktifkan kembali tombol
					$("#submitButton").prop("disabled", false).text("Kirim Laporan");
				});

				// Mulai proses unggah file (ini akan memicu event 'sendingmultiple')
				myDropzone.processQueue();

			} else {
				// --- KASUS 2: TIDAK ADA FILE (HANYA TEKS) ---         
				formData.append("location_info", JSON.stringify(userLocation));
				// Kita tidak perlu Dropzone, kirim form via AJAX jQuery biasa
				console.log("Mengirim laporan tanpa file...");
				console.log(formData);
				$.ajax({
					url: endpoint, // <-- GANTI DENGAN URL ENDPOINT ANDA
					type: "POST",
					data: formData,
					processData: false,
					contentType: false,
					success: function(resp) {
						console.log("Server response:", resp);
						if (resp.status < 200 || resp.status >= 300) {
							Swal.fire({
								icon: 'error',
								title: 'Error',
								text: resp.message
							});
							$('#submitButton').prop('disabled', false).text('Kirim Laporan');
						} else {
							Swal.fire({
								icon: 'success',
								title: 'Berhasil',
								text: 'Laporan berhasil dikirim'
							}).then(function() {
								resetForm();
							});
						}
						// Reset form
					},
					error: function(xhr, status, error) {
						console.error("AJAX Error:", error);
						Swal.fire({
							icon: "error",
							title: "Gagal Mengirim",
							text: "Terjadi kesalahan saat mengirim laporan.",
						});
						// Aktifkan kembali tombol
						$("#submitButton").prop("disabled", false).text("Kirim Laporan");
					}
				});
			}
		});

		// Fungsi helper untuk mereset form setelah sukses
		function resetForm() {
			$("#laporanForm")[0].reset(); // Reset nilai form
			myDropzone.removeAllFiles(true); // Hapus semua file di Dropzone
			$("#laporanForm").removeClass('was-validated'); // Hapus status validasi
			$("#submitButton").prop("disabled", false).text("Kirim Laporan"); // Aktifkan tombol
		}

	});

	function getFullAddressInfo(lat, lon) {
		const nominatimURL = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`;
		console.log('Mengambil data dari Nominatim...');

		$.ajax({
			url: nominatimURL,
			method: 'GET',
			dataType: 'json',
			success: function(response) {
				console.log("Respons API Nominatim:", response);
				return response.display_name ?? false;
			},
			error: function(jqXHR, textStatus, errorThrown) {
				const errorMsg = `Gagal mengambil data: ${textStatus}\n${errorThrown}`;
				console.error(errorMsg, jqXHR);
				return false;
			}
		});
	}

	function getUserGeo() {
		// Cek apakah Geolocation didukung
		if ("geolocation" in navigator) {
			// Panggil Geolocation API
			navigator.geolocation.getCurrentPosition(
				// --- FUNGSI SUKSES ---
				position => {
					// Lokasi berhasil didapat
					console.log("Lokasi ditemukan:", position.coords.latitude, position.coords.longitude);

					// Masukkan koordinat ke input tersembunyi
					longitude = position.coords.longitude;
					latitude = position.coords.latitude;

					fetch('<?= base_url("/assets/geojson/Jabar_By_Kab.geojson") ?>')
						.then(res => res.json())
						.then(geojson => {

							// titik yang ingin dicek
							const point = turf.point([longitude, latitude]); // format: [lng, lat]

							// loop semua fitur
							geojson.features.forEach(feature => {

								if (turf.booleanPointInPolygon(point, feature)) {
									userLocation = {
										latitude: latitude,
										longitude: longitude,
										kabkot: feature.properties.KABKOT,
										geojson_id: feature.properties.OBJECTID
									};
								}
							});

							if (userLocation) {
								console.log("Titik berada di wilayah:", userLocation.KABKOT);
							} else {
								console.log("Titik tidak berada di wilayah mana pun");
							}

							let aleng = getFullAddressInfo(userLocation.latitude, userLocation.longitude);
							if (!aleng) {
								userLocation["alamat_lengkap"] = aleng;
							}
						});
				},
				// --- FUNGSI ERROR ---
				error => {
					console.warn("Geolocation error:", error.message);
					let userMessage = "";
					switch (error.code) {
						case error.PERMISSION_DENIED:
							userMessage = "Anda menolak izin lokasi. Mohon izinkan akses lokasi.";
							break;
						case error.POSITION_UNAVAILABLE:
							userMessage = "Informasi lokasi tidak tersedia. Mohon rinci saja lokasinya di laporan anda (misalnya di kota/ kab apa, kecamatan apa).";
							//Nanti disini opsi lain
							break;
						case error.TIMEOUT:
							userMessage = "Waktu permintaan lokasi habis. Mohon coba lagi.";
							break;
						default:
							userMessage = "Terjadi kesalahan lokasi, Mohon coba lagi nanti. Anda dapat melaporkan kesalahan ke tim developer";
					}
					alert(userMessage);
				}
			);
		} else {
			// Geolocation tidak didukung oleh browser
			Swal.fire({
				icon: "warning",
				title: "Geolocation Tidak Didukung",
				text: "Browser Anda tidak mendukung Geolocation. Mohon rinci saja lokasinya di laporan anda (misalnya di kota/ kab apa, kecamatan apa).",
			});

		}
	}
</script>
