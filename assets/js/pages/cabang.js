var proses;
["id", "nama_cabang", "kabkot", "latitude", "longitude", "created_at"];

let lat = null,
	lng = null;
let id_cabang = "";
let table;

var map = L.map("map").setView([-6.9, 107.6], 8);

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
	attribution: "&copy; OpenStreetMap contributors",
}).addTo(map);

$("#tambah_data").on("click", function () {
	setTimeout(() => {
		map.invalidateSize();
	}, 200);
});

fetch(`${origin}/assets/geojson/Jabar_By_Kab.geojson`)
	.then((response) => response.json())
	.then((data) => {
		geoData = data;
		L.geoJSON(data, {
			style: function (feature) {
				const idx = feature.properties.OBJECTID - 1 || 0; // pastikan setiap feature punya id unik (0–26)
				return {
					color: "black",
					weight: 0,
					fillColor: "#00c8faff",
					fillOpacity: 0.15,
				};
			},
		}).addTo(map);
	});

let currentMarker = null;

function setMarker(latlng) {
	// Hapus marker sebelumnya
	if (currentMarker) {
		map.removeLayer(currentMarker);
		currentMarker = null;
	}

	// Buat marker baru dan tambahkan ke map
	currentMarker = L.marker(latlng, { draggable: true }).addTo(map);

	// Update input
	lat = latlng.lat.toFixed(7);
	lng = latlng.lng.toFixed(7);

	// Saat marker di-drag, perbarui input
	currentMarker.on("dragend", function (e) {
		const p = e.target.getLatLng();
		lat = p.lat.toFixed(7);
		lng = p.lng.toFixed(7);
	});
}

// Klik pada map -> set marker
map.on("click", function (e) {
	setMarker(e.latlng);
});

//Submit
$("#tambah_data").click(function () {
	$("#exampleModalLabel").html(
		'<i class="fas fa-plus"></i>&nbsp; Tambah Laporan'
	);
	$("#kategori").prop("disabled", false);
	$("#deskripsi").prop("disabled", false);
	$("#file_foto").prop("disabled", false);
	$("#simpan").show();

	$("#kategori").val("");
	$("#deskripsi").val("");
	$("#id_laporan").val("");
	$("#nm_file").val("");

	$(".filepond--root").show();
	$("#preview_foto").hide();

	pond.removeFiles();
});

$("#simpan").click(function () {
	var nama_cabang = $("#nama_cabang").val();
	var kabkot_id = $("#kabkot_id").val();

	var data;

	if (nama_cabang.length < 1) $("#nama_cabang").addClass("is-invalid");
	else $("#nama_cabang").removeClass("is-invalid");

	if (kabkot_id.length < 1) $("#kabkot_id").addClass("is-invalid");
	else $("#kabkot_id").removeClass("is-invalid");

	if (id_cabang.length > 0)
		data = {
			status: "update",
			id: id_cabang,
			nama_cabang: nama_cabang,
			kabkot_id: kabkot_id,
			latitude: lat,
			longitude: lng,
		};
	else
		data = {
			status: "insert",
			nama_cabang: nama_cabang,
			kabkot_id: kabkot_id,
			latitude: lat,
			longitude: lng,
		};

	if (
		nama_cabang.length > 0 &&
		kabkot_id.length > 0 &&
		lat != null &&
		lng != null
	) {
		$.ajax({
			url: origin + "cabang/tambah_cabang",
			method: "post",
			data: data,
			dataType: "json",
			success: function (res) {
				Swal.fire({
					title: res.judul,
					icon: res.icon,
				}).then(function () {
					if (res.icon == "error") return;
					id_cabang = "";
					$("#exampleModal").modal("hide");
					table.ajax.reload();
				});
			},
		});
	} else {
		Swal.fire({
			title: "Warning",
			icon: "warning",
			text: "Mohon isi form dengan lengkap terlebih dahulu!!!"
		});
	}
});

