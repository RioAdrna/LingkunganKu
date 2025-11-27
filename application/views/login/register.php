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
				justify-content: flex-end;
				align-items: center;
			}

			.login-content {
				display: flex;
				justify-content: flex-start;
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
				font-size: 1.6rem;
			}

			.login-content .input-div {
				position: relative;
				display: grid;
				grid-template-columns: 7% 93%;
				margin: 25px 0;
				padding: 5px 0;
				border-bottom: 2px solid #d9d9d9;
			}

			.login-content .input-div.one {
				margin-top: 0;
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
				height: 38px;
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
				padding: 0.3rem 0.5rem;
				font-size: 0.95rem;
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

			#loading {
				display: none;
				position: fixed;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				background: rgba(0, 0, 0, 0.4);
				z-index: 9999;
				text-align: center;
			}

			#loading img {
				position: relative;
				top: 50%;
				transform: translateY(-50%);
				width: 100px;
				height: 100px;
			}

			.btn {
				display: block;
				width: 100%;
				height: 45px;
				border-radius: 25px;
				outline: none;
				border: none;
				background-image: linear-gradient(to right, #5CB338, #4AA02C, #5CB338);
				background-size: 200%;
				font-size: 1rem;
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

				.error .div::after {
					content: "!";
					color: #dc3545;
					position: absolute;
					right: 10px;
					top: 50%;
					transform: translateY(-50%);
					font-weight: bold;
				}

				.error .input {
					border-color: #dc3545 !important;
					color: #dc3545;
				}

				.error .div h5 {
					color: #dc3545 !important;
				}

				.error .i {
					color: #dc3545 !important;
				}
			}
		</style>
	</head>

	<body>
		<img class="wave" src="<?= base_url('assets/img/wave(3).svg') ?>">
		<div class="container">
			<div class="img">
				<img src="<?= base_url('assets/img/logos/daun.png') ?>">
			</div>
			<div class="login-content">
				<form action="#" onsubmit="return false;">
					<img src="<?= base_url('assets/img/logos/Logo_LingkunganKu-1.png') ?>">
					<h2>Register</h2>
					<br>
					<div class="input-div one">
						<div class="i">
							<i class="fas fa-user"></i>
						</div>
						<div class="div">
							<h5>Nama Lengkap</h5>
							<input type="text" id="nama" name="nama" class="input">
						</div>
					</div>
					<div class="input-div one">
						<div class="i">
							<i class="fas fa-envelope"></i>
						</div>
						<div class="div">
							<h5>Email</h5>
							<input type="text" id="email" name="email" class="input">
						</div>
					</div>
					<div class="input-div pass">
						<div class="i">
							<i class="fas fa-lock"></i>
						</div>
						<div class="div">
							<h5>Password</h5>
							<input type="password" id="password" name="password" class="input">
						</div>
					</div>
					<div class="input-div pass">
						<div class="i">
							<i class="fas fa-lock"></i>
						</div>
						<div class="div">
							<h5>Ulangi Password</h5>
							<input type="password" id="ulangi" name="ulang" class="input">
						</div>
					</div>
					<br>
					<input type="button" class="btn" id="register" value="Submit">
					<div style="display:flex; flex-direction:column; align-items:center; gap:10px;">
						<a href="<?= base_url('Login') ?>" class="register-link text-decoration-none">
							Sudah punya akun? login
						</a>
					</div>
				</form>
			</div>
		</div>
		<div id="loading">
			<img src="<?= base_url('assets/img/logos/loading.gif') ?>" alt="Loading...">
		</div>
		<script src="<?= base_url("assets/vendor/libs/jquery/jquery.js") ?>"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

		<script>
			$("#register").click(function() {
				var nama = $("#nama").val().trim();
				var email = $("#email").val().trim();
				var password = $("#password").val();
				var ulangiPassword = $("#ulangi").val();

				let isValid = true;
				let errorMessage = "";

				if (nama.length < 1 || email.length < 1 || password.length < 1 || ulangiPassword.length < 1) {
					errorMessage = "Semua field wajib diisi";
					isValid = false;

					if (nama.length < 1) $("#nama").parent().parent().addClass("error");
					if (email.length < 1) $("#email").parent().parent().addClass("error");
					if (password.length < 1) $("#password").parent().parent().addClass("error");
					if (ulangiPassword.length < 1) $("#ulangi").parent().parent().addClass("error");
				} else {
					$("#nama").parent().parent().removeClass("error");
					$("#email").parent().parent().removeClass("error");
					$("#password").parent().parent().removeClass("error");
					$("#ulangi").parent().parent().removeClass("error");

					if (password.length < 8) {
						errorMessage = "Password harus minimal 8 karakter";
						$("#password").parent().parent().addClass("error");
						$("#ulangi").parent().parent().addClass("error");
						isValid = false;
					}

					if (password !== ulangiPassword) {
						errorMessage = "Password tidak cocok";
						$("#password").parent().parent().addClass("error");
						$("#ulangi").parent().parent().addClass("error");
						isValid = false;
					}
				}

				if (!isValid) {
					Swal.fire({
						title: "Perhatian",
						text: errorMessage,
						icon: "error",
						confirmButtonText: "OK"
					});
					return;
				}

				$("#loading").show();

				setTimeout(function() {
					$.ajax({
						url: base_url + "register/submit",
						method: "post",
						data: {
							nama: nama,
							email: email,
							password: password,
							ulang: ulangiPassword
						},
						dataType: "json",
						beforeSend: function() {
							$("#register").prop("disabled", true).val("Loading...");
						},
						error: function(xhr, status, error) {
							console.error("AJAX Error:", status, error);
							$("#loading").hide();
							Swal.fire({
								title: "Sistem Bermasalah",
								text: "Terjadi kesalahan pada sistem, silakan coba lagi",
								icon: "error",
								confirmButtonText: "OK"
							});
							$("#register").prop("disabled", false).val("Submit");
						},
						success: function(res) {
							if (res.sts == 1) {
								setTimeout(function() {
									window.location.href = base_url + "Login";
								}, 500);
							} else {
								$("#loading").hide();
								Swal.fire({
									title: "Gagal",
									text: res.msg,
									icon: "error",
									confirmButtonText: "OK"
								});
								$("#register").prop("disabled", false).val("Submit");

								if (res.msg.includes("Email sudah digunakan")) {
									$("#email").parent().parent().addClass("error");
								}
							}
						}
					});
				}, 800);
			});

			$("input").on("input", function() {
				$(this).parent().parent().removeClass("error");
			});

			$("input").keypress(function(e) {
				if (e.which == 13) {
					$("#register").click();
				}
			});
		</script>
		<script>
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
		</script>
		<script>
			var base_url = "<?= base_url() ?>";
		</script>
	</body>

	</html>