  <div class="content">
  	<div class="container-fluid">
  		<div class="row">
  			<div class="col-lg-12">
  				<div class="card">
  					<div class="card-header border-2">
  						<div class="row align-items-center">
  							<div class="col-12 col-sm-8">
  								<h6 class="mb-0">
  									<i class="fas fa-info-square"></i>&nbsp; Daftar Tugas
  								</h6>
  							</div>

  							<!-- Selesai Modal -->
  							<div class="modal fade" id="selesaiModal" aria-labelledby="selesaiModalLabel" aria-hidden="true">
  								<div class="modal-dialog modal-dialog-centered">
  									<div class="modal-content">
  										<div class="modal-header">
  											<h5 class="modal-title" id="selesaiModalLabel">Konfirmasi Selesai</h5>
  											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  										</div>
  										<div class="modal-body">
  											<form id="selesaiForm" novalidate enctype="multipart/form-data">
  												<input type="hidden" id="penanganan_id_selesai" name="penanganan_id">

  												<div class="mb-3">
  													<label for="catatan_selesai" class="form-label">Catatan</label>
  													<textarea id="catatan_selesai" name="catatan" class="form-control" rows="4" placeholder="Tulis catatan atau ringkasan penanganan..." required></textarea>
  													<div class="invalid-feedback">Mohon isi catatan penanganan.</div>
  												</div>

  												<div class="mb-3">
  													<label for="lampiran_selesai" class="form-label">Lampiran (opsional)</label>
  													<input id="lampiran_selesai" name="lampiran[]" type="file" class="form-control" multiple accept="image/*,application/pdf">
  													<div class="form-text">Anda bisa mengunggah foto atau file terkait penanganan.</div>
  												</div>

  												<div class="text-end">
  													<button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Batal</button>
  													<button id="selesai_submit" type="submit" class="btn btn-primary">Kirim</button>
  												</div>
  											</form>
  										</div>
  									</div>
  								</div>
  							</div>
  							<div class="col-12 col-sm-4 text-sm-end text-center mt-2 mt-sm-0">
  							</div>
  						</div>
  					</div>
  					<div class="card-body">
  						<div class="table-responsive">
  							<table id="tabel_lapor" class="table table-stripped" style="width:100%">
  							</table>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>

  <div class="modal fade" id="detailModalTugas" aria-labelledby="detailModalTugasLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title" id="detailModalTugasLabel">Detail Tugas</h5>
  				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  			</div>
  			<div class="modal-body">
  				<div class="row">
  					<div class="col-12">
  						<div class="mb-2"><strong>ID:</strong> <span id="tugas_detail_id">-</span></div>
  						<div class="mb-2"><strong>Catatan:</strong>
  							<div id="tugas_detail_catatan" class="text-wrap">-</div>
  						</div>
  						<div class="mb-2"><strong>Status:</strong> <span id="tugas_detail_status">-</span></div>
  						<div class="mb-2"><strong>Lampiran:</strong>
  							<div id="tugas_detail_lampiran">-</div>
  						</div>
  						<div class="mb-2"><strong>Dibuat pada:</strong> <span id="tugas_detail_created_at">-</span></div>
  						<div class="mb-2"><strong>Waktu Selesai Ditangani:</strong> <span id="tugas_detail_waktu_selesai">-</span></div>
  						<div class="mb-2"><strong>Waktu Dikonfirmasi Selesai:</strong> <span id="tugas_detail_waktu_dikonfirmasi">-</span></div>

  						<hr />
  						<h6>Daftar Laporan Terkait</h6>
  						<div id="tugas_detail_laporan_list" class="mt-2"></div>
  					</div>
  				</div>
  			</div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
  			</div>
  		</div>
  	</div>
  </div>

  <script>
  	$(document).ready(function() {
  		dataTableConfig = {
  			serverSide: true,
  			ajax: {
  				url: origin + "penanganan/read_petugas",
  				dataSrc: "data",
  			},
  			order: [0, "desc"],
  			columnDefs: [{
  				width: "20%",
  				targets: 1,
  			}, ],
  			columns: [{
  					title: "ID",
  					data: "id",
  				},
  				{
  					title: "Ditugaskan Pada",
  					data: "created_at",
  				},
  				{
  					title: "Status Penanganan",
  					data: "status_penanganan",
  				},
  				{
  					title: "Action",
  					render: function(data, type, row, meta) {
  						return (
  							`
							<button class="btn btn-sm btn-info" onclick="detail(this)" title="Detail">
								<i class="bi bi-eye"></i> Detail	
							</button>
							<button class="btn btn-sm btn-success" onclick="confirmSelesai(${row.id})" title="Selesai">
								<i class="bi bi-check"></i> Selesai
							</button>
						`
  						);
  					},
  				},
  			],
  		};
  		table = $("#tabel_lapor").DataTable(dataTableConfig);
  	});
  	// store maps to avoid re-init
  	window.tugasDetailMaps = window.tugasDetailMaps || {};

  	function initTugasLaporanMap(id, lat, lon) {
  		try {
  			if (!window.L) return; // Leaflet not available
  		} catch (e) {
  			return
  		}

  		var mapId = 'tugas_leaflet_map_' + id;
  		if (window.tugasDetailMaps[mapId]) return; // already init

  		var mapEl = document.getElementById(mapId);
  		if (!mapEl) return;

  		var m = L.map(mapId, {
  			scrollWheelZoom: false
  		}).setView([lat || 0, lon || 0], (lat && lon) ? 13 : 2);
  		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  			attribution: '&copy; OSM'
  		}).addTo(m);
  		if (lat && lon) {
  			L.marker([lat, lon]).addTo(m);
  		}
  		window.tugasDetailMaps[mapId] = m;
  	}

  	window.detail = function(btn) {
  		var tr = $(btn).closest('tr');
  		var row = table.row(tr).data();
  		if (!row) return;

  		$('#tugas_detail_id').text(row.id || '-');
  		$('#tugas_detail_catatan').text(row.catatan || '-');
  		$('#tugas_detail_status').text(row.status_penanganan || '-');
  		$('#tugas_detail_created_at').text(row.created_at || '-');
  		$('#tugas_detail_waktu_selesai').text(row.waktu_selesai_ditangani || '-');
  		$('#tugas_detail_waktu_dikonfirmasi').text(row.waktu_dikonfirmasi_selesai || '-');

  		// lampiran handling: could be JSON or string
  		var lampHtml = '-';
  		if (row.lampiran) {
  			try {
  				var parsed = JSON.parse(row.lampiran);
  				if (Array.isArray(parsed)) {
  					lampHtml = parsed.map(function(f) {
  						var url = (f.indexOf('http') === 0) ? f : origin + 'assets/img/dokumentasi/' + f;
  						return '<a class="btn btn-sm btn-outline-primary me-1" href="' + url + '" target="_blank" rel="noopener">Download</a>';
  					}).join(' ');
  				} else {
  					var url = (row.lampiran.indexOf('http') === 0) ? row.lampiran : origin + 'assets/img/dokumentasi/' + row.lampiran;
  					lampHtml = '<a class="btn btn-sm btn-outline-primary" href="' + url + '" target="_blank" rel="noopener">Download Lampiran</a>';
  				}
  			} catch (e) {
  				var url = (row.lampiran.indexOf('http') === 0) ? row.lampiran : origin + 'assets/img/dokumentasi/' + row.lampiran;
  				lampHtml = '<a class="btn btn-sm btn-outline-primary" href="' + url + '" target="_blank" rel="noopener">Download Lampiran</a>';
  			}
  		}
  		$('#tugas_detail_lampiran').html(lampHtml);

  		// clear laporan list while loading
  		$('#tugas_detail_laporan_list').html('<div class="spinner" style="width:20px;height:20px;border-width:3px;margin:10px auto"></div>');

  		if (row.id) {
  			$.ajax({
  				url: origin + 'penanganan/laporan_by_id_penanganan',
  				method: 'GET',
  				data: {
  					id: row.id
  				},
  				dataType: 'json',
  				success: function(resp) {
  					var data = [];
  					if (!resp) data = [];
  					else if (Array.isArray(resp)) data = resp;
  					else if (Array.isArray(resp.data)) data = resp.data;
  					else if (Array.isArray(resp.laporan)) data = resp.laporan;

  					if (!data || data.length === 0) {
  						$('#tugas_detail_laporan_list').html('<div class="text-muted">Tidak ada laporan terkait.</div>');
  						return;
  					}

  					var listHtml = '';
  					data.forEach(function(item) {
  						var iid = item.id || '-';
  						var user_id = item.user_id || '-';
  						var nama_user = item.nama_user || item.nama || '-';
  						var kategori = item.kategori || '-';
  						var kabkot = item.kabkot || '-';
  						var deskripsi = item.deskripsi || '-';
  						var foto = item.foto || '';
  						var tingkat = item.tingkat_keparahan || '-';
  						var tanggal = item.tanggal_laporan || '-';
  						var lon = item.longitude || item.lon || item.lng || '';
  						var lat = item.latitude || item.lat || '';
  						var collapseDesc = 'tugas_collapse_desc_' + iid;
  						var collapseMap = 'tugas_collapse_map_' + iid;
  						var mapDivId = 'tugas_leaflet_map_' + iid;

  						listHtml += '<div class="card mt-2 mb-2" style="border:1px solid #ddd;">';
  						listHtml += '<div class="card-body p-2">';
  						listHtml += '<div class="d-flex justify-content-between align-items-start">';
  						listHtml += '<div><strong>ID: ' + iid + '</strong> &nbsp;|&nbsp; <strong>' + kategori + '</strong><br><small>' + kabkot + ' - Pelapor: ' + nama_user + ' (ID:' + user_id + ')</small></div>';
  						if (foto) {
  							var fotoUrl = (foto.indexOf('http') === 0) ? foto : origin + 'assets/img/dokumentasi/' + foto;
  							listHtml += '<div><a class="btn btn-sm btn-outline-secondary me-1" href="' + fotoUrl + '" target="_blank" rel="noopener">View Foto</a></div>';
  						} else {
  							listHtml += '<div class="text-muted small">No Foto</div>';
  						}
  						listHtml += '</div>';

  						listHtml += '<div class="mt-2 small text-muted">Level: <strong>' + tingkat + '</strong> &nbsp;|&nbsp; Tanggal: ' + tanggal + '</div>';

  						listHtml += '<div class="mt-2 d-flex gap-2">';
  						listHtml += '<button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#' + collapseDesc + '" aria-expanded="false" aria-controls="' + collapseDesc + '">Deskripsi</button>';
  						listHtml += '<button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#' + collapseMap + '" aria-expanded="false" aria-controls="' + collapseMap + '" onclick="setTimeout(function(){ initTugasLaporanMap(\'' + iid + '\',' + (lat || 0) + ',' + (lon || 0) + '); },300);">Map</button>';
  						listHtml += '</div>';

  						listHtml += '<div class="collapse mt-2" id="' + collapseDesc + '"><div class="card card-body p-2 border-0" style="background:#f8f9fa; font-size:0.95rem;">' + deskripsi + '</div></div>';

  						listHtml += '<div class="collapse mt-2" id="' + collapseMap + '"><div class="card card-body p-2 border-0" style="background:#fff; font-size:0.95rem;"><div style="width:100%; height:220px;"><div id="' + mapDivId + '" style="width:100%; height:100%; border-radius:6px; overflow:hidden;"></div><div class="mt-1 small text-muted">Longitude: ' + lon + ' &nbsp;|&nbsp; Latitude: ' + lat + '</div></div></div></div>';

  						listHtml += '</div></div>';
  					});

  					$('#tugas_detail_laporan_list').html(listHtml);
  				},
  				error: function() {
  					$('#tugas_detail_laporan_list').html('<div class="text-muted">Gagal memuat daftar laporan.</div>');
  				}
  			});
  		} else {
  			$('#tugas_detail_laporan_list').html('<div class="text-muted">Tidak ada laporan terkait.</div>');
  		}

  		// show modal
  		$('#detailModalTugasLabel').text('Detail Tugas');
  		var modalEl = document.getElementById('detailModalTugas');
  		var bsModal = new bootstrap.Modal(modalEl);
  		bsModal.show();
  	}
  </script>
