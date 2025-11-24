<!--
=========================================================
* Argon Dashboard 3 - v2.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2024 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->


<body class="g-sidenav-show   bg-gray-100">
	<div class="min-height-300 position-absolute w-100" style="background-color: #1A2A4F;">
	</div>
	<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
		<div class="sidenav-header">
			<i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
			<a class="navbar-brand m-0">
				<img src="<?= base_url('assets/img/logos/Logo_LingkunganKU-1.png') ?>" width="36px" height="260px" class="navbar-brand-img h-100" alt="main_logo">
				<span class="ms-1 font-weight-bold" style="font-size: 1.1rem;"> LingkunganKu</span>
			</a>
		</div>
		<hr class="horizontal dark mt-0	">
		<div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
			<ul class="navbar-nav">
				<?php
				$p = $this->input->get("p");
				$current_page = $p ? base64_decode($p) : '';
				?>

				<li class="nav-item">
					<a class="nav-link <?= ($current_page == "dashboard") ? "active" : "" ?>"
						href="<?= base_url("?p=" . base64_encode('dashboard')) ?>">
						<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
							<i class="fas fa-home text-dark text-sm opacity-10"></i>
						</div>
						<span class="nav-link-text ms-1">Dashboard</span>
					</a>
				</li>
				<?php if (in_array($this->session->userdata('level'), ["user"])) { ?>

				<li class="nav-item">
					<a class="nav-link <?= ($current_page == "lapor") ? "active" : "" ?>"
						href="<?= base_url("?p=" . base64_encode('lapor')) ?>">
						<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
							<i class="fas fa-bullhorn text-dark text-sm opacity-10"></i>
						</div>
						<span class="nav-link-text ms-1">Lapor</span>
					</a>
				</li>
				<?php } ?>

				<?php if (in_array($this->session->userdata('level'), ["admin", "petugas"])) { ?>
					<!-- Menu Lapor -->
					<li class="nav-item">
						<a class="nav-link <?= ($current_page == "lapor_admin") ? "active" : "" ?>"
							href="<?= base_url("?p=" . base64_encode('lapor_admin')) ?>">
							<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
								<i class="fas fa-bullhorn text-dark text-sm opacity-10"></i>
							</div>
							<span class="nav-link-text ms-1">Lapor</span>
						</a>
					</li>
				<?php } ?>
				<!-- Menu Status Laporan (SEMUA ROLE) -->
				<li class="nav-item">
					<a class="nav-link <?= ($current_page == "status_laporan") ? "active" : "" ?>"
						href="<?= base_url("?p=" . base64_encode('status_laporan')) ?>">
						<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
							<i class="fas fa-tasks text-dark text-sm opacity-10"></i>
						</div>
						<span class="nav-link-text ms-1">Status Laporan</span>
					</a>
				</li>

				<!-- Menu Peta Laporan (HANYA ADMIN & PETUGAS) -->
				<li class="nav-item">
					<a class="nav-link <?= ($current_page == "peta_laporan") ? "active" : "" ?>"
						href="<?= base_url("?p=" . base64_encode('peta_laporan')) ?>">
						<div class="icon ion-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
							<i class="fas fa-map-marked-alt text-dark text-sm opacity-10"></i>
						</div>
						<span class="nav-link-text ms-1">Peta Laporan</span>
					</a>
				</li>

				<!-- Pengelolaan Cabang (HANYA ADMIN) -->
				<?php if ($this->session->userdata('level') === "admin") { ?>
					<li class="nav-item">
						<a class="nav-link <?= ($current_page == "cabang") ? "active" : "" ?>"
							href="<?= base_url("?p=" . base64_encode('cabang')) ?>">
							<div class="icon ion-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
								<i class="fas fa-map-pin text-dark text-sm opacity-10"></i>
							</div>
							<span class="nav-link-text ms-1">Cabang</span>
						</a>
					</li>
				<?php } ?>


				<li class="nav-item mt-3">
					<h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account Pages</h6>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= ($current_page == "profile") ? "active" : "" ?>"
						href="<?= base_url("?p=" . base64_encode('profile')) ?>">
						<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
							<i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
						</div>
						<span class="nav-link-text ms-1">Profile</span>
					</a>
				</li>


			</ul>
		</div>
		<div class="sidenav-footer mx-3 ">
			<div class="card card-plain shadow-none" id="sidenavCard">
				<img class="w-50 mx-auto" src="<?= base_url('assets/img/illustrations/icon-documentation.svg') ?>" alt="sidebar_illustration">
				<div class="card-body text-center p-3 w-100 pt-0">
					<div class="docs-info">
						<h6 class="mb-0">Need help?</h6>
						<!-- <p class="text-xs font-weight-bold mb-0">Please check our docs</p> -->
					</div>
				</div>
			</div>
			<br>
			<a class="btn btn-primary mt-3 w-100" href="<?= base_url('login/logout') ?>"><i class="fas fa-sign-out-alt"></i>&nbsp;
				Logout</a>
		</div>
	</aside>
	<main class="main-content position-relative border-radius-lg ">
		<!-- Navbar -->
		<br>
		<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-sm border-radius-xl"
			id="navbarBlur" data-scroll="false"
			style="background-color: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px);">


			<div class="container-fluid py-1 px-3">
				<div class="collapse navbar-collapse ms-auto" id="navbar">
					<ul class="navbar-nav ms-auto d-flex align-items-center gap-3">

						<!-- Notifikasi -->
						<li class="nav-item">
							<a href="javascript:;" class="nav-link">
								<div class="icon icon-shape bg-warning shadow d-flex justify-content-center align-items-center"
									style="width: 36px; height: 36px;">
									<i class="fa fa-bell text-white"></i>
								</div>
							</a>
						</li>

						<!-- Profil -->
						<li class="nav-item">
							<a href="javascript:;" class="nav-link">
								<div class="icon icon-shape bg-info shadow d-flex justify-content-center align-items-center"
									style="width: 36px; height: 36px;">
									<i class="fa fa-user text-white"></i>
								</div>
							</a>
						</li>

						<!-- Logout -->
						<li class="nav-item">
							<a href="<?= base_url('login/logout') ?>" class="nav-link d-flex align-items-center text-white">
								<div class="icon icon-shape bg-danger shadow d-flex justify-content-center align-items-center"
									style="width: 36px; height: 36px;">
									<i class="fa fa-sign-out-alt text-white"></i>
								</div>
							</a>
						</li>

						<!-- Toggle mobile -->
						<li class="nav-item d-xl-none ms-auto">
							<a href="javascript:;" class="nav-link p-0" id="iconNavbarSidenav">
								<div class="sidenav-toggler-inner d-flex flex-column justify-content-between" style="height: 18px;">
									<i class="sidenav-toggler-line bg-dark"></i>
									<i class="sidenav-toggler-line bg-dark"></i>
									<i class="sidenav-toggler-line bg-dark"></i>
								</div>
							</a>
						</li>

					</ul>
				</div>
			</div>
		</nav>

		<script src="<?= base_url('assets/vendor/jquery/dist/jquery.min.js') ?>"></script>

		<script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
		<script src="<?= base_url('assets/js/core/bootstrap.min.js"') ?>"></script>
		<script src="<?= base_url('assets/js/plugins/perfect-scrollbar.min.js') ?>"></script>
		<script src="<?= base_url('assets/js/plugins/smooth-scrollbar.min.js') ?>"></script>
		<script src="<?= base_url('assets/js/plugins/chartjs.min.js') ?>"></script>

		<!-- End Navbar -->
		<div class="container-fluid py-6">
			<?php
			$p = $this->input->get('p');
			$halaman = $p ? base64_decode($p) : null;

			if ($halaman) {
				if (file_exists(APPPATH . "views/pages/$halaman.php")) {
					$this->load->view("pages/$halaman");
				} else {
					echo "
        <div class='container-fluid dashboard-default-sec'>
            <div class='row'>
                <div class='col-xl-12'> 
                    <div class='alert bg-white row text-dark'>
                        <div class='col-md-6 p-4'>
                            <h3 class='text-danger'><i class='fa fa-exclamation-triangle'></i> ERROR 404</h3>
                            <hr> 
                            Halaman tidak tersedia.
                            <ol>
                                <li>Halaman ini belum dikembangkan</li>
                                <li>Kesalahan alamat permohonan akses halaman</li>
                                <li>Kesalahan jaringan</li>
                            </ol> 
                            Silahkan kunjungi halaman ini di lain waktu.<br> 
                            Terimakasih
                        </div>
                    </div>
                </div>
            </div>
        </div>";
				}
			} else {
				$this->load->view("pages/dashboard");
			}
			?>


			<footer class="footer pt-3  ">
				<div class="container-fluid">
					<div class="row align-items-center justify-content-lg-between">
						<div class="col-lg-12 mb-lg-0 mb-4">
							<div class="copyright text-center text-sm text-muted text-lg-start">
								©
								<script>
									document.write(new Date().getFullYear())
								</script>,
								Designed & Developed <i class="fa fa-heart"></i> by
								<a href="https://www.instagram.com/universitas_nurtanio?igsh=emZjampwMzZydWsx"
									class="font-weight-bold" target="_blank">Tim Neuro - Universitas Nurtanio Bandung</a>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</main>
	<div class="fixed-plugin">
		<a class="fixed-plugin-button text-dark position-fixed px-3 py-2">

			<!-- Floating Chatbot Button -->
			<div id="chatbot-btn"
				style="position: fixed; bottom: 30px; right: 30px; width: 60px; height: 60px;
					background:#4e73df; border-radius: 50%; display:flex; 
					justify-content:center; align-items:center; cursor:pointer;
					box-shadow:0 4px 10px rgba(0,0,0,0.3); z-index:9999;">
				<i class="fa fa-comments" style="color:white; font-size:24px;"></i>
			</div>

			<!-- Chatbot Box -->
			<div id="chatbot-box"
				style="position: fixed; bottom: 110px; right: 30px; width: 420px; 
					height: 420px; background:white; border-radius: 15px;
					box-shadow:0 6px 20px rgba(0,0,0,0.25);
					display:none; flex-direction:column; overflow:hidden; z-index:9999;
					animation: fadeInUp 0.3s ease;">

				<div style="background:#4e73df; color:white; padding:15px; font-weight:bold;">
					<i class="fas fa-robot"></i> LingkunganKu AI Assistant
				</div>

				<div id="chat-content" style="padding:10px; height:300px; overflow-y:auto;">
					<p><b>AI:</b> Halo! Ada yang bisa saya bantu?</p>
				</div>

				<div style="display:flex; border-top:1px solid #ddd; padding:8px; gap:8px; align-items:center;">

					<input id="chat-input" type="text"
						style="flex:1; border:1px solid #ccc; padding:10px 14px; border-radius:10px; outline:none;"
						placeholder="Tulis pesan...">

					<button id="send-btn"
						style="width:50px; height:45px; border:none; border-radius:50%;
					background:#016B61; color:white; display:flex; justify-content:center;
					align-items:center; cursor:pointer; font-size:20px;
					box-shadow:0 4px 12px rgba(0,0,0,0.25);">
						<i class="fas fa-paper-plane"></i>
					</button>

				</div>

			</div>
			<i class="fa fa-cog py-2"> </i>
		</a>
	</div>

	<!--   Core JS Files   -->
	<script>
		const chatBtn = document.getElementById("chatbot-btn");
		const chatBox = document.getElementById("chatbot-box");
		const chatContent = document.getElementById("chat-content");
		const chatInput = document.getElementById("chat-input");
		const sendBtn = document.getElementById("send-btn");

		chatBtn.addEventListener('click', () => {
			chatBox.style.display = chatbox.style.display === 'none' ? 'block' : 'none';
		});

		document.addEventListener('click', (e) => {
			if (!chatBox.contains(e.target) && !chatBtn.contains(e.target)) {
				chatBox.style.display = 'none';
			}
		});

		chatBtn.addEventListener("click", () => {
			chatBox.style.display = chatBox.style.display === "none" ? "flex" : "none";
		});

		function sendMessage() {
			const text = chatInput.value.trim();
			if (text === "") return;

			// Bubble user
			const userBubble = document.createElement("div");
			userBubble.className = "chat-bubble-user";
			userBubble.textContent = text;
			chatContent.appendChild(userBubble);

			chatInput.value = "";
			chatContent.scrollTop = chatContent.scrollHeight;

			// Bot reply bubble
			setTimeout(() => {
				const botBubble = document.createElement("div");
				botBubble.className = "chat-bubble-bot";
				botBubble.textContent = "Baik, aku menerima: " + text;
				chatContent.appendChild(botBubble);

				chatContent.scrollTop = chatContent.scrollHeight;
			}, 500);
		}

		sendBtn.addEventListener("click", sendMessage);

		chatInput.addEventListener("keypress", function(e) {
			if (e.key === "Enter") {
				e.preventDefault();
				sendMessage();
			}
		});
	</script>

	<?php if ($this->input->get('p')) { ?>
		<script>
			var origin = "<?= base_url() ?>";
		</script>
		<script src="<?= base_url("assets/js/pages/" . base64_decode($this->input->get('p')) . ".js") ?>"></script>
	<?php } ?>

	<script>
		var win = navigator.platform.indexOf('Win') > -1;
		if (win && document.querySelector('#sidenav-scrollbar')) {
			var options = {
				damping: '0.5'
			}
			Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
		}
	</script>
	<!-- Github buttons -->
	<script async defer src="https://buttons.github.io/buttons.js"></script>
	<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
	<!-- Data Tables -->
	<!-- <script src=" <?= base_url("assets/vendor/js/popper.min.js") ?> "></script>
	<script src=" <?= base_url("assets/vendor/js/bootstrap.min.js") ?> "></script> -->
	<!-- <script src="<?= base_url('assets/vendor/DataTables/datatables.min.js') ?>"></script> -->

	<!-- DataTables + Bootstrap 5 JS -->

	<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>

	<script src="<?= base_url('assets/vendor/libs/sweetalert/sweetalert.min.js') ?>"></script>
	<!-- JQuery Mask -->
	<script src=" <?= base_url("assets/vendor/libs/jqueryMask/dist/jquery.mask.min.js") ?>"></script>
	<!-- select 2 -->
	<script type="text/javascript" src="<?= base_url('assets/plugins/select2/dist/js/select2.min.js') ?>"></script>

	<!-- FILEPOND -->
	<script src="<?= base_url("assets/vendor/libs/filepond/plugins/filepond-plugin-file-validate-type.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/libs/filepond/plugins/filepond-plugin-file-validate-size.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/libs/filepond/plugins/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/libs/filepond/plugins/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/libs/filepond/dist/filepond.min.js") ?>"></script>
	<script src="<?= base_url('assets/js/argon-dashboard.min.js') ?> "></script>
</body>
