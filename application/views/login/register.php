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
			grid-gap: 1rem;
			padding: 0 2rem;
		}

		/* GAMBAR DI KIRI */
		.img {
			display: flex;
			justify-content: center; 
			align-items: center;
		}

		.img img {
			width: 500px;
		}

        .login-content {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin-top: -70px; /* ⬅️ tambahan */
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

		.register-link {
			color: #FFFFFF;
			font-weight: 500;
			transition: color 0.3s;
		}

		.register-link:hover {
			color: #FFD700;
		}

		/* MOBILE */
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

		<!-- GAMBAR KIRI -->
		<div class="img">
			<img src="<?= base_url('assets/img/logos/daun.png') ?>">
		</div>

		<!-- LOGIN FORM KANAN -->
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
			<input type="button" class="btn" id="register" value="Register">
            <div style="display:flex; flex-direction:column; align-items:center; gap:10px;">
                <a href="<?= base_url('login') ?>" class="register-link text-decoration-none">
                    Sudah punya akun? Login
                </a>
            </div>
			</form>
		</div>

	</div>

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


</body>
</html>
