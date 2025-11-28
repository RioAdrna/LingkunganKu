<style>
	.hover-lift {
		transition: all 0.3s ease;
	}

	.hover-lift:hover {
		transform: translateY(-5px);
		box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15) !important;
	}

	.bg-gradient-primary {
		background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
	}

	.bg-gradient-success {
		background: linear-gradient(135deg, #42b883 0%, #347474 100%) !important;
	}

	.bg-gradient-warning {
		background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%) !important;
	}

	.bg-gradient-info {
		background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%) !important;
	}

	.bg-gradient-danger {
		background: linear-gradient(135deg, #fa709a 0%, #fee140 100%) !important;
	}

	.list-group-item {
		transition: background-color 0.2s ease;
	}

	.list-group-item:hover {
		background-color: #f8f9fa;
	}

	.badge {
		font-size: 0.7rem;
		font-weight: 600;
	}

	.progress {
		border-radius: 10px;
	}

	.progress-bar {
		border-radius: 10px;
	}

	/* Animasi untuk icon */
	.icon-shape {
		transition: transform 0.3s ease;
	}

	.card:hover .icon-shape {
		transform: scale(1.1);
	}

	.hover-lift {
		transition: all 0.3s ease;
	}

	.hover-lift:hover {
		transform: translateY(-5px);
		box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15) !important;
	}

	.bg-gradient-primary {
		background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
	}

	.bg-gradient-success {
		background: linear-gradient(135deg, #42b883 0%, #347474 100%) !important;
	}

	.bg-gradient-warning {
		background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%) !important;
	}

	.bg-gradient-info {
		background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%) !important;
	}

	.bg-gradient-danger {
		background: linear-gradient(135deg, #fa709a 0%, #fee140 100%) !important;
	}

	.list-group-item {
		transition: background-color 0.2s ease;
	}

	.list-group-item:hover {
		background-color: #f8f9fa;
	}

	.badge {
		font-size: 0.7rem;
		font-weight: 600;
	}

	.progress {
		border-radius: 10px;
	}

	.progress-bar {
		border-radius: 10px;
	}

	/* Animasi untuk icon */
	.icon-shape {
		transition: transform 0.3s ease;
	}

	.card:hover .icon-shape {
		transform: scale(1.1);
	}

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
<?php } else if ($this->session->userdata('level') === "petugas") { ?>

	<div class="row">
		<?php
		$nama_data = [
			"Jumlah Tugas",
			"Tugas Selesai Bulan Ini",
			"Tugas Dalam Proses",
			"Rating Kepuasan"
		];

		$icons = [
			"fas fa-tasks",
			"fas fa-check-circle",
			"fas fa-spinner",
			"fas fa-star"
		];

		$colors = [
			"bg-gradient-primary",
			"bg-gradient-success",
			"bg-gradient-warning",
			"bg-gradient-info"
		];

		$values = ["15", "8", "7", "4.8"];

		for ($i = 0; $i < 4; $i++) {
		?>
			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 mb-4">
				<div class="card border-0 shadow-sm h-100 hover-lift">
					<div class="card-body p-3">
						<div class="row align-items-center">
							<div class="col-8">
								<p class="text-xs mb-1 text-uppercase fw-semibold text-muted"><?= $nama_data[$i] ?></p>
								<h4 class="fw-bold text-dark mb-0"><?= $values[$i] ?></h4>
								<?php if ($i == 3): ?>
									<div class="mt-1">
										<small class="text-warning">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star-half-alt"></i>
										</small>
									</div>
								<?php endif; ?>
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
		<?php } ?>
	</div>

	<!-- Cabang Tugas & Quick Actions -->
	<div class="row mt-2">
		<!-- Cabang Tugas -->
		<div class="col-lg-6 mb-4">
			<div class="card border-0 shadow-sm h-100">
				<div class="card-header bg-transparent pb-2 pt-3 border-0">
					<h6 class="fw-bold text-primary mb-0">
						<i class="fas fa-map-marker-alt me-2"></i>Informasi Cabang
					</h6>
				</div>
				<div class="card-body">
					<div class="d-flex align-items-center mb-3">
						<div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle me-3"
							style="width: 60px; height: 60px;">
							<i class="fas fa-building text-white fs-5" style="line-height: 60px;"></i>
						</div>
						<div>
							<h5 class="fw-bold text-dark mb-1">Cabang Epsilon</h5>
							<p class="text-muted mb-1">
								<i class="fas fa-users me-1"></i>
								<span class="fw-semibold">12 Petugas</span>
							</p>
							<p class="text-muted mb-0">
								<i class="fas fa-map-pin me-1"></i>
								Jl. Merdeka No. 123, Jakarta
							</p>
						</div>
					</div>
					<div class="mt-3">
						<div class="progress mb-2" style="height: 8px;">
							<div class="progress-bar bg-success" role="progressbar" style="width: 65%"></div>
						</div>
						<small class="text-muted">65% tugas bulan ini telah diselesaikan</small>
					</div>
				</div>
			</div>
		</div>

		<!-- Quick Actions -->
		<div class="col-lg-6 mb-4">
			<div class="card border-0 shadow-sm h-100">
				<div class="card-header bg-transparent pb-2 pt-3 border-0">
					<h6 class="fw-bold text-primary mb-0">
						<i class="fas fa-bolt me-2"></i>Aksi Cepat
					</h6>
				</div>
				<div class="card-body">
					<div class="d-grid gap-2">
						<a href="#" class="btn btn-primary btn-lg py-3">
							<i class="fas fa-list-check me-2"></i>Lihat Semua Tugas
						</a>
						<a href="#" class="btn btn-outline-primary py-2">
							<i class="fas fa-map-marked-alt me-2"></i>Peta Tugas
						</a>
						<a href="#" class="btn btn-outline-primary py-2">
							<i class="fas fa-chart-line me-2"></i>Laporan Harian
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Tugas Baru -->
	<div class="row mt-2 mb-4">
		<div class="col-12">
			<div class="card border-0 shadow-sm">
				<div class="card-header bg-transparent pb-2 pt-3 border-0 d-flex justify-content-between align-items-center">
					<h6 class="fw-bold text-primary mb-0">
						<i class="fas fa-bell me-2"></i>Tugas Baru
					</h6>
					<span class="badge bg-primary">3 Tugas Menunggu</span>
				</div>
				<div class="card-body p-0">
					<div class="list-group list-group-flush">
						<!-- Tugas 1 -->
						<div class="list-group-item border-0">
							<div class="row align-items-center">
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-warning text-white text-center rounded-circle"
										style="width: 40px; height: 40px;">
										<i class="fas fa-tint fs-6" style="line-height: 40px;"></i>
									</div>
								</div>
								<div class="col">
									<h6 class="mb-1 fw-semibold text-dark">Penanganan Masalah Air</h6>
									<p class="text-muted mb-1 small">
										<i class="fas fa-map-marker-alt me-1"></i>
										Jl. Sudirman No. 45 - RT 05/RW 02
									</p>
									<div class="d-flex align-items-center">
										<span class="badge bg-warning me-2">Prioritas Tinggi</span>
										<span class="badge bg-light text-dark">
											<i class="fas fa-clock me-1"></i>2 jam lalu
										</span>
									</div>
								</div>
								<div class="col-auto">
									<button class="btn btn-sm btn-primary">
										<i class="fas fa-eye me-1"></i>Detail
									</button>
								</div>
							</div>
						</div>

						<!-- Tugas 2 -->
						<div class="list-group-item border-0">
							<div class="row align-items-center">
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-danger text-white text-center rounded-circle"
										style="width: 40px; height: 40px;">
										<i class="fas fa-trash fs-6" style="line-height: 40px;"></i>
									</div>
								</div>
								<div class="col">
									<h6 class="mb-1 fw-semibold text-dark">Pembersihan Sampah Menumpuk</h6>
									<p class="text-muted mb-1 small">
										<i class="fas fa-map-marker-alt me-1"></i>
										Jl. Merdeka No. 88 - RT 03/RW 01
									</p>
									<div class="d-flex align-items-center">
										<span class="badge bg-danger me-2">Sangat Mendesak</span>
										<span class="badge bg-light text-dark">
											<i class="fas fa-clock me-1"></i>1 jam lalu
										</span>
									</div>
								</div>
								<div class="col-auto">
									<button class="btn btn-sm btn-primary">
										<i class="fas fa-eye me-1"></i>Detail
									</button>
								</div>
							</div>
						</div>

						<!-- Tugas 3 -->
						<div class="list-group-item border-0">
							<div class="row align-items-center">
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-info text-white text-center rounded-circle"
										style="width: 40px; height: 40px;">
										<i class="fas fa-tree fs-6" style="line-height: 40px;"></i>
									</div>
								</div>
								<div class="col">
									<h6 class="mb-1 fw-semibold text-dark">Pemangkasan Pohon Tumbang</h6>
									<p class="text-muted mb-1 small">
										<i class="fas fa-map-marker-alt me-1"></i>
										Taman Kota - Area Bermain Anak
									</p>
									<div class="d-flex align-items-center">
										<span class="badge bg-success me-2">Biasa</span>
										<span class="badge bg-light text-dark">
											<i class="fas fa-clock me-1"></i>30 menit lalu
										</span>
									</div>
								</div>
								<div class="col-auto">
									<button class="btn btn-sm btn-primary">
										<i class="fas fa-eye me-1"></i>Detail
									</button>
								</div>
							</div>
						</div>
					</div>

					<!-- Footer dengan tombol lihat semua -->
					<div class="card-footer bg-transparent border-0 text-center py-3">
						<a href="#" class="btn btn-outline-primary btn-sm">
							<i class="fas fa-list me-1"></i>Lihat Semua Tugas
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Statistik Cepat -->
	<div class="row mt-2">
		<div class="col-12">
			<div class="card border-0 bg-gradient-primary text-white shadow-sm">
				<div class="card-body p-4">
					<div class="row align-items-center">
						<div class="col-md-8">
							<h5 class="text-white mb-2 fw-bold">
								<i class="fas fa-chart-line me-2"></i>Ringkasan Performa Minggu Ini
							</h5>
							<p class="text-white mb-0 opacity-90">
								Anda telah menyelesaikan <strong>8 dari 15 tugas</strong> dengan rating kepuasan 4.8/5.0
							</p>
						</div>
						<div class="col-md-4 text-md-end">
							<div class="bg-white text-primary rounded p-3 d-inline-block">
								<small class="fw-bold">Efisiensi</small>
								<h4 class="mb-0 fw-bold">87%</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } ?>


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