$(document).ready(function () {
	$(document).ready(function () {
    dataTableConfig = {
        serverSide: true,
        responsive: true,
        autoWidth: false,
        scrollX: false,
        language: {
            paginate: {
                previous: '<i class="fas fa-chevron-left"></i>',
                next: '<i class="fas fa-chevron-right"></i>'
            },
            zeroRecords: "Data Cabang tidak ditemukan"
        },
        lengthChange: true,
        searching: false,
        info: false,
        createdRow: function (row, data, dataIndex) {
            // Tambahkan class untuk alignment tengah di semua sel
            $('td', row).css({
                'vertical-align': 'middle',
                'text-align': 'center'
            });
        },
        ajax: {
            url: origin + "cabang/data_cabang/",
            dataSrc: function (json) {
                console.log("Response from server:", json);
                return json.data;
            },
            error: function (xhr, error, thrown) {
                console.log("AJAX Error:", xhr, error, thrown);
            }
        },
        order: [[1, "desc"]], // Urutkan berdasarkan kolom ke-1 (Cabang)
        columnDefs: [
            {
                targets: '_all', // Semua kolom
                className: 'dt-body-center' // Class untuk alignment tengah
            },
            {
                targets: 0, // Kolom No
                orderable: false,
                searchable: false,
                width: '5%'
            },
            {
                targets: 1, // Kolom Cabang
                width: "25%"
            },
            {
                targets: 2, // Kolom Kabupaten/Kota
                width: "20%"
            },
            {
                targets: 3, // Kolom Lokasi
                defaultContent: "-",
                width: "30%",
                render: function (data, type, row, meta) {
                    if (!row.longitude || !row.latitude) {
                        return '<div style="display: flex; align-items: center; justify-content: center; height: 100%;">Lokasi tidak tersedia</div>';
                    }
                    return `
                        <div style="display: flex; gap: 5px; align-items: center; justify-content: center; flex-wrap: nowrap;">
                            <a class="btn btn-sm btn-primary" href="${url_map}&longitude=${row.longitude}&latitude=${row.latitude}">
                                Lihat Lokasi
                            </a>
                            <a class="btn btn-sm btn-secondary" href="https://www.google.com/maps?q=${row.latitude},${row.longitude}" target="_blank">
                                Google Maps
                            </a>
                        </div>
                    `;
                }
            },
            {
                targets: 4, // Kolom Action
                defaultContent: "-",
                orderable: false,
                searchable: false,
                width: "20%",
                render: function (data, type, row, meta) {
                    return `
                        <div style="display: flex; gap: 5px; align-items: center; justify-content: center; flex-wrap: nowrap;">
                            <button class="btn btn-sm btn-warning" onclick="edit(this, '${row.kabkot_id || ''}')">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="deleteM(${row.id})">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    `;
                }
            }
        ],
        columns: [
            {
                title: "No",
                data: null,
                defaultContent: "-",
                render: function (data, type, row, meta) {
                    if (type === 'display') {
                        return '<div style="display: flex; align-items: center; justify-content: center; height: 100%;">' + (meta.settings._iDisplayStart + meta.row + 1) + '</div>';
                    }
                    return meta.row + 1;
                }
            },
            {
                title: "Cabang",
                data: "nama_cabang",
                defaultContent: "-",
                render: function (data, type, row) {
                    return '<div style="display: flex; align-items: center; justify-content: center; height: 100%;">' + (data || '-') + '</div>';
                }
            },
            {
                title: "Kabupaten/Kota",
                data: "kabkot",
                defaultContent: "-",
                render: function (data, type, row) {
                    return '<div style="display: flex; align-items: center; justify-content: center; height: 100%;">' + (data || '-') + '</div>';
                }
            },
            {
                title: "Lokasi",
                defaultContent: "-"
            },
            {
                title: "Action",
                defaultContent: "-"
            }
        ]
    };
});

	$(document).ready(function () {
		table = $("#tabel_lapor").DataTable(dataTableConfig);
	});

	$("#tambah_data").click(function () {
		$("#exampleModalLabel").html(
			'<i class="fas fa-plus"></i>&nbsp; Tambah Laporan'
		);
		$("#kategori").prop("disabled", false);
		$("#deskripsi").prop("disabled", false);
		$("#file_foto").prop("disabled", false);
		$("#simpan").show();

		$("#kategori").val("");
		$("#deskripsi").val("");
		$("#id_laporan").val("");
		$("#nm_file").val("");

		$(".filepond--root").show();
		$("#preview_foto").hide();

		pond.removeFiles();
	});

	$("#simpan").click(function () {
		var id_laporan = $("#id_laporan").val();
		var kategori = $("#kategori").val();
		var deskripsi = $("#deskripsi").val();
		var nm_file = $("#nm_file").val();

		var data;

		if (kategori.length < 1) $("#kategori").addClass("is-invalid");
		else $("#kategori").removeClass("is-invalid");

		if (deskripsi.length < 1) $("#deskripsi").addClass("is-invalid");
		else $("#deskripsi").removeClass("is-invalid");

		if (id_laporan.length > 0)
			data = {
				status: "update",
				id: id_laporan,
				kategori: kategori,
				deskripsi: deskripsi,
				nm_file: nm_file,
			};
		else
			data = {
				status: "insert",
				kategori: kategori,
				deskripsi: deskripsi,
				nm_file: nm_file,
			};

		if (kategori.length > 0 && deskripsi.length > 0) {
			$.ajax({
				url: origin + "lapor/tambah_laporan",
				method: "post",
				data: data,
				dataType: "json",
				success: function (res) {
					Swal.fire({
						title: res.judul,
						icon: res.icon,
					}).then(function () {
						$("#exampleModal").modal("hide");
						$("#kategori, #deskripsi").val("");
						$("#file_foto").val("");
						$("#nm_file").val("");
						$("#file_foto").val("");
						pond.removeFiles();
						$("#tabel_lapor").DataTable().destroy();
						$("#tabel_lapor").DataTable(dataTableConfig);
					});
				},
			});
		}
	});

	//Aktifkan FilePOND
	FilePond.registerPlugin(
		FilePondPluginImagePreview,
		FilePondPluginImageExifOrientation,
		FilePondPluginFileValidateSize,
		FilePondPluginFileValidateType
	);

	// Select the file input and use
	// create() to turn it into a pond
	var pond = FilePond.create(document.querySelector("#file_foto"), {
		allowImagePreview: false,
		allowMultiple: false,
		allowFileEncode: false,
		required: false,
		maxFileSize: "7MB",
		instantUpload: true,
		stylePanelAspectRatio: 0.4, // supaya area preview persegi
		labelIdle: `
                    <div style="width:100%;height:100%;">
                  <br>
                      <p>
                        Seret &amp; Simpan foto diarea ini atau <span class="filepond--label-action" tabindex="0">Klik disini</span>
                       </p>
                    </div>
                `,
		acceptedFileTypes: ["image/jpeg", "image/png"],
		fileValidateTypeDetectType: (source, type) =>
			new Promise((resolve, reject) => {
				console.log(source, type);
				// Do custom type detection here and return with promise
				// swal("Tipe File Tidak sesuai", {icon:"error"});
				resolve(type);
			}),
		// upload Ke Server
		server: {
			process: (
				fieldName,
				file,
				metadata,
				load,
				error,
				progress,
				abort,
				transfer,
				options
			) => {
				// fieldName is the name of the input field
				// file is the actual file object to send
				const formData = new FormData();
				formData.append(fieldName, file, file.name);

				const request = new XMLHttpRequest();
				// request.open('POST', origin+'calon_anggota_p/upload_file?id_rec='+id_rec);
				request.open("POST", origin + "/lapor/upload_file");

				// Should call the progress method to update the progress to 100% before calling load
				// Setting computable to false switches the loading indicator to infinite mode
				request.upload.onprogress = (e) => {
					progress(e.lengthComputable, e.loaded, e.total);
				};

				// Should call the load method when done and pass the returned server file id
				// this server file id is then used later on when reverting or restoring a file
				// so your server knows which file to return without exposing that info to the client
				request.onload = function () {
					if (request.status >= 200 && request.status < 300) {
						// the load method accepts either a string (id) or an object
						var status = JSON.parse(request.responseText).sts;
						var pesan = JSON.parse(request.responseText).msg;
						var nm_file = JSON.parse(request.responseText).nm_file;

						console.log(
							"STATUS: " +
							status +
							", PESAN: " +
							pesan +
							" nama file: " +
							nm_file
						);
						if (status == "1")
							Swal.fire({
								title: "Apakah anda yakin akan Mengunggah foto tersebut?",
								icon: "warning",
								showCancelButton: true,
								confirmButtonColor: "#28A745",
								cancelButtonColor: "#DC3545",
								confirmButtonText: "Ya, unggah!",
								cancelButtonText: "Tidak, batalkan",
								dangerMode: true,
							}).then((result) => {
								if (result.isConfirmed) {
									Swal.fire("Foto Berhasil di unggah", "", "success").then(
										function () {
											$("#nm_file").val(nm_file);
											// location.reload();
										}
									);
								} else {
									$.ajax({
										url: origin + "/lapor/hapus_file",
										type: "post",
										data: { nm_file: nm_file },
										success: function () {
											Swal.fire(
												"Anda telah menghapus file dan membatalkan perintah",
												"",
												"info"
											);
										},
									});
								}
							});
						else
							Swal.fire(
								"Foto gagal di upload, silahkan ulangi kembali",
								"",
								"info"
							).then(function () {
								// location.reload();
							});
					} else {
						// Can call the error method if something is wrong, should exit after
						Swal.fire("Gagal", "");
					}
				};

				request.send(formData);

				// Should expose an abort method so the request can be cancelled
				return {
					abort: () => {
						// This function is entered if the user has tapped the cancel button
						request.abort();

						// Let FilePond know the request has been cancelled
						abort();
					},
				};
			},
		},
	});
	//END Filepond
});

