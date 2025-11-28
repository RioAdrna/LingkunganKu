<style>
	.chart-pie-container {
		position: relative;
	}

	#pie-legend {
		max-height: 120px;
		overflow-y: auto;
	}

	#pie-legend::-webkit-scrollbar {
		width: 4px;
	}

	#pie-legend::-webkit-scrollbar-track {
		background: #f1f1f1;
		border-radius: 2px;
	}

	#pie-legend::-webkit-scrollbar-thumb {
		background: #c1c1c1;
		border-radius: 2px;
	}

	.legend-color {
		flex-shrink: 0;
	}

	/* Custom Styles for Admin Dashboard */
	.card {
		border: none;
		border-radius: 12px;
		transition: all 0.3s ease;
	}

	.card:hover {
		box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15) !important;
	}

	.hover-lift:hover {
		transform: translateY(-5px);
	}

	.bg-gradient-primary {
		background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
	}

	.bg-gradient-success {
		background: linear-gradient(135deg, #42b883 0%, #347474 100%) !important;
	}

	.bg-gradient-info {
		background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%) !important;
	}

	.bg-gradient-warning {
		background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%) !important;
	}

	.bg-gradient-danger {
		background: linear-gradient(135deg, #fa709a 0%, #fee140 100%) !important;
	}

	.bg-gradient-secondary {
		background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%) !important;
	}

	.chart-container {
		position: relative;
	}

	.text-sm {
		font-size: 0.875rem;
	}

	.fw-semibold {
		font-weight: 600;
	}

	/* Custom badge styles */
	.badge {
		font-size: 0.75rem;
		font-weight: 600;
		padding: 0.35em 0.65em;
	}

	/* Icon shapes */
	.icon-shape {
		display: flex !important;
		align-items: center !important;
		justify-content: center !important;
	}

	.hover-lift {
		transition: all 0.3s ease;
	}

	.hover-lift:hover {
		transform: translateY(-5px);
		box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15) !important;
	}

	.chart-container {
		position: relative;
	}

	.bg-gradient-primary {
		background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
	}

	.card {
		border-radius: 12px;
	}

	.icon-shape {
		display: flex;
		align-items: center;
		justify-content: center;
	}

	.card {
		transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
	}

	.card:hover {
		transform: translateY(-2px);
	}

	.btn {
		transition: all 0.3s ease;
	}

	.badge {
		font-size: 0.75rem;
		font-weight: 600;
	}

	.bg-gradient-success {
		background: linear-gradient(135deg, #28a745 0%, #20c997 100%) !important;
	}

	.bg-gradient-info {
		background: linear-gradient(135deg, #17a2b8 0%, #6f42c1 100%) !important;
	}

	.shadow-sm {
		box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
	}

	#pie-legend {
		height: auto !important;
		max-height: none !important;
		overflow: visible !important;
	}

	#pie-legend small {
		white-space: normal !important;
		/* teks membungkus */
		overflow: visible !important;
		/* tidak disembunyikan */
		text-overflow: unset !important;
		/* hilangkan ... */
	}

	#pie-legend .d-flex {
		align-items: flex-start !important;
	}
