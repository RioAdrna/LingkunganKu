<div class="row">
	<div class="col-xl-12 col-md-12">
		<div class="card bg-light bg-gradient text-dark mb-4">
			<div class="card-body">

				<div class="d-flex flex-row justify-content-start align-items-center">
					<img src="<?= base_url('assets/img/logos/Logo_LingkunganKu-1.png') ?>"
						alt="Logo" class="img-fluid custom-logo"
						style="height: 75px;">

					<div class="ms-3">
						<h4>Halo <?= $this->session->userdata("nama") ?> ,</h4>
						<h6>Selamat datang di LingkunganKu</h6>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- CARD TEMPLATE RAPIH & SERAGAM -->

	<!-- Laporan Masuk -->
	<div class="col-xl-3 col-sm-6 mb-4">
		<div class="card h-100">
			<div class="card-body p-3">
				<div class="row align-items-center">
					<div class="col-8">
						<p class="text-sm mb-0 text-uppercase font-weight-bold">Laporan Masuk</p>
						<h5 class="font-weight-bolder">128</h5>
						<!-- <p class="mb-0">
							<span class="text-success text-sm font-weight-bolder">+12%</span> minggu ini
						</p> -->
					</div>
					<div class="col-4 text-end">
						<div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
							<i class="ni ni-send text-lg opacity-10"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Titik Lokasi -->
	<div class="col-xl-3 col-sm-6 mb-4">
		<div class="card h-100">
			<div class="card-body p-3">
				<div class="row align-items-center">
					<div class="col-8">
						<p class="text-sm mb-0 text-uppercase font-weight-bold">Titik Lokasi</p>
						<h5 class="font-weight-bolder">54</h5>
						<!-- <p class="mb-0">
							<span class="text-success text-sm font-weight-bolder">+5%</span> diperbarui
						</p> -->
					</div>
					<div class="col-4 text-end">
						<div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
							<i class="ni ni-world text-lg opacity-10"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Status Kebersihan -->
	<div class="col-xl-3 col-sm-6 mb-4">
		<div class="card h-100">
			<div class="card-body p-3">
				<div class="row align-items-center">
					<div class="col-8">
						<p class="text-sm mb-0 text-uppercase font-weight-bold">Status Kebersihan</p>
						<h5 class="font-weight-bolder">Baik</h5>
						<!-- <p class="mb-0">
							<span class="text-danger text-sm font-weight-bolder">-1%</span> dari bulan lalu
						</p> -->
					</div>
					<div class="col-4 text-end">
						<div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
							<i class="ni ni-check-bold text-lg opacity-10"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Laporan Terselesaikan -->
	<div class="col-xl-3 col-sm-6 mb-4">
		<div class="card h-100">
			<div class="card-body p-3">
				<div class="row align-items-center">
					<div class="col-8">
						<p class="text-sm mb-0 text-uppercase font-weight-bold">Laporan Terselesaikan</p>
						<h5 class="font-weight-bolder">89</h5>
						<!-- <p class="mb-0">
							<span class="text-success text-sm font-weight-bolder">+8%</span> dari bulan ini
						</p> -->
					</div>
					<div class="col-4 text-end">
						<div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
							<i class="ni ni-check-circle text-lg opacity-10"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


</div>

