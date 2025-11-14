<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary ">
                        <h4 class="mb-0 text-white">Forum Laporan Masalah Lingkungan</h4>
                    </div>
                    <div class="card-body">

                        <form id="laporanForm" novalidate>

                            <div class="mb-3">
                                <label for="teksLaporan" class="form-label fs-5">Isi Laporan Anda</label>
                                <textarea class="form-control" id="teksLaporan" name="teksLaporan" rows="6"
                                    placeholder="Tuliskan detail laporan Anda di sini..." required></textarea>
                                <div class="invalid-feedback">
                                    Mohon isi laporan Anda.
                                </div>
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
    <script src="<?= base_url('assets/vendor/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/core/bootstrap.min.js"') ?>"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    <script>
        let longitude;
        let latitude;

        getUserGeo();

        Dropzone.autoDiscover = false;
        $(document).ready(function() {

            // --- PENGATURAN DROPZONE ---

            // 1. Matikan autoDiscover Dropzone agar kita bisa inisialisasi manual

            // 2. Inisialisasi Dropzone pada div #lampiranDropzone
            var myDropzone = new Dropzone("#lampiranDropzone", {
                url: "<?= base_url("/lapor/proses_laporan") ?>", // <-- GANTI DENGAN URL ENDPOINT ANDA
                paramName: "lampiran", // Nama parameter file di server
                maxFilesize: 5, // Ukuran maks file (MB)
                addRemoveLinks: true, // Tampilkan link hapus file
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

                // Nonaktifkan tombol submit untuk mencegah klik ganda
                $("#submitButton").prop("disabled", true).text("Mengirim...");

                // Buat objek FormData untuk mengumpulkan data form (termasuk file)
                var formData = new FormData(this);

                // Ambil file yang ada di antrian Dropzone
                var queuedFiles = myDropzone.getQueuedFiles();

                if (queuedFiles.length > 0) {
                    // --- KASUS 1: ADA FILE YANG DIUNGGAH ---
                    console.log(queuedFiles);
                    // Dropzone tidak bisa langsung kirim data via FormData biasa,
                    // jadi kita atur Dropzone untuk memproses antriannya.

                    // Tambahkan data dari form (textarea) ke request Dropzone
                    // yang akan dikirim saat .processQueue() dipanggil
                    myDropzone.on("sendingmultiple", function(files, xhr, dropzoneFormData) {
                        // 'dropzoneFormData' adalah FormData yang digunakan oleh Dropzone
                        // Kita tambahkan nilai textarea ke dalamnya
                        dropzoneFormData.append("teksLaporan", $("#teksLaporan").val());
                        // Anda bisa tambahkan data lain di sini jika perlu
                        // dropzoneFormData.append("kategori", "urgent");
                    });

                    // Tangani jika sukses
                    myDropzone.on("successmultiple", function(files, response) {
                        console.log("Server response:", response);
                        alert("Laporan Anda (dengan file) berhasil dikirim!");
                        // Reset form
                        resetForm();
                    });

                    // Tangani jika error
                    myDropzone.on("error", function(file, errorMessage) {
                        console.error("Error:", errorMessage);
                        alert("Terjadi kesalahan saat mengunggah file. " + errorMessage);
                        // Aktifkan kembali tombol
                        $("#submitButton").prop("disabled", false).text("Kirim Laporan");
                    });

                    // Mulai proses unggah file (ini akan memicu event 'sendingmultiple')
                    myDropzone.processQueue();

                } else {
                    // --- KASUS 2: TIDAK ADA FILE (HANYA TEKS) ---

                    // Kita tidak perlu Dropzone, kirim form via AJAX jQuery biasa
                    console.log("Mengirim laporan tanpa file...");

                    $.ajax({
                        url: "https://httpbin.org/post", // <-- GANTI DENGAN URL ENDPOINT ANDA
                        type: "POST",
                        data: formData, // formData sudah berisi 'teksLaporan'
                        processData: false, // Wajib false untuk FormData
                        contentType: false, // Wajib false untuk FormData
                        success: function(response) {
                            console.log("Server response:", response);
                            alert("Laporan Anda (tanpa file) berhasil dikirim!");
                            // Reset form
                            resetForm();
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX Error:", error);
                            alert("Terjadi kesalahan saat mengirim laporan.");
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

        function getUserGeo() {
            // Cek apakah Geolocation didukung
            if ("geolocation" in navigator) {
                // Panggil Geolocation API
                navigator.geolocation.getCurrentPosition(
                    // --- FUNGSI SUKSES ---
                    function(position) {
                        // Lokasi berhasil didapat
                        console.log("Lokasi ditemukan:", position.coords.latitude, position.coords.longitude);

                        // Masukkan koordinat ke input tersembunyi
                        longitude = position.coords.latitude;
                        latitude = position.coords.longitude;
                    },
                    // --- FUNGSI ERROR ---
                    function(error) {
                        console.warn("Geolocation error:", error.message);
                        let userMessage = "";
                        switch (error.code) {
                            case error.PERMISSION_DENIED:
                                userMessage = "Anda menolak izin lokasi. Mohon izinkan akses lokasi.";
                                break;
                            case error.POSITION_UNAVAILABLE:
                                userMessage = "Informasi lokasi tidak tersedia. Mohon rinci saja lokasinya di laporan anda (misalnya di kota/ kab apa, kecamatan apa).";
                                break;
                            case error.TIMEOUT:
                                userMessage = "Waktu permintaan lokasi habis. Mohon coba lagi.";
                                break;
                            default:
                                userMessage = "Terjadi kesalahan lokasi. Mohon coba lagi nanti.";
                        }
                        alert(userMessage);
                    }
                );
            } else {
                // Geolocation tidak didukung oleh browser
                alert("Browser Anda tidak mendukung Geolocation. Mohon rinci saja lokasinya di laporan anda (misalnya di kota/ kab apa, kecamatan apa).");
            }
        }
    </script>
</body>