function edit(btn, id) {
	// 1. Ambil data dari baris tabel DataTables
	var tr = $(btn).closest('tr');
	var table = $('#tabel_lapor').DataTable();
	var row = table.row(tr);
	var data = row.data();

	if (!data) {
		console.error("Data tidak ditemukan");
		return;
	}

	id_cabang = data.id;

	$("#exampleModalLabel").html('<i class="fas fa-edit"></i>&nbsp; Edit Cabang');

	// Isi input text dan select
	$("#nama_cabang").val(data.nama_cabang).removeClass("is-invalid");

	// Pastikan value yang diisi sesuai dengan ID kabkot (bukan nama kabkot)
	// Asumsi: row.data() mengandung 'kabkot_id'. Jika tidak, pastikan respon JSON controller menyertakannya.
	$("#kabkot_id").val(data.kabkot_id).removeClass("is-invalid");

	// 4. Handle Lokasi & Peta
	if (data.latitude && data.longitude) {
		// Update variabel global lat & lng
		lat = data.latitude;
		lng = data.longitude;

		var position = new L.LatLng(parseFloat(lat), parseFloat(lng));

		// Panggil fungsi setMarker yang sudah ada di script Anda
		setMarker(position);

		// Pusatkan peta ke lokasi marker
		map.setView(position, 15);
	} else {
		// Jika data lokasi kosong, reset marker
		if (currentMarker) {
			map.removeLayer(currentMarker);
			currentMarker = null;
		}
		lat = null;
		lng = null;
		map.setView([-6.9, 107.6], 8);
	}

	// 5. Tampilkan Modal
	$("#exampleModal").modal("show");

	// 6. Fix render peta (Peta seringkali error/abu-abu jika dirender saat modal hidden)
	setTimeout(function () {
		map.invalidateSize();
		if (lat && lng) {
			map.panTo(new L.LatLng(lat, lng));
		}
	}, 300);
};

