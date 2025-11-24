<div class="row">
	<div class="col-xl-12 col-md-12">
		<div class="card bg-light bg-gradient text-dark mb-4">
			<div class="card-body">

				<div class="d-flex flex-column flex-md-row justify-content-start align-items-center">
					<img src="<?= base_url('assets/img/logos/Logo_LingkunganKu-1.png') ?>"
						alt="Logo" class="img-fluid custom-logo"
						style="height: 75px;">

					<div class="ms-md-3 mt-2 mt-md-0 welcome-text">
							<h4>Halo <?= $this->session->userdata("nama") ?> ,</h4>
						<h6>Selamat datang di LingkunganKu</h6>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- CARD TEMPLATE RAPIH & SERAGAM -->

<?php
if ($this->session->userdata('level') === "admin") {?>

<div class="row">
	<?php
	$nama_data = [
		"Laporan Masuk",
		"Laporan Terselesaikan",
		"Laporan Masuk 7 Hari Terakhir",
		"Laporan Terselesaikan 7 Hari Terakhir",
		"Laporan Masuk Bulan Ini",
		"Laporan Terselesaikan Bulan Ini"
	];
	for ($i = 0; $i < 6; $i++) {
	?>
		<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
			<div class="card h-100">
				<div class="card-body p-3">
					<div class="row align-items-center">
						<div class="col-8">
							<p class="text-sm mb-0 text-uppercase font-weight-bold"><?= $nama_data[$i] ?></p>
							<h5 class="font-weight-bolder"><?= $jumlah_total[$i]->jumlah ?></h5>
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
	<?php
	}
	?>
</div>
<!-- Laporan Masuk -->


<div class="row mt-4 mb-4 ">
<div class="col-lg-6 mb-4 ">
<div class="card z-index-2" style="height:auto;">
			<div class="card-header pb-0 pt-3 bg-transparent">
				<h6 class="text-capitalize">Jumlah Laporan Per Bulan</h6>
				<!-- <p class="text-sm mb-0">
					<i class="fa fa-arrow-up text-success"></i>
					<span class="font-weight-bold">4% more</span> in 2021
				</p> -->
			</div>
			<div class="card-body p-3 pb-5">
				<div class="chart">
					<canvas id="chart-line" class="chart-canvas" height="300"></canvas>
				</div>
			</div>
		</div>
		<div class="card z-index-2" style="height: 52vh">
			<div class="card-header pb-0 pt-3 bg-transparent">
				<h6 class="text-capitalize">Wilayah Pelapor Aktif</h6>
			</div>
			<div class="card-body p-3">
				<div class="chart">
					<canvas id="chart-bar" class="chart-canvas" height="150"></canvas>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-6 mb-lg-0 mb-4">
		<div class="card z-index-2 h-auto">
			<div class="card-header pb-0 pt-3 bg-transparent">
				<h6 class="text-capitalize">Persentase Kategori Laporan</h6>
				<!-- <p class="text-sm mb-0">
					<i class="fa fa-arrow-up text-success"></i>
					<span class="font-weight-bold">4% more</span> in 2021
				</p> -->
			</div>
			<div class="card-body p-3">
				<div class="chart">
					<canvas id="chart-pie" class="chart-canvas" height="300"></canvas>
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
</div>

<?php }?>
<!-- <div class="col-lg-5">
		<div class="card">
			<div class="card-header pb-0 p-3">
				<h6 class="mb-0">Kategori Lingkungan</h6>
			</div>
			<div class="card-body p-3">
				<ul class="list-group">

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
	</div> -->

