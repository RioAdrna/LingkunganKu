<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0"><i class="fas fa-book me-2 text-dark"></i>Panduan Penggunaan Aplikasi</h4>
                    </div>
                    <div class="card-body">
                        <!-- Hero Section -->
                        <div class="row align-items-center mb-5">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <h2 class="text-dark mb-0 me-3">Selamat Datang di Aplikasi Kami</h2>
                                </div>
                                <p class="text-muted mt-3">Pelajari cara menggunakan aplikasi dengan mudah melalui panduan interaktif berikut.</p>
                            </div>
                            <div class="col-md-6 text-center">
                                <img src="<?= base_url('assets/img/guide.png') ?>" alt="Guide" class="img-fluid" style="max-height: 350px;">
                            </div>
                        </div>

                        <!-- Quick Steps -->
                        <div class="row mb-5">
                            <div class="col-12">
                                <h4 class="text-center mb-4 text-dark"><i class="fas fa-bolt text-warning me-2"></i>Langkah Cepat</h4>
                                <div class="row g-3">
                                    <div class="col-sm-6 col-md-3">
                                        <div class="card border h-100 text-center hover-shadow">
                                            <div class="card-body py-4">
                                                <div class="icon-shape bg-dark text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                    <i class="fas fa-user-plus"></i>
                                                </div>
                                                <h6 class="card-title">1. Registrasi</h6>
                                                <p class="card-text small text-muted">Daftar akun baru untuk memulai</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="card border h-100 text-center hover-shadow">
                                            <div class="card-body py-4">
                                                <div class="icon-shape bg-success text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                    <i class="fas fa-sign-in-alt"></i>
                                                </div>
                                                <h6 class="card-title">2. Login</h6>
                                                <p class="card-text small text-muted">Masuk ke akun Anda</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="card border h-100 text-center hover-shadow">
                                            <div class="card-body py-4">
                                                <div class="icon-shape bg-info text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                    <i class="fas fa-compass"></i>
                                                </div>
                                                <h6 class="card-title">3. Jelajahi</h6>
                                                <p class="card-text small text-muted">Jelajahi fitur-fitur aplikasi</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="card border h-100 text-center hover-shadow">
                                            <div class="card-body py-4">
                                                <div class="icon-shape bg-warning text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                    <i class="fas fa-flag"></i>
                                                </div>
                                                <h6 class="card-title">4. Selesai</h6>
                                                <p class="card-text small text-muted">Nikmati pengalaman menggunakan aplikasi</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Detailed Guide -->
                        <div class="row g-4">
                            <div class="col-lg-8">
                                <h4 class="mb-4 text-dark"><i class="fas fa-list-ol text-info me-2"></i>Panduan Detail</h4>

                                <div class="accordion" id="guideAccordion">
                                    <!-- Step 1 -->
                                    <div class="accordion-item border">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#step1">
                                                <i class="fas fa-user-plus text-dark me-2"></i>
                                                <strong>Registrasi Akun Baru</strong>
                                            </button>
                                        </h2>
                                        <div id="step1" class="accordion-collapse collapse show" data-bs-parent="#guideAccordion">
                                            <div class="accordion-body">
                                                <ol class="mb-0">
                                                    <li class="mb-2">Klik tombol <span class="badge bg-dark">Register</span> di halaman login</li>
                                                    <li class="mb-2">Isi formulir dengan data yang valid</li>
                                                    <li class="mb-2">Pastikan password minimal 8 karakter</li>
                                                    <li>Klik <span class="badge bg-success">Submit</span> untuk menyelesaikan registrasi</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Step 2 -->
                                    <div class="accordion-item border mt-3">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#step2">
                                                <i class="fas fa-sign-in-alt text-success me-2"></i>
                                                <strong>Login ke Aplikasi</strong>
                                            </button>
                                        </h2>
                                        <div id="step2" class="accordion-collapse collapse" data-bs-parent="#guideAccordion">
                                            <div class="accordion-body">
                                                <ol class="mb-0">
                                                    <li class="mb-2">Masukkan email dan password yang sudah terdaftar</li>
                                                    <li class="mb-2">Klik tombol <span class="badge bg-dark">Login</span></li>
                                                    <li class="mb-2">Tunggu proses autentikasi selesai</li>
                                                    <li>Anda akan diarahkan ke dashboard utama</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Step 3 - Upload Laporan -->
                                    <div class="accordion-item border mt-3">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#step3">
                                                <i class="fas fa-upload text-primary me-2"></i>
                                                <strong>Upload Laporan & Pelaporan</strong>
                                            </button>
                                        </h2>
                                        <div id="step3" class="accordion-collapse collapse" data-bs-parent="#guideAccordion">
                                            <div class="accordion-body">
                                                <ol class="mb-0">
                                                    <li class="mb-2">Klik menu <span class="badge bg-primary">Lapor</span> di navigasi utama</li>
                                                    <li class="mb-2">Pilih jenis laporan (Banjir, Sampah, Kerusakan, dll)</li>
                                                    <li class="mb-2">Isi deskripsi kejadian dengan jelas</li>
                                                    <li class="mb-2">Upload foto pendukung (maksimal 5MB)</li>
                                                    <li class="mb-2">Tentukan lokasi kejadian di peta</li>
                                                    <li class="mb-2">Klik <span class="badge bg-success">Kirim Laporan</span></li>
                                                    <li>Laporan akan langsung terproses dan muncul di peta</li>
                                                </ol>
                                                <div class="alert bg-info text-dark mt-3">
                                                    <i class="fas fa-info-circle me-2"></i>
                                                    <strong>Tips:</strong> Gunakan foto yang jelas dan deskripsi yang detail untuk laporan yang lebih akurat.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Step 4 - Fitur Peta & Deteksi -->
                                    <div class="accordion-item border mt-3">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#step4">
                                                <i class="fas fa-map-marked-alt text-danger me-2"></i>
                                                <strong>Fitur Peta & Deteksi Banjir</strong>
                                            </button>
                                        </h2>
                                        <div id="step4" class="accordion-collapse collapse" data-bs-parent="#guideAccordion">
                                            <div class="accordion-body">
                                                <h6 class="text-dark mb-3">Sistem Deteksi Banjir Otomatis:</h6>
                                                <div class="row g-3 mb-4">
                                                    <div class="col-md-6">
                                                        <div class="d-flex align-items-start">
                                                            <i class="fas fa-water text-primary me-3 mt-1"></i>
                                                            <div>
                                                                <h6 class="mb-1">Deteksi Area Banjir</h6>
                                                                <p class="small text-muted mb-0">Sistem otomatis mendeteksi area banjir berdasarkan laporan pengguna</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="d-flex align-items-start">
                                                            <i class="fas fa-exclamation-triangle text-warning me-3 mt-1"></i>
                                                            <div>
                                                                <h6 class="mb-1">Zona Bahaya</h6>
                                                                <p class="small text-muted mb-0">Area berbahaya ditandai dengan warna merah di peta</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <h6 class="text-dark mb-3">Cara Melihat Laporan di Peta:</h6>
                                                <ol class="mb-0">
                                                    <li class="mb-2">Buka menu <span class="badge bg-warning">Peta Laporan</span></li>
                                                    <li class="mb-2">Zoom in/out untuk melihat area tertentu</li>
                                                    <li class="mb-2">Klik marker untuk melihat detail laporan</li>
                                                    <li class="mb-2">Gunakan filter berdasarkan jenis laporan</li>
                                                    <li>Pantau update real-time kondisi lingkungan</li>
                                                </ol>

                                                <div class="alert bg-danger text-white mt-3">
                                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                                    <strong>Perhatian:</strong> Area berwarna merah menandakan zona bahaya banjir yang memerlukan perhatian khusus.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Step 5 - Menjelajahi Fitur -->
                                    <div class="accordion-item border mt-3">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#step5">
                                                <i class="fas fa-compass text-info me-2"></i>
                                                <strong>Menjelajahi Fitur Lainnya</strong>
                                            </button>
                                        </h2>
                                        <div id="step5" class="accordion-collapse collapse" data-bs-parent="#guideAccordion">
                                            <div class="accordion-body">
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <div class="d-flex align-items-start">
                                                            <i class="fas fa-map-marker-alt text-danger me-3 mt-1"></i>
                                                            <div>
                                                                <h6 class="mb-1">Fitur Lokasi</h6>
                                                                <p class="small text-muted mb-0">Gunakan fitur lokasi untuk melihat cabang-cabang terdekat dan memantau zona-zona rawan bencana seperti banjir, longsor, dan kebakaran yang terdeteksi secara real-time</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="d-flex align-items-start">
                                                            <i class="fas fa-chart-bar text-success me-3 mt-1"></i>
                                                            <div>
                                                                <h6 class="mb-1">Fitur Laporan</h6>
                                                                <p class="small text-muted mb-0">Lihat laporan dan analisis data secara real-time</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="d-flex align-items-start">
                                                            <i class="fas fa-history text-primary me-3 mt-1"></i>
                                                            <div>
                                                                <h6 class="mb-1">Riwayat Laporan</h6>
                                                                <p class="small text-muted mb-0">Lihat history dan status laporan yang telah dikirim</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="d-flex align-items-start">
                                                            <i class="fas fa-bell text-warning me-3 mt-1"></i>
                                                            <div>
                                                                <h6 class="mb-1">Notifikasi</h6>
                                                                <p class="small text-muted mb-0">Dapatkan pemberitahuan update laporan</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Sidebar Tips -->
                            <div class="col-lg-4">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title text-dark"><i class="fas fa-lightbulb text-warning me-2"></i>Tips & Trik</h5>
                                        <div class="mt-3">
                                            <div class="d-flex align-items-start mb-3">
                                                <i class="fas fa-mobile-alt text-dark me-3 mt-1"></i>
                                                <div>
                                                    <h6 class="mb-1 small fw-bold">Akses Mobile</h6>
                                                    <p class="small text-muted mb-0">Aplikasi responsive untuk semua device</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-start mb-3">
                                                <i class="fas fa-sync-alt text-success me-3 mt-1"></i>
                                                <div>
                                                    <h6 class="mb-1 small fw-bold">Auto Save</h6>
                                                    <p class="small text-muted mb-0">Data tersimpan otomatis</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-start mb-3">
                                                <i class="fas fa-camera text-info me-3 mt-1"></i>
                                                <div>
                                                    <h6 class="mb-1 small fw-bold">Foto Jelas</h6>
                                                    <p class="small text-muted mb-0">Upload foto yang jelas untuk laporan akurat</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-start">
                                                <i class="fas fa-shield-alt text-danger me-3 mt-1"></i>
                                                <div>
                                                    <h6 class="mb-1 small fw-bold">Keamanan</h6>
                                                    <p class="small text-muted mb-0">Data Anda terlindungi dengan enkripsi</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php if (in_array($this->session->userdata('level'), ["user"])) { ?>

                                    <!-- Emergency Card -->
                                    <div class="card border-danger mt-4">
                                        <div class="card-body text-center py-4">
                                            <i class="fas fa-exclamation-triangle fa-2x text-danger mb-3"></i>
                                            <h6 class="card-title">Darurat Banjir?</h6>
                                            <p class="card-text small text-muted mb-3">Segera laporkan untuk respon cepat</p>
                                            <a href="<?= base_url("?p=" . base64_encode('lapor')) ?>" class="btn btn-danger btn-sm">
                                                <i class="fas fa-bullhorn me-1"></i>Lapor Darurat
                                            </a>
                                        </div>
                                    </div>

                                <?php } ?>

                                <?php if (in_array($this->session->userdata('level'), ["admin", "petugas"])) { ?>
                                    <div class="card border-danger mt-4">
                                        <div class="card-body text-center py-4">
                                            <i class="fas fa-exclamation-triangle fa-2x text-danger mb-3"></i>
                                            <h6 class="card-title">Darurat Banjir?</h6>
                                            <p class="card-text small text-muted mb-3">Segera laporkan untuk respon cepat</p>
                                            <a href="<?= base_url("?p=" . base64_encode('lapor_admin')) ?>" class="btn btn-danger btn-sm">
                                                <i class="fas fa-bullhorn me-1"></i>Lapor Darurat
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>

                                <!-- Support Card -->
                                <div class="card border-warning mt-4">
                                    <div class="card-body text-center py-4">
                                        <i class="fas fa-headset fa-2x text-warning mb-3"></i>
                                        <h6 class="card-title">Butuh Bantuan?</h6>
                                        <p class="card-text small text-muted mb-3">Tim support kami siap membantu 24/7</p>
                                        <a href="https://wa.me/message/BQMA533AFF4WG1" class="btn btn-warning btn-sm">
                                            <i class="fas fa-phone me-1"></i>Hubungi Support
                                        </a>
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

<style>
    .hover-shadow:hover {
        transform: translateY(-2px);
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1) !important;
    }

    .card {
        transition: all 0.3s ease;
    }

    .icon-shape {
        transition: all 0.3s ease;
    }
</style>