</style>
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
<!-- ROW UTAMA: PENGUMUMAN + 4 BOX STAT -->
<?php
if ($this->session->userdata('level') === "user") { ?>
	<div class="row mt-4">

		<!-- QUICK ACTIONS -->
		<div class="col-xl-4 col-lg-4 col-md-12 mb-4">
			<div class="card border-0 shadow-sm h-100">
				<div class="card-header bg-transparent pb-0 pt-3 border-0">
					<h6 class="text-capitalize fw-bold text-primary">Aksi Cepat</h6>
				</div>
				<div class="card-body pt-0">
					<div class="d-grid gap-3">
						<a href="<?= base_url("?p=" . base64_encode('lapor')) ?>" class="btn btn-primary btn-lg py-3">
							<i class="fas fa-plus-circle me-2"></i>Buat Laporan Baru
						</a>
						<a href="<?= base_url("?p=" . base64_encode('status_laporan')) ?>" class="btn btn-outline-primary py-2">
							<i class="fas fa-history me-2"></i>Riwayat Laporan
						</a>
						<a href="<?= base_url("?p=" . base64_encode('bantuan')) ?>" class="btn btn-outline-primary py-2">
							<i class="fas fa-info-circle me-2"></i>Panduan Penggunaan
						</a>
					</div>
				</div>
			</div>
		</div>

		<!-- PENGUMUMAN -->
		<div class="col-xl-4 col-lg-4 col-md-6 mb-4">
			<div class="card border-0 shadow-sm h-100">
				<div class="card-header bg-transparent pb-0 pt-3 border-0">
					<h6 class="text-capitalize fw-bold text-primary">Pengumuman</h6>
				</div>
				<div class="card-body text-center d-flex flex-column justify-content-center py-4">
					<div class="icon icon-shape bg-gradient-info shadow-info text-center rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
						style="width: 70px; height: 70px;">
						<i class="fas fa-bullhorn text-white fs-5"></i>
					</div>
					<h6 class="text-dark mb-2 fw-semibold">Tidak Ada Pengumuman</h6>
					<p class="text-muted text-sm mb-0 lh-base">
						Belum ada pengumuman terbaru dari admin lingkungan.
					</p>
				</div>
			</div>
		</div>

		<!-- STATISTIK SINGKAT -->
		<div class="col-xl-4 col-lg-4 col-md-6 mb-4">
			<div class="card border-0 shadow-sm h-100">
				<div class="card-header bg-transparent pb-0 pt-3 border-0">
					<h6 class="text-capitalize fw-bold text-primary">Ringkasan Laporan</h6>
				</div>
				<div class="card-body pt-0">
					<div class="d-flex justify-content-between align-items-center mb-3 p-2 rounded-3 bg-light">
						<span class="text-sm fw-medium">Total Laporan</span>
						<span class="badge bg-primary rounded-pill px-3 py-2">0</span>
					</div>
					<div class="d-flex justify-content-between align-items-center mb-3 p-2 rounded-3 bg-light">
						<span class="text-sm fw-medium">Dalam Proses</span>
						<span class="badge bg-warning rounded-pill px-3 py-2">0</span>
					</div>
					<div class="d-flex justify-content-between align-items-center mb-3 p-2 rounded-3 bg-light">
						<span class="text-sm fw-medium">Selesai</span>
						<span class="badge bg-success rounded-pill px-3 py-2">0</span>
					</div>
					<div class="d-flex justify-content-between align-items-center p-2 rounded-3 bg-light">
						<span class="text-sm fw-medium">Ditolak</span>
						<span class="badge bg-danger rounded-pill px-3 py-2">0</span>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- AJAKAN VISUAL -->
	<div class="row mt-2">
		<div class="col-12">
			<div class="card bg-gradient-success border-0 shadow-sm">
				<div class="card-body p-4">
					<div class="row align-items-center">
						<div class="col-md-8">
							<h4 class="text-white mb-2 fw-bold">Mulai Berkontribusi untuk Lingkungan</h4>
							<p class="text-white mb-0 opacity-90">
								Laporan Anda membantu menciptakan lingkungan yang lebih bersih dan aman bagi semua warga.
							</p>
						</div>
						<div class="col-md-4 text-md-end mt-3 mt-md-0">
							<a href="<?= base_url("?p=" . base64_encode('lapor')) ?>" class="btn btn-light btn-lg fw-semibold px-4">
								<i class="fas fa-flag me-2"></i>Laporkan Sekarang
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<?php
if ($this->session->userdata('level') === "admin") { ?>

	<div class="row mb-4">
		<?php
		$nama_data = [
			"Laporan Masuk",
			"Laporan Terselesaikan",
			"Laporan Masuk 7 Hari Terakhir",
			"Laporan Terselesaikan 7 Hari Terakhir",
			"Laporan Masuk Bulan Ini",
			"Laporan Terselesaikan Bulan Ini"
		];

		$icons = [
			"fas fa-inbox",
			"fas fa-check-circle",
			"fas fa-calendar-week",
			"fas fa-calendar-check",
			"fas fa-calendar-alt",
			"fas fa-chart-line"
		];

		$colors = [
			"bg-gradient-primary",
			"bg-gradient-success",
			"bg-gradient-info",
			"bg-gradient-warning",
			"bg-gradient-danger",
			"bg-gradient-secondary"
		];

		for ($i = 0; $i < 6; $i++) {
		?>
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-4">
				<div class="card border-0 shadow-sm h-100">
					<div class="card-body p-3">
						<div class="row align-items-center">
							<div class="col-8">
								<p class="text-xs mb-1 text-uppercase fw-semibold text-muted"><?= $nama_data[$i] ?></p>
								<h4 class="fw-bold text-dark mb-0"><?= $jumlah_total[$i]->jumlah ?></h4>
							</div>
							<div class="col-4 text-end">
								<div class="icon icon-shape <?= $colors[$i] ?> shadow text-center rounded-circle mx-auto"
									style="width: 50px; height: 50px;">
									<i class="<?= $icons[$i] ?> text-white fs-6" style="line-height: 50px;"></i>
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

	<!-- Charts Section - Optimized -->
	<div class="row">
		<!-- Left Column - Combined Charts -->
		<div class="col-lg-8 mb-4">
			<div class="card border-0 shadow-sm">
				<div class="card-header bg-transparent pb-2 pt-3 border-0">
					<h6 class="fw-bold text-primary mb-0">
						<i class="fas fa-chart-line me-2"></i>Trend Laporan Per Bulan
					</h6>
				</div>
				<div class="card-body p-3">
					<div style="height: 300px;">
						<canvas id="chart-line"></canvas>
					</div>
				</div>
			</div>

			<div class="card border-0 shadow-sm mt-4">
				<div class="card-header bg-transparent pb-2 pt-3 border-0 d-flex justify-content-between align-items-center">
					<h6 class="fw-bold text-primary mb-0">
						<i class="fas fa-map-marker-alt me-2"></i>Wilayah Pelapor Aktif
					</h6>
					<!-- <div class="dropdown">
						<button class="btn btn-sm btn-outline-primary dropdown-toggle py-1" type="button" data-bs-toggle="dropdown">
							<i class="fas fa-filter me-1"></i>Filter
						</button>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Bulan Ini</a></li>
							<li><a class="dropdown-item" href="#">Tahun Ini</a></li>
						</ul>
					</div> -->
				</div>
				<div class="card-body p-3">
					<div style="height: 250px;">
						<canvas id="chart-bar"></canvas>
					</div>
				</div>
			</div>
		</div>

		<!-- Right Column - Pie Chart -->
		<div class="col-lg-4 mb-4">
			<div class="card border-0 shadow-sm h-100">
				<div class="card-header bg-transparent pb-2 pt-3 border-0">
					<h6 class="fw-bold text-primary mb-0">
						<i class="fas fa-chart-pie me-2"></i>Kategori Laporan
					</h6>
				</div>
				<div class="card-body p-3">
					<!-- Chart Area -->
					<div class="chart-pie-container position-relative mb-3" style="height: 180px;">
						<canvas id="chart-pie" height="180"></canvas>
					</div>

					<!-- Legend Area -->
					<div id="pie-legend" class="mt-2"></div>
				</div>
			</div>
		</div>

	</div>

	<!-- Quick Stats -->
	<div class="row mt-4">
		<div class="col-12">
			<div class="card border-0 bg-light shadow-sm">
				<div class="card-body p-3">
					<div class="row align-items-center">
						<div class="col-md-8">
							<h6 class="fw-bold text-dark mb-1">Ringkasan Performa</h6>
							<p class="text-muted small mb-0">
								Rasio penyelesaian:
								<span class="fw-bold text-success">
									<?= $jumlah_total[0]->jumlah > 0 ? round(($jumlah_total[1]->jumlah / $jumlah_total[0]->jumlah) * 100, 1) : 0 ?>%
								</span>
							</p>
						</div>
						<div class="col-md-4 text-md-end">
							<span class="badge bg-primary">Total: <?= $jumlah_total[0]->jumlah ?> Laporan</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } else if ($this->session->userdata('level') === "petugas") {
?>

	<div class="row">
		<?php
		$nama_data = [
			"Jumlah Tugas",
			"Tugas Selesai Bulan Ini",
		];
		for ($i = 0; $i < 2; $i++) {
		?>
			<div class="col-xl-3 col-sm-6 mb-4">
				<div class="card h-100">
					<div class="card-body p-3">
						<div class="row align-items-center">
							<div class="col-8">
								<p class="text-sm mb-0 text-uppercase font-weight-bold"><?= $nama_data[$i] ?></p>
								<h5 class="font-weight-bolder">999</h5>
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

		<div class="col-xl-6 col-sm-12 mb-4">
			<div class="card h-100">
				<div class="card-body p-3">
					<div class="row align-items-center">
						<div class="col-8">
							<p class="text-sm mb-0 text-uppercase font-weight-bold">Cabang Tugas</p>
							<h5 class="font-weight-bolder">Cabang Epsilon</h5>
							<!-- <p class="mb-0">
							<span class="text-success text-sm font-weight-bolder">+12%</span> minggu ini
						</p> -->
						</div>
						<div class="col-4 text-end">
							<i class="bi bi-geo-alt" style="font-size: 35px; font-weight: bold;"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row mt-2 mb-4">
		<div class="col-12">
			<div class="card">
				<div class="card-header pb-0 p-3">
					<h6 class="mb-0">Tugas Baru</h6>
				</div>
				<div class="card-body p-3">
					<ul class="list-group">
						<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
							<div class="d-flex align-items-center">
								<div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
									<i class="ni ni-trash text-white opacity-10"></i>
								</div>
								<div class="d-flex flex-column">
									<h6 class="mb-1 text-dark text-sm">Penanganan Laporan Masalah Air</h6>
									<span class="text-xs">Klik untuk melihat lokasi</span></span>
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
	</div>

<?php
}
?>


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
			// Tunggu sampai DOM benar-benar siap
			setTimeout(initializeCharts, 100);
		});

		function initializeCharts() {
			// Line Chart
			var ctx1 = document.getElementById("chart-line");
			if (ctx1) {
				var gradientStroke1 = ctx1.getContext("2d").createLinearGradient(0, 230, 0, 50);
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
			}

			// Pie Chart - DIPERBAIKI
			var ctx2 = document.getElementById("chart-pie");
			if (ctx2) {
				var pieChart = new Chart(ctx2, {
					type: "pie",
					data: {
						labels: <?= json_encode($stat2_labels) ?>,
						datasets: [{
							label: 'Jumlah Laporan',
							data: <?= json_encode($stat2_numbers) ?>,
							backgroundColor: [
								'#ff6384', '#36a2eb', '#ffce56', '#4bc0c0',
								'#9966ff', '#ff9f40', '#8ac926', '#1982c4',
								'#6a4c93', '#ff595e'
							],
							borderWidth: 2,
							borderColor: '#fff',
							hoverOffset: 15
						}]
					},
					options: {
						responsive: true,
						maintainAspectRatio: false,
						plugins: {
							legend: {
								display: false
							},
							tooltip: {
								callbacks: {
									label: function(context) {
										return `${context.label}: ${context.raw} laporan`;
									}
								}
							}
						}
					}
				});

				// Pilih salah satu: 
				createPieLegend(pieChart); // Untuk layout list
				// ATAU
			}

			// Bar Chart
			var ctx3 = document.getElementById("chart-bar");
			if (ctx3) {
				const colors = [
					"#e6194b", "#3cb44b", "#ffe119", "#4363d8", "#f58231",
					"#911eb4", "#46f0f0", "#f032e6", "#bcf60c", "#fabebe"
				];

				new Chart(ctx3, {
					type: "bar",
					data: {
						labels: <?= json_encode($stat3_labels) ?>,
						datasets: [{
							label: 'Jumlah Laporan',
							data: <?= json_encode($stat3_numbers) ?>,
							backgroundColor: colors,
							borderWidth: 0,
							borderRadius: 4
						}]
					},
					options: {
						responsive: true,
						maintainAspectRatio: false,
						plugins: {
							legend: {
								display: false
							}
						},
						scales: {
							y: {
								beginAtZero: true,
								grid: {
									drawBorder: false
								}
							},
							x: {
								grid: {
									display: false
								}
							}
						}
					}
				});
			}
		}

		// Fungsi untuk membuat custom legend pie chart
		function createPieLegend(chart) {
			var legendContainer = document.getElementById('pie-legend');
			if (!legendContainer) return;

			var labels = chart.data.labels;
			var backgroundColor = chart.data.datasets[0].backgroundColor;
			var data = chart.data.datasets[0].data;
			var total = data.reduce((a, b) => a + b, 0);

			legendContainer.innerHTML = '';

			labels.forEach(function(label, i) {
				var value = data[i];
				var percentage = total > 0 ? Math.round((value / total) * 100) : 0;

				var legendItem = document.createElement('div');
				legendItem.className = 'col-6 mb-2';
				legendItem.innerHTML = `
            <div class="d-flex align-items-center">
                <span class="legend-color me-2" style="
                    display: inline-block;
                    width: 12px;
                    height: 12px;
                    background-color: ${backgroundColor[i]};
                    border-radius: 2px;
                "></span>
                <small class="text-truncate" title="${label}">
                    ${label}: <strong>${value} (${percentage}%)</strong>
                </small>
            </div>
        `;
				legendContainer.appendChild(legendItem);
			});
		}

		// Handle window resize untuk chart
		let resizeTimeout;
		window.addEventListener('resize', function() {
			clearTimeout(resizeTimeout);
			resizeTimeout = setTimeout(() => {
				// Re-initialize charts pada resize
				initializeCharts();
			}, 250);
		});
	</script>
	<!-- <script>
			// Alternatif: Fungsi legend dengan grid layout
			function createPieLegendGrid(chart) {
				var legendContainer = document.getElementById('pie-legend');
				if (!legendContainer) return;

				var labels = chart.data.labels;
				var backgroundColor = chart.data.datasets[0].backgroundColor;
				var data = chart.data.datasets[0].data;
				var total = data.reduce((a, b) => a + b, 0);

				legendContainer.className = 'pie-legend-grid';
				legendContainer.innerHTML = '';

				labels.forEach(function(label, i) {
					var value = data[i];
					var percentage = total > 0 ? Math.round((value / total) * 100) : 0;

					var legendItem = document.createElement('div');
					legendItem.className = 'legend-item-grid';
					legendItem.title = `${label}: ${value} (${percentage}%)`;
					legendItem.innerHTML = `
            <div class="legend-color-grid" style="background-color: ${backgroundColor[i]}"></div>
            <div class="legend-text-grid">
                <div class="legend-label-grid">${label}</div>
            </div>
        `;
					legendContainer.appendChild(legendItem);
				});
			}
		</script> -->

<?php } ?>