<div class="row mt-4">
	<div class="col-lg-7 mb-lg-0 mb-4">
		<div class="card z-index-2 h-100">
			<div class="card-header pb-0 pt-3 bg-transparent">
				<h6 class="text-capitalize">Tingkat Kebersihan</h6>
				<!-- <p class="text-sm mb-0">
					<i class="fa fa-arrow-up text-success"></i>
					<span class="font-weight-bold">4% more</span> in 2021
				</p> -->
			</div>
			<div class="card-body p-3">
				<div class="chart">
					<canvas id="chart-line" class="chart-canvas" height="300"></canvas>
				</div>
			</div>
		</div>
	</div>
	<!-- <div class="col-lg-5">
		<div class="card card-carousel overflow-hidden h-100 p-0">
			<div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
				<div class="carousel-inner border-radius-lg h-100">
					<div class="carousel-item h-100 active" style="background-image: url('../assets/img/carousel-1.jpg');
      background-size: cover;">
						<div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
							<div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
								<i class="ni ni-camera-compact text-dark opacity-10"></i>
							</div>
							<h5 class="text-white mb-1">Get started with Argon</h5>
							<p>There’s nothing I really wanted to do in life that I wasn’t able to get good at.</p>
						</div>
					</div>
					<div class="carousel-item h-100" style="background-image: url('../assets/img/carousel-2.jpg');
      background-size: cover;">
						<div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
							<div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
								<i class="ni ni-bulb-61 text-dark opacity-10"></i>
							</div>
							<h5 class="text-white mb-1">Faster way to create web pages</h5>
							<p>That’s my skill. I’m not really specifically talented at anything except for the ability to learn.</p>
						</div>
					</div>
					<div class="carousel-item h-100" style="background-image: url('../assets/img/carousel-3.jpg');
      background-size: cover;">
						<div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
							<div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
								<i class="ni ni-trophy text-dark opacity-10"></i>
							</div>
							<h5 class="text-white mb-1">Share with us your design tips!</h5>
							<p>Don’t be afraid to be wrong because you can’t learn anything from a compliment.</p>
						</div>
					</div>
				</div>
				<button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		</div>
	</div>
</div> -->
	<div class="col-lg-5">
		<div class="card">
			<div class="card-header pb-0 p-3">
				<h6 class="mb-0">Kategori Lingkungan</h6>
			</div>
			<div class="card-body p-3">
				<ul class="list-group">

					<!-- Sampah Masuk -->
					<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
						<div class="d-flex align-items-center">
							<div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
								<i class="ni ni-trash text-white opacity-10"></i>
							</div>
							<div class="d-flex flex-column">
								<h6 class="mb-1 text-dark text-sm">Sampah Masuk</h6>
								<span class="text-xs">250 laporan, <span class="font-weight-bold">346+ penanganan</span></span>
							</div>
						</div>
						<div class="d-flex">
							<button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
								<i class="ni ni-bold-right"></i>
							</button>
						</div>
					</li>

					<!-- Titik Lokasi -->
					<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
						<div class="d-flex align-items-center">
							<div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
								<i class="ni ni-pin-3 text-white opacity-10"></i>
							</div>
							<div class="d-flex flex-column">
								<h6 class="mb-1 text-dark text-sm">Titik Lokasi</h6>
								<span class="text-xs">123 terdeteksi, <span class="font-weight-bold">15 baru</span></span>
							</div>
						</div>
						<div class="d-flex">
							<button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
								<i class="ni ni-bold-right"></i>
							</button>
						</div>
					</li>

					<!-- Kebersihan Area -->
					<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
						<div class="d-flex align-items-center">
							<div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
								<i class="ni ni-check-bold text-white opacity-10"></i>
							</div>
							<div class="d-flex flex-column">
								<h6 class="mb-1 text-dark text-sm">Kebersihan Area</h6>
								<span class="text-xs">1 area kotor, <span class="font-weight-bold">40 bersih</span></span>
							</div>
						</div>
						<div class="d-flex">
							<button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
								<i class="ni ni-bold-right"></i>
							</button>
						</div>
					</li>

					<!-- Laporan Terselesaikan -->
					<li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
						<div class="d-flex align-items-center">
							<div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
								<i class="ni ni-check-circle text-white opacity-10"></i>
							</div>
							<div class="d-flex flex-column">
								<h6 class="mb-1 text-dark text-sm">Laporan Terselesaikan</h6>
								<span class="text-xs font-weight-bold">+ 430</span>
							</div>
						</div>
						<div class="d-flex">
							<button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
								<i class="ni ni-bold-right"></i>
							</button>
						</div>
					</li>

				</ul>
			</div>
		</div>
	</div>