<body>
    <div id="spinner" class="show w-100 vh-100 bg-blue position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>

    <div class="container-fluid border-bottom bg-white wow fadeIn" data-wow-delay="0.1s">
        <div class="" style="border-radius: 0 40px">

        </div>
        <div class="container px-0">
            <nav class="navbar navbar-light navbar-expand-xl py-3">
                <a class="navbar-brand d-flex align-items-center flex-wrap">
                    <img src="<?= base_url('assets/img/logos/Logo_LingkunganKu-1.png') ?>" width="100" class="me-2 mb-2 mb-sm-0">
                    <h1 class="text-primary display-6 m-0" style="color: #1A2A4F;">
                        <span class="text-secondary">Lingkunganku</span>
                    </h1>
                </a>


                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">

                    <!-- Menu di tengah -->
                    <div class="navbar-nav mx-auto">
                        <a href="#home" class="nav-item nav-link active">Home</a>
                        <a href="#about" class="nav-item nav-link">About</a>
                        <a href="#contact" class="nav-item nav-link">Contact</a>
                    </div>

                    <?php
                    $p = $this->input->get("p");
                    $current_page = $p ? base64_decode($p) : '';
                    ?>

                    <!-- Tombol Login di paling kanan -->
                    <div class="d-flex ms-auto">
                        <a href="<?= base_url("login") ?>"
                            class="btn btn-primary btn-lg rounded-3 px-4 py-2">
                            <i class="fas fa-sign-in-alt fa-lg"></i>
                        </a>
                    </div>

                </div>
            </nav>

        </div>
    </div>
    <!-- Navbar End -->

    <!-- HOME -->
    <section class="container-fluid" style="background: #F3F8F4; padding-top: 40px; padding-bottom: 80px;">
        <div class="container">

            <div id="home" class="row g-5 align-items-center">

                <!-- LEFT CONTENT -->
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <h2 class="text-success fw-bold mb-2" style="font-size: 22px;">
                        BERSAMA MENJAGA BUMI
                    </h2>

                    <h1 class="fw-bold text-success mb-4" style="font-size: 55px; font-family: 'cursive';">
                        Laporkan Masalah Lingkungan Sekitar Anda
                    </h1>

                    <p class="text-dark mb-4" style="max-width: 450px;">
                        Laporkan keluhan lingkungan Anda dengan mudah—mulai dari sampah, kerusakan fasilitas umum, hingga pencemaran. Bersama, kita wujudkan lingkungan yang bersih, aman, dan lebih nyaman.
                    </p>

                    <a href="<?= base_url("login") ?>" class="btn btn-success">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>

                </div>

                <!-- RIGHT IMAGE -->
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="text-center">
                        <img src="<?= base_url('assets/img/landing/life.png') ?>"
                            alt="Environment" class="img-fluid"
                            style="max-width: 100%;">
                    </div>
                </div>

            </div>

        </div>
    </section>




    <!-- About Start -->
    <div class="container-fluid py-5 about bg-light">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="video border">
                            <span></span>
                        </button>
                    </div>
                </div>

                <div id="about" class="col-lg-7 wow fadeIn" data-wow-delay="0.3s">
                    <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">
                        Tentang Kami
                    </h4>

                    <h1 class="text-dark mb-4 display-5">
                        Platform Aspirasi Lingkungan untuk Masyarakat yang Peduli
                    </h1>

                    <p class="text-dark mb-4">
                        Kami menyediakan ruang bagi masyarakat untuk menyampaikan laporan, keluhan, dan aspirasi terkait masalah lingkungan seperti sampah, banjir, pencemaran, dan kerusakan alam.
                        Melalui teknologi dan partisipasi publik, kami membantu mempercepat tindakan nyata dan meningkatkan kesadaran menjaga lingkungan bersama.
                    </p>

                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2"></i>Laporan Lingkungan Secara Online</h6>
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-primary"></i>Pemetaan Titik Masalah Real-Time</h6>
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-secondary"></i>Kolaborasi dengan Komunitas & Pemerintah</h6>
                        </div>

                        <div class="col-lg-6">
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2"></i>Edukasi & Informasi Publik</h6>
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-primary"></i>Transparansi Data Lingkungan</h6>
                            <h6><i class="fas fa-check-circle me-2 text-secondary"></i>Respons Cepat & Tindak Lanjut</h6>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Video -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                            allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Apa yang Kami Lakukan</h4>
                <h1 class="mb-5 display-3" style="color: #F3F8F4;">Bersama Menjaga Lingkungan Lebih Bersih dan Aman</h1>
            </div>

            <div class="row g-5">

                <!-- Sampah Sungai -->
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="text-center border-primary border bg-white service-item">
                        <div class="service-content d-flex align-items-center justify-content-center p-4">
                            <div class="service-content-inner">
                                <div class="p-4"><i class="fas fa-recycle fa-6x text-primary"></i></div>
                                <a href="#" class="h4">Pengelolaan Sampah Sungai</a>
                                <p class="my-3">Pembersihan dan edukasi untuk mengurangi sampah plastik di sungai demi menjaga ekosistem air.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Daerah Rawan Banjir -->
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeIn" data-wow-delay="0.3s">
                    <div class="text-center border-primary border bg-white service-item">
                        <div class="service-content d-flex align-items-center justify-content-center p-4">
                            <div class="service-content-inner">
                                <div class="p-4"><i class="fas fa-water fa-6x text-primary"></i></div>
                                <a href="#" class="h4">Pencegahan Daerah Rawan Banjir</a>
                                <p class="my-3">Edukasi dan penghijauan untuk mengurangi banjir serta meningkatkan penyerapan air.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kebakaran Hutan -->
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeIn" data-wow-delay="0.5s">
                    <div class="text-center border-primary border bg-white service-item">
                        <div class="service-content d-flex align-items-center justify-content-center p-4">
                            <div class="service-content-inner">
                                <div class="p-4"><i class="fas fa-fire fa-6x text-primary"></i></div>
                                <a href="#" class="h4">Pencegahan Kebakaran Hutan</a>
                                <p class="my-3">Sosialisasi bahaya pembakaran liar dan pengawasan dini dalam mencegah kebakaran hutan.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edukasi Lingkungan -->
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeIn" data-wow-delay="0.7s">
                    <div class="text-center border-primary border bg-white service-item">
                        <div class="service-content d-flex align-items-center justify-content-center p-4">
                            <div class="service-content-inner">
                                <div class="p-4"><i class="fas fa-seedling fa-6x text-primary"></i></div>
                                <a href="#" class="h4">Edukasi Lingkungan</a>
                                <p class="my-3">Program daur ulang, pemilahan sampah, dan pembiasaan hidup ramah lingkungan sejak dini.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>

    <!-- Service End -->


    <!-- Programs Start -->
    <div class="container-fluid program py-5">
        <div class="container py-5">

            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">
                    Program Lingkungan
                </h4>
                <h1 class="mb-5 display-3" style="color: #F3F8F4;">Kami Menyediakan Wadah Mengenai Keresahan Lingkungan</h1>
            </div>

            <div class="row g-5 justify-content-center">

                <!-- Program 1: Kebersihan Sungai -->
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="program-item rounded">
                        <div class="program-img position-relative">
                            <div class="overflow-hidden img-border-radius">
                                <img src="<?= base_url('assets/img/landing/sungai.jpg') ?>" class="img-fluid w-100" alt="Kebersihan Sungai">
                            </div>
                        </div>

                        <div class="program-text bg-white px-4 pb-3">
                            <div class="program-text-inner">
                                <a href="#" class="h4"> Kebersihan Sungai</a>
                                <p class="mt-3 mb-0">
                                    Edukasi dan kegiatan membersihkan sampah sungai untuk menjaga kualitas air dan ekosistem.
                                </p>
                            </div>
                        </div>

                        <!-- <div class="program-teacher d-flex align-items-center border-top border-primary bg-white px-4 py-3">
                        <img src="<?= base_url('assets/img/landing/program-teacher.jpg') ?>" class="img-fluid rounded-circle p-2 border border-primary bg-white" style="width: 70px; height: 70px;">
                        <div class="ms-3">
                            <h6 class="mb-0 text-primary">Relawan Lingkungan</h6>
                            <small>Koordinator Program</small>
                        </div>
                    </div> -->

                        <!-- <div class="d-flex justify-content-between px-4 py-2 bg-primary rounded-bottom">
                        <small class="text-white"><i class="fas fa-users me-1"></i> 30 Peserta</small>
                        <small class="text-white"><i class="fas fa-book me-1"></i> 10 Materi</small>
                        <small class="text-white"><i class="fas fa-clock me-1"></i> 40 Jam</small>
                    </div> -->
                    </div>
                </div>


                <!-- Program 2: Penghijauan -->
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="program-item rounded">
                        <div class="program-img position-relative">
                            <div class="overflow-hidden img-border-radius">
                                <img src="<?= base_url('assets/img/landing/penanaman.jpg') ?>" class="img-fluid w-100" alt="Penghijauan">
                            </div>
                        </div>

                        <div class="program-text bg-white px-4 pb-3">
                            <div class="program-text-inner">
                                <a href="#" class="h4">Penghijauan & Penanaman Pohon</a>
                                <p class="mt-3 mb-0">
                                    Penanaman pohon, pembuatan ruang hijau, dan edukasi pentingnya vegetasi untuk mencegah banjir & polusi.
                                </p>
                            </div>
                        </div>

                        <!-- <div class="program-teacher d-flex align-items-center border-top border-primary bg-white px-4 py-3">
                        <img src="<?= base_url('assets/img/landing/program-teacher.jpg') ?>" class="img-fluid rounded-circle p-2 border border-primary bg-white" style="width: 70px; height: 70px;">
                        <div class="ms-3">
                            <h6 class="mb-0 text-primary">Relawan Lingkungan</h6>
                            <small>Pemandu Lapangan</small>
                        </div>
                    </div> -->

                        <!-- <div class="d-flex justify-content-between px-4 py-2 bg-primary rounded-bottom">
                        <small class="text-white"><i class="fas fa-tree me-1"></i> 50 Pohon</small>
                        <small class="text-white"><i class="fas fa-book me-1"></i> 8 Materi</small>
                        <small class="text-white"><i class="fas fa-clock me-1"></i> 30 Jam</small>
                    </div> -->
                    </div>
                </div>


                <!-- Program 3: Daur Ulang -->
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="program-item rounded">
                        <div class="program-img position-relative">
                            <div class="overflow-hidden img-border-radius">
                                <img src="<?= base_url('assets/img/landing/sampah.jpg') ?>" class="img-fluid w-100" alt="Daur Ulang">
                            </div>
                        </div>

                        <div class="program-text bg-white px-4 pb-3">
                            <div class="program-text-inner">
                                <a href="#" class="h4">Daur Ulang & Pengelolaan Sampah</a>
                                <p class="mt-3 mb-0">
                                    Mengajarkan pemilahan sampah, daur ulang, serta cara mengurangi sampah rumah tangga.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="d-inline-block text-center wow fadeIn" data-wow-delay="0.1s">
                    <!-- <a href="#" class="btn btn-primary px-5 py-3 text-white btn-border-radius">Lihat Semua Program</a> -->
                </div>

            </div>

        </div>
    </div>
    <!-- Program End -->


    <!-- Footer Start -->

    <!-- BRAND & NEWSLETTER -->
    <div id="contact" class="container-fluid testimonial py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Contact</h4>
                <h1 class="mb-5 display-3">Hubungi kami</h1>
            </div>
            <div class="container py-5">
                <div class="row g-5">

                    <!-- BRAND & DESKRIPSI -->
                    <div class="col-md-6 col-lg-4 col-xl-4">
                        <div class="footer-item">
                            <h2 class="fw-bold mb-3">
                                <span class="text-primary">Suara</span><span class="text-secondary">Lingkungan</span>
                            </h2>
                            <p class="mb-4">
                                Platform penyampaian aspirasi dan informasi masyarakat mengenai kondisi lingkungan,
                                kebersihan kota, pelestarian alam, serta pelaporan masalah lingkungan di sekitar Anda.
                            </p>
                        </div>
                    </div>

                    <!-- JAM OPERASIONAL -->
                    <div class="col-md-6 col-lg-4 col-xl-4">
                        <div class="footer-item">
                            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">
                                JAM LAYANAN
                            </h4>
                            <div class="d-flex flex-column p-4 ps-5 text-dark border border-primary"
                                style="border-radius: 50% 20% / 10% 40%;">
                                <p>Senin: 08.00 – 17.00</p>
                                <p>Selasa: 08.00 – 17.00</p>
                                <p>Rabu: 08.00 – 17.00</p>
                                <p>Kamis: 08.00 – 17.00</p>
                                <p>Jumat: 08.00 – 17.00</p>
                                <p>Sabtu: 08.00 – 13.00</p>
                                <p class="mb-0">Minggu: Libur</p>
                            </div>
                        </div>
                    </div>

                    <!-- KONTAK -->
                    <div class="col-md-6 col-lg-4 col-xl-4" >
                        <div class="footer-item">
                            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">
                                KONTAK
                            </h4>
                            <div class="d-flex flex-column align-items-start">
                                <a href="#" class="text-body mb-4">
                                    <i class="fa fa-map-marker-alt text-primary me-2"></i>
                                    Jl. Lingkungan Hijau No. 27, Cimahi, Indonesia
                                </a>
                                <a href="#" class="text-body mb-4">
                                    <i class="fa fa-phone-alt text-primary me-2"></i>
                                    (+62) 812-3456-7890
                                </a>
                                <a href="#" class="text-body mb-4">
                                    <i class="fas fa-envelope text-primary me-2"></i>
                                    info@suara-lingkungan.com
                                </a>
                                <a href="#" class="text-body mb-4">
                                    <i class="fa fa-clock text-primary me-2"></i>
                                    Pengaduan 24 Jam
                                </a>

                                <div class="footer-icon d-flex">
                                    <a class="btn btn-primary btn-sm-square me-3 rounded-circle text-white" href="#">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a class="btn btn-primary btn-sm-square me-3 rounded-circle text-white" href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a class="btn btn-primary btn-sm-square me-3 rounded-circle text-white" href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a class="btn btn-primary btn-sm-square rounded-circle text-white" href="#">
                                        <i class="fab fa-linkedin-in"></i>
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

    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4" style="background-color: #1A2A4F;">
        <div class="container copyright text-center mt-4" >
            <p class="text-white">© <span>Copyright</span> <strong class="px-1 sitename">LINGKUNGANKU NEURO</strong> <span>All Rights
                    Reserved</span>
            </p>
            <div class="credits text-white">

                Designed & Developed by <a
                    href="https://www.instagram.com/universitas_nurtanio?igsh=emZjampwMzZydWsx" style="color: #75ba58ff;">Tim Neuro -
                    Universitas Nurtanio Bandung</a>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/js/wow.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/easing.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/waypoints.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/lightbox.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/owl.carousel.min.js') ?>"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        window.onload = function() {
            var spinner = document.getElementById("spinner");
            if (spinner) spinner.classList.remove("show");
        };
    </script>

</body>