<?php
if ($this->session->userdata('level') === "admin") {
	$moona = [
		"Januari",
		"Februari",
		"Maret",
		"April",
		"Mei",
		"Juni",
		"Juli",
		"Agustus",
		"September",
		"Oktober",
		"November",
		"Desember"
	];
	$stat_labels = [];
	$stat_numbers = [];

	$stat2_labels = [];
	$stat2_numbers = [];

	$stat3_labels = [];
	$stat3_numbers = [];

	for ($i = 0; $i < count($stat_per_bulan); $i++) {
		$stat_labels[$i] = $moona[$stat_per_bulan[$i]->bulan - 1];
		$stat_numbers[$i] = (int) $stat_per_bulan[$i]->jumlah;
	}

	for ($i = 0; $i < count($stat_kategori); $i++) {
		$stat2_labels[$i] = $stat_kategori[$i]->nama_kategori;
		$stat2_numbers[$i] = (int) $stat_kategori[$i]->jumlah;
	}

	for ($i = 0; $i < count($stat_kabkot); $i++) {
		$stat3_labels[$i] = $stat_kabkot[$i]->nama_kabkot;
		$stat3_numbers[$i] = (int) $stat_kabkot[$i]->jumlah;
	}
?>

	<script>
		$(document).ready(() => {
			var ctx1 = document.getElementById("chart-line").getContext("2d");
			var ctx2 = document.getElementById("chart-pie").getContext("2d");
			var ctx3 = document.getElementById("chart-bar").getContext("2d");

			var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

			gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
			gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
			gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
			new Chart(ctx1, {
				type: "line",
				data: {
					labels: <?= json_encode($stat_labels) ?>,
					datasets: [{
						label: "Jumlah Laporan",
						tension: 0.4,
						borderWidth: 0,
						pointRadius: 0,
						borderColor: "#5e72e4",
						backgroundColor: gradientStroke1,
						borderWidth: 3,
						fill: true,
						data: <?= json_encode($stat_numbers) ?>,
						maxBarThickness: 6

					}],
				},
				options: {
					responsive: true,
					maintainAspectRatio: false,
					plugins: {
						legend: {
							display: false,
						}
					},
					interaction: {
						intersect: false,
						mode: 'index',
					},
					scales: {
						y: {
							grid: {
								drawBorder: false,
								display: true,
								drawOnChartArea: true,
								drawTicks: false,
								borderDash: [5, 5]
							},
							ticks: {
								display: true,
								padding: 10,
								color: '#fbfbfb',
								font: {
									size: 11,
									family: "Open Sans",
									style: 'normal',
									lineHeight: 2
								},
							}
						},
						x: {
							grid: {
								drawBorder: false,
								display: false,
								drawOnChartArea: false,
								drawTicks: false,
								borderDash: [5, 5]
							},
							ticks: {
								display: true,
								color: '#ccc',
								padding: 20,
								font: {
									size: 11,
									family: "Open Sans",
									style: 'normal',
									lineHeight: 2
								},
							}
						},
					},
				},
			});

			new Chart(ctx2, {
				type: "pie",
				data: {
					labels: <?= json_encode($stat2_labels) ?>,
					datasets: [{
						label: 'Jumlah Laporan',
						data: <?= json_encode($stat2_numbers) ?>,
						backgroundColor: [
							'rgba(255, 99, 99, 1)',
							'rgba(255, 148, 99, 1)',
							'rgba(255, 226, 99, 1)',
							'rgba(54, 235, 54, 1)',
							'rgba(86, 249, 255, 1)',
							'rgba(86, 111, 255, 1)',
							'rgba(255, 86, 227, 1)',
							'rgba(201, 86, 255, 1)',
							'rgba(51, 51, 51, 1)',
							'rgba(173, 173, 173, 1)'
						],
						hoverOffset: 4
					}]
				}
			});

			const colors = [
				"#e6194b", "#3cb44b", "#ffe119", "#4363d8", "#f58231", "#911eb4", "#46f0f0",
				"#f032e6", "#bcf60c", "#fabebe", "#008080", "#e6beff", "#9a6324", "#fffac8",
				"#800000", "#aaffc3", "#808000", "#ffd8b1", "#000075", "#808080", "#ffd700",
				"#6495ed", "#20b2aa", "#ff69b4", "#ff4500", "#2e8b57", "#9932cc"
			];

			new Chart(ctx3, {
				type: "bar",
				data: {
					labels: <?= json_encode($stat3_labels) ?>,
					datasets: [{
						label: 'Jumlah Laporan',
						data: <?= json_encode($stat3_numbers) ?>,
						backgroundColor: colors
					}]
				}
			});
		});
	</script>

<?php } ?>