<!DOCTYPE html>
<html>

<head>
	<title>LingkunganKu</title>
	<link rel="icon" type="image/png" href="<?= base_url('assets/img/logos/Logo_LingkunganKu-1.png') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		* {
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}

		body {
			font-family: 'Poppins', sans-serif;
			overflow: hidden;
		}

		.wave {
			position: fixed;
			bottom: 0;
			left: 0;
			height: 50%;
			z-index: -1;
		}

		.container {
			width: 100vw;
			height: 100vh;
			display: grid;
			grid-template-columns: repeat(2, 1fr);
			grid-gap: 7rem;
			padding: 0 2rem;
		}

		.img {
			display: flex;
			justify-content: flex-start;
			align-items: center;
		}

		.login-content {
			display: flex;
			justify-content: flex-end;
			align-items: center;
			text-align: center;
		}

		.img img {
			width: 500px;
		}

		form {
			width: 360px;
		}

		.login-content img {
			height: 150px;
		}

		.login-content h2 {
			margin: 15px 0;
			color: #333;
			text-transform: uppercase;
			font-size: 2rem;
		}

		.input-div {
			position: relative;
			display: grid;
			grid-template-columns: 7% 93%;
			margin: 25px 0;
			padding: 5px 0;
			border-bottom: 2px solid #d9d9d9;
		}

		.i {
			color: #d9d9d9;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.i i {
			transition: .3s;
		}

		.input-div>div {
			position: relative;
			height: 45px;
		}

		.input-div>div>h5 {
			position: absolute;
			left: 10px;
			top: 50%;
			transform: translateY(-50%);
			color: #999;
			font-size: 18px;
			transition: .3s;
		}

		.input-div:before,
		.input-div:after {
			content: '';
			position: absolute;
			bottom: -2px;
			width: 0%;
			height: 2px;
			background-color: #5CB338;
			transition: .4s;
		}

		.input-div:before {
			right: 50%;
		}

		.input-div:after {
			left: 50%;
		}

		.input-div.focus:before,
		.input-div.focus:after {
			width: 50%;
		}

		.input-div.focus>div>h5 {
			top: -5px;
			font-size: 15px;
		}

		.input-div.focus>.i>i {
			color: #5CB338;
		}

		.input-div>div>input {
			position: absolute;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			border: none;
			outline: none;
			background: none;
			padding: 0.5rem 0.7rem;
			font-size: 1.2rem;
			color: #555;
			font-family: 'poppins', sans-serif;
		}

		.input-div.pass {
			margin-bottom: 4px;
		}

		a {
			display: block;
			text-align: right;
			text-decoration: none;
			color: #999;
			font-size: 0.9rem;
			transition: .3s;
		}

		a:hover {
			color: #5CB338;
		}

		.btn {
			display: block;
			width: 100%;
			height: 50px;
			border-radius: 25px;
			outline: none;
			border: none;
			background-image: linear-gradient(to right, #5CB338, #4AA02C, #5CB338);
			/* gradasi hijau */
			background-size: 200%;
			font-size: 1.2rem;
			color: #fff;
			font-family: 'Poppins', sans-serif;
			text-transform: uppercase;
			margin: 1rem 0;
			cursor: pointer;
			transition: .5s;
		}

		.btn:hover {
			background-position: right;
		}

		#loading {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: rgba(0, 0, 0, 0.4);
			display: none;
			justify-content: center;
			align-items: center;
			z-index: 9999;
		}

		#loading img {
			width: 120px;
			height: auto;
			border-radius: 10px;
		}


		.register-link {
			color: #FFFFFF;
			/* warna default desktop */
			font-weight: 500;
			transition: color 0.3s;
		}

		.register-link:hover {
			color: #FFD700;
			/* contoh hover */
		}

		/* Media query untuk mobile */
		@media screen and (max-width: 900px) {
			.register-link {
				color: #0d6efd;
				/* biru untuk mobile */
			}
		}


		@media screen and (max-width: 900px) {
			.container {
				grid-template-columns: 1fr;
			}

			.img {
				display: none;
			}

			.wave {
				display: none;
			}

			.login-content {
				justify-content: center;
			}
		}
	</style>
</head>

<body>
	<img class="wave" src="<?= base_url('assets/img/wave(3).svg') ?>">
	<div class="container">
		<!-- LOGIN FORM -->
		<div class="login-content">
			<form id="form-login">
				<img src="<?= base_url('assets/img/logos/Logo_LingkunganKu-1.png') ?>">
				<h2 class="title">LingkunganKu</h2>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-envelope"></i>
					</div>
					<div class="div">
						<h5>Email</h5>
						<input type="text" id="email" class="input">
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Password</h5>
						<input type="password" id="password" class="input">
					</div>
				</div>
				<br>
				<input type="button" class="btn" id="login" value="Login">
				<div style="display:flex; flex-direction:column; align-items:center; gap:10px;">
					<a href="<?= base_url('register') ?>" class="register-link text-decoration-none">
						Belum punya akun? Register
					</a>
				</div>

			</form>
		</div>
		<!-- GAMBAR KANAN -->
		<div class="img">
			<img src="<?= base_url('assets/img/logos/daun.png') ?>">
		</div>
	</div>

	<div id="loading">
		<img src="<?= base_url('assets/img/logos/loading.gif') ?>" alt="Loading...">
	</div>

	<script src="<?= base_url("assets/vendor/libs/jquery/jquery.js") ?>"></script>
	<script src="<?= base_url('assets/vendor/libs/sweetalert/sweetalert.min.js') ?>"></script>
	<script>
		$(document).ready(function() {
			$("#login").click(function() {
				var email = $("#email").val();
				var password = $("#password").val();

				$.ajax({
					url: "<?= base_url('login/cek_login') ?>",
					method: "POST",
					dataType: "json",
					data: {
						email: email,
						password: password
					},
					beforeSend: function() {
						$("#loading").css("display", "flex").hide().fadeIn(200); // fadeIn cepat
					},
					success: function(rsp) {
						if (rsp.sts == "0") { // login gagal
							$("#loading").fadeOut(200, function() { // fadeOut cepat
								Swal.fire({
									title: "Kesalahan!",
									text: rsp.msg,
									icon: "error"
								}).then(function() {
									// location.reload();
								});
							});
						} else { // login berhasil
							const startTime = Date.now();
							const minDuration = 800;

							const elapsed = Date.now() - startTime;
							const remaining = Math.max(0, minDuration - elapsed);

							setTimeout(function() {
								$("#loading").fadeOut(600, function() {
									$("body").fadeOut(300, function() {
										window.location.href = "<?= base_url('?p=' . base64_encode('dashboard')) ?>";
									});
								});
							}, remaining);
						}
					},

					error: function() {
						$("#loading").fadeOut(200);

						Swal.fire({
							title: "Error!",
							text: "Terjadi kesalahan koneksi ke server.",
							icon: "error"
						});
					}
				});
			});

			const inputs = document.querySelectorAll(".input");

			function addcl() {
				let parent = this.parentNode.parentNode;
				parent.classList.add("focus");
			}

			function remcl() {
				let parent = this.parentNode.parentNode;
				if (this.value == "") {
					parent.classList.remove("focus");
				}
			}

			inputs.forEach(input => {
				input.addEventListener("focus", addcl);
				input.addEventListener("blur", remcl);
			});
		});
	</script>
	<script>
	document.getElementById("form-login").addEventListener("keydown", function (e) {
		if (e.key === "Enter") {
			e.preventDefault(); // supaya tidak reload otomatis
			document.getElementById("login").click(); // jalankan button login
		}
	});
	</script>
</body>

</html>