function clearForm() {
	// 1. Reset Global Variable
	id_cabang = "";
	lat = null;
	lng = null;

	// 2. Reset Input Form
	$("#nama_cabang").val("");
	$("#kabkot_id").val(""); // Reset dropdown select

	// 3. Hapus Class Validasi (Error Merah)
	$("#nama_cabang").removeClass("is-invalid");
	$("#kabkot_id").removeClass("is-invalid");

	// 4. Reset Judul Modal ke "Tambah"
	$("#exampleModalLabel").html('<i class="fas fa-plus"></i>&nbsp; Tambah Cabang');

	// 5. Hapus Marker dari Peta
	if (currentMarker) {
		map.removeLayer(currentMarker);
		currentMarker = null;
	}

	// 6. Reset View Peta ke Default (Jawa Barat)
	map.setView([-6.9, 107.6], 8);

	// Refresh ukuran peta agar tidak error saat modal dibuka
	setTimeout(() => {
		map.invalidateSize();
	}, 200);
}


function deleteM(btn) {
	var tr = $(btn).closest('tr');
	var table = $('#tabel_lapor').DataTable();
	var row = table.row(tr);
	var data = row.data();
	if (!data) {
		console.error("Data tidak ditemukan");
		return;
	}
	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: "btn btn-success ms-1",
			cancelButton: "btn btn-danger"
		},
		buttonsStyling: false
	});
	swalWithBootstrapButtons.fire({
		title: 'Perhatian?',
		text: 'Apakah anda yakin ingin menghapus data ini?',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Ya, hapus',
		cancelButtonText: 'Tidak',
		buttons: true,
		dangerMode: true,
		reverseButtons: true
	}).then((willDelete) => {
		if (!willDelete.isConfirmed) return;
		$.ajax({
			url: origin + "petugas/hapus_petugas",
			method: "post",
			data: {
				id: data.id
			},
			dataType: "json",
			success: function (res) {
				Swal.fire({
					title: res.judul,
					icon: res.icon,
				}).then(function () {
					if (res.icon == "error") return;
					id_cabang = "";
					$("#exampleModal").modal("hide");
					table.ajax.reload();
				});
			},
		});
	});
}
