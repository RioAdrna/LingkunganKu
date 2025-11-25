<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Peta Laporan - Responsive Fix</title>

  <!-- Bootstrap CSS (CDN) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.Default.css">

  <style>
    /* Reset any stray inline weirdness */
    .card-body a { text-decoration: none; }

    /* Map area responsive */
    #map {
      width: 100%;
      min-height: 300px;
      height: 70vh; /* fleksibel */
    }

    /* control area */
    #control-map { width: 100%; }

    /* sample map thumbnail */
    .sample-map { width: 100%; height: 100px; overflow: hidden; border-radius: 6px; }
    .sample-map img { width: 100%; height: 100%; object-fit: cover; display:block; }

    /* make filter row use flex for first row (so tombol tetap di kanan) */
    .filter-row { display: flex; flex-wrap: wrap; gap: 12px; align-items: flex-end; }
    .filter-row .filter-item { flex: 1 1 220px; min-width: 160px; }
    .filter-row .filter-button { flex: 0 0 auto; }

    /* second row uses bootstrap columns but keep gaps tidy */
    .filter-row-2 { margin-top: .5rem; display:flex; flex-wrap:wrap; gap:12px; }
    .filter-row-2 .filter-item-2 { flex: 1 1 220px; min-width:160px; }

    /* small tweaks */
    .form-label { font-weight: 600; }
    .btn-tampilkan { padding: 8px 18px; font-weight:600; border-radius:8px; white-space:nowrap; }

    /* ensure popups don't overflow on small screens */
    .leaflet-popup-content { word-wrap: break-word; }

    /* responsive height adjustments */
    @media (max-width: 992px){ #map { height: 60vh; } }
    @media (max-width: 768px){ #map { height: 50vh; } }
    @media (max-width: 576px){ #map { height: 45vh; } }
  </style>
</head>
<body>

<div class="container-fluid py-3">
  <div class="row">
    <div class="col-12">
      <div class="card shadow-sm">
        <div class="card-header border-2">
          <div class="d-flex align-items-center">
            <div class="me-2"><i class="fas fa-route"></i></div>
            <div>
              <h6 class="mb-0">Peta Laporan</h6>
            </div>
          </div>
        </div>
        <div class="card-body">

          <!-- CONTROL (responsive) -->
          <div id="control-map">

            <!-- first row: Kategori | Dari | Sampai | Tampilkan (ke kanan) -->
            <div class="filter-row" role="group" aria-label="filter-row">

              <div class="filter-item">
                <label class="form-label">Kategori</label>
                <div class="input-group">
                  <span class="input-group-text bi bi-tags"></span>
                  <input id="kategori_selector" type="text" class="form-control" readonly value="Tampilkan semua"
                         data-bs-toggle="modal" data-bs-target="#kategori-modal" style="cursor:pointer;">
                </div>
              </div>

              <div class="filter-item">
                <label class="form-label">Dari tanggal</label>
                <div class="input-group">
                  <span class="input-group-text bi bi-calendar"></span>
                  <input id="tanggal_awal" type="date" class="form-control" onchange="limitDate(this)">
                </div>
              </div>

              <div class="filter-item">
                <label class="form-label">Sampai tanggal</label>
                <div class="input-group">
                  <span class="input-group-text bi bi-calendar-check"></span>
                  <input id="tanggal_akhir" type="date" class="form-control">
                </div>
              </div>

              <div class="filter-button">
                <button id="btnTampilkanTop" type="button" class="btn btn-primary btn-tampilkan" onclick="showPins()">Tampilkan</button>
              </div>

            </div>

            <!-- second row with selects -->
            <div class="filter-row-2 mt-3">

              <div class="filter-item-2">
                <label class="form-label">Kabupaten / Kota</label>
                <div class="input-group">
                  <span class="input-group-text bi bi-buildings"></span>
                  <select id="kabkot_id" class="form-select">
                    <option value="">Semua Wilayah</option>
                    <!-- php server side options preserved -->
                    <?php foreach ($kabkot as $val) { ?>
                      <option value="<?= $val->id ?>"><?= $val->nama ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="filter-item-2">
                <label class="form-label">Tingkat Keparahan</label>
                <div class="input-group">
                  <span class="input-group-text bi bi-bar-chart"></span>
                  <select id="tingkat_keparahan" class="form-select">
                    <option value="">Semua Tingkat</option>
                    <option value="1">Level 1</option>
                    <option value="2">Level 2</option>
                    <option value="3">Level 3</option>
                    <option value="4">Level 4</option>
                    <option value="5">Level 5</option>
                  </select>
                </div>
              </div>

              <div class="filter-item-2">
                <label class="form-label">Status</label>
                <div class="input-group">
                  <span class="input-group-text bi bi-question-diamond"></span>
                  <select id="status" class="form-select">
                    <option value="">Tampilkan Semua</option>
                    <option value="belum ditangani">belum ditangani</option>
                    <option value="ditugaskan">ditugaskan</option>
                    <option value="sudah ditangani">sudah ditangani</option>
                    <option value="selesai">selesai</option>
                    <option value="ditolak">ditolak</option>
                  </select>
                </div>
              </div>

              <div class="filter-item-2">
                <label class="form-label">Gaya Peta</label>
                <div class="input-group">
                  <span class="input-group-text bi bi-map"></span>
                  <input id="gaya_peta_selector" type="text" class="form-control" readonly value="Humanitarian"
                         data-bs-toggle="modal" data-bs-target="#gaya-peta-modal" style="cursor:pointer;">
                </div>
              </div>

            </div>

          </div>

          <hr />

          <!-- MAP -->
          <div id="map"></div>

          <!-- MODALS (kategori + gaya peta) kept mostly same structure -->
          <div class="modal fade" id="kategori-modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Pilih kategori yang ingin ditampilkan</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="kategori-modal-body">
                  <div class="mb-2">
                    <input type="checkbox" id="kat-semua" class="checkbox" checked onclick="toggleAllCheckboxes(this)">
                    <label for="kat-semua">Tampilkan semua</label>
                  </div>
                  <div class="row" id="kategori-checkbox-list">
                    <?php foreach ($kategori_laporan as $kategori) { ?>
                      <div class="col-6">
                        <input type="checkbox" value="<?= $kategori->id_kategori ?>|<?= $kategori->nama_kategori ?>"
                               id="kat-<?= $kategori->id_kategori ?>" class="checkbox item_checkbox" checked onclick="verifyCheckbox()">
                        <label for="kat-<?= $kategori->id_kategori ?>"><?= $kategori->nama_kategori ?></label>
                      </div>
                    <?php } ?>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="confirmSelectionCheckboxes()">Konfirmasi</button>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="gaya-peta-modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Pilih Gaya Peta</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="gaya-peta-modal-body">
                  <div id="gaya-peta-row" class="d-flex flex-wrap" style="gap:12px"></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="selectGayaPeta()">Konfirmasi</button>
                </div>
              </div>
            </div>
          </div>

        </div> <!-- card-body -->
      </div> <!-- card -->
    </div>
  </div>
</div>

<!-- SCRIPTS -->
<script src="<?= base_url('assets/vendor/jquery/dist/jquery.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet.markercluster/dist/leaflet.markercluster.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@turf/turf@6/turf.min.js"></script>
<script src="https://unpkg.com/leaflet.vectorgrid@latest/dist/Leaflet.VectorGrid.js"></script>

<script>
  // ---------- helper UI init ----------
  document.addEventListener('DOMContentLoaded', function() {
    confirmSelectionCheckboxes();
    loadSample();

    // If URL contains lat/long put marker
    const params = new URLSearchParams(window.location.search);
    const lat = params.get('latitude');
    const long = params.get('longitude');
    if (lat && long) {
      // wait map init
      setTimeout(() => { L.marker([lat, long]).addTo(map); }, 500);
    }

    // invalidateSize on resize so leaflet redraws correctly
    window.addEventListener('resize', () => { setTimeout(()=>map.invalidateSize(), 200); });
  });

  // ---------- Map init ----------
  var map = L.map('map', { preferCanvas: true }).setView([-6.9, 107.6], 11);

  var baseLayers = {
    "osm": L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '© OSM' }),
    "opentopomap": L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', { attribution: '© OpenTopoMap' }),
    "cyclosm": L.tileLayer('https://{s}.tile-cyclosm.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', { maxZoom: 18, attribution: '© OpenStreetMap contributors' }),
    "humanitarian": L.tileLayer('https://a.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', { maxZoom: 18, attribution: '© OpenStreetMap contributors' })
  };
  baseLayers.humanitarian.addTo(map);

  var markerGroup = L.markerClusterGroup();

  // ---------- load geojson and fit bounds ----------
  let geoData;
  fetch('<?= base_url("/assets/geojson/Jabar_By_Kab.geojson") ?>')
    .then(r => r.json()).then(data => {
      geoData = data;
      L.geoJSON(data, { style:() => ({ color: 'black', weight:0, fillColor:'#00c8faff', fillOpacity:0.15 }) }).addTo(map);
      map.fitBounds(L.geoJSON(data).getBounds());
    }).catch(e=>console.warn('geojson load error', e));

  // ---------- helper functions ----------
  function capitalizeFirstLetter(str){ return str && str.length? str.charAt(0).toUpperCase()+str.slice(1): str; }

  function loadSample(){
    const sample = {
      "osm": "https://c.tile.openstreetmap.org/9/409/265.png",
      "opentopomap": "https://c.tile.opentopomap.org/9/409/265.png",
      "cyclosm": "https://c.tile-cyclosm.openstreetmap.fr/cyclosm/9/409/265.png",
      "humanitarian": "https://a.tile.openstreetmap.fr/hot/9/409/265.png"
    };

    const container = document.getElementById('gaya-peta-row');
    container.innerHTML = '';
    Object.entries(sample).forEach(([key, value])=>{
      const card = document.createElement('div');
      card.className = 'd-flex align-items-start p-2 border rounded';
      card.style.width = 'calc(50% - 12px)';

      const radioWrap = document.createElement('div');
      radioWrap.className = 'me-3 d-flex align-items-center';
      radioWrap.innerHTML = `<input type="radio" name="gaya_peta" class="item_radio" value="${key}" id="peta-${key}" ${key==='humanitarian'?'checked':''}>`;

      const info = document.createElement('div');
      info.innerHTML = `<h6 style="margin:0 0 6px 0">${capitalizeFirstLetter(key)}</h6>`;
      const thumb = document.createElement('div');
      thumb.className = 'sample-map';
      thumb.innerHTML = `<img src="${value}" alt="${key}">`;

      info.appendChild(thumb);
      card.appendChild(radioWrap);
      card.appendChild(info);
      container.appendChild(card);
    });
  }

  function selectGayaPeta(){
    const radios = document.querySelectorAll('.item_radio');
    radios.forEach(r=>{ if(r.checked){ Object.values(baseLayers).forEach(l=>map.removeLayer(l)); baseLayers[r.value].addTo(map); document.getElementById('gaya_peta_selector').value = capitalizeFirstLetter(r.value); }});
  }

  function limitDate(input){ if(!input.value) return; document.getElementById('tanggal_akhir').min = input.value; if(document.getElementById('tanggal_akhir').value && new Date(document.getElementById('tanggal_akhir').value) < new Date(input.value)) document.getElementById('tanggal_akhir').value = ''; }

  function coloredIcon(image, level){
    const colors = ["#00eeff","#23e41c","#FCD34D","#FB923C","#EF4444"];
    return new L.divIcon({ className:'my-custom-pin', html:`<div style="display:flex;align-items:center;gap:6px"><img src="<?= base_url('assets/img/map/') ?>${image}" style="width:36px;height:36px;border-radius:6px;object-fit:cover"><div style="width:12px;height:12px;border-radius:12px;background:${colors[level-1]||colors[0]}"></div></div>` , iconAnchor:[16,36] });
  }

  // ---------- AJAX showPins (ke endpoint server) ----------
  let endpoint = "<?= base_url('/map/show_pin') ?>";
  let showList = [];

  function showPins(){
    $.ajax({ url:endpoint, type:'POST', dataType:'json', data: {
      kategori_id: showList,
      tanggal_awal: document.getElementById('tanggal_awal').value,
      tanggal_akhir: document.getElementById('tanggal_akhir').value,
      kabkot_id: document.getElementById('kabkot_id').value,
      tingkat_keparahan: document.getElementById('tingkat_keparahan').value,
      status: document.getElementById('status').value
    }, success(res){
      markerGroup.clearLayers();
      (res.data||[]).forEach(v=>{ if(!v.latitude||!v.longitude) return; L.marker([v.latitude, v.longitude], { icon: coloredIcon(v.icon, v.tingkat_keparahan||1) }).bindPopup(`<b style='font-size:17px'>${v.nama_kategori}</b><br><table style='font-size:11px'><tr><td>Level</td><td>:</td><td>${v.tingkat_keparahan}</td></tr><tr><td>Status</td><td>:</td><td>${v.status}</td></tr></table>${v.deskripsi}`).addTo(markerGroup); });
      map.addLayer(markerGroup);
    }, error(xhr,st,err){ console.error(err); alert('Terjadi kesalahan, coba lagi nanti'); } });
  }

  // ---------- kategori checkbox helpers ----------
  function verifyCheckbox(){ const boxes = document.querySelectorAll('.item_checkbox'); let all=true; boxes.forEach(b=>{ if(!b.checked) all=false; }); document.getElementById('kat-semua').checked = all; }
  function confirmSelectionCheckboxes(){ showList = []; let dText=''; document.getElementById('kategori_selector').value=''; const boxes = document.querySelectorAll('.item_checkbox'); boxes.forEach(b=>{ if(b.checked) { showList.push(b.value.split('|')[0]); dText += b.value.split('|')[1]+', '; }}); document.getElementById('kategori_selector').value = document.getElementById('kat-semua').checked? 'Tampilkan semua' : dText.replace(/,\s*$/,''); }
  function toggleAllCheckboxes(src){ document.querySelectorAll('.item_checkbox').forEach(b=>b.checked = src.checked); }

  // ---------- map click polygon logic (uses geoData & turf) ----------
  let layerHighlight = L.geoJSON(null).addTo(map);

  map.on('click', function(e){ if(!geoData) return; const point = turf.point([e.latlng.lng, e.latlng.lat]); let found=null; geoData.features.forEach(f=>{ if(turf.booleanPointInPolygon(point, f)) found = f; }); if(!found){ layerHighlight.clearLayers(); return; } layerHighlight.clearLayers(); layerHighlight.addData(found); const nama = found.properties.nama || found.properties.KABKOT || 'Wilayah tanpa nama'; // compute stats server-side data placeholders
    let info = `<div style='width:200px'><h5>${nama}</h5><b>Detail wilayah</b><br><small>Data statistik tersedia di server</small></div>`; var centroid = turf.center(found).geometry.coordinates; L.popup().setLatLng([centroid[1], centroid[0]]).setContent(info).openOn(map); map.fitBounds(layerHighlight.getBounds()); });

</script>
</body>
</html>