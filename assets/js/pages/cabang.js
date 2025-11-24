var proses;
["id", "nama_cabang", "kabkot", "latitude", "longitude", "created_at"];

let lat

const centerJabar = [-6.9174639, 107.6191238]; // Bandung
const map = L.map("map").setView(centerJabar, 8);

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
	maxZoom: 19,
	attribution: "&copy; OpenStreetMap contributors",
}).addTo(map);

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
	$("#lat").val(latlng.lat.toFixed(7));
	$("#lng").val(latlng.lng.toFixed(7));

	// Saat marker di-drag, perbarui input
	currentMarker.on("dragend", function (e) {
		const p = e.target.getLatLng();
		$("#lat").val(p.lat.toFixed(7));
		$("#lng").val(p.lng.toFixed(7));
	});
}

// Klik pada map -> set marker
map.on("click", function (e) {
	setMarker(e.latlng);
});

$(document).ready(function () {
	dataTableConfig = {
		serverSide: true,
		ajax: {
			url: origin + "cabang/data_cabang/",
			dataSrc: "data",
		},
		order: [0, "desc"],
		columnDefs: [
			{
				width: "20%",
				targets: 1,
			},
		],
		columns: [
			{
				title: "ID",
				data: "id",
			},
			{
				title: "Cabang",
				data: "nama_cabang",
			},
			{
				title: "Kabupaten/ Kota",
				data: "kabkot",
			},
			{
				title: "Lokasi",
				render: function (data, type, row, meta) {
					return (
						`
                            <a class="btn btn-sm btn-primary" href="` +
						url_map +
						`&longitude=` +
						row.longitude +
						`&latitude=` +
						row.latitude +
						`">
                                Lihat Lokasi
                            </a>
                        `
					);
				},
			},
			{
				title: "Action",
				data: "id",
				render: function (data, type, row, meta) {
					return (
						`
                            <button class="btn btn-sm btn-warning" onclick="edit(this)">
                            	<i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="deleteM(` +
						data +
						`)">
                            	<i class="bi bi-trash"></i>
                            </button>
                        `
					);
				},
			},
		],
	};

	$(document).ready(function () {
		$("#tabel_lapor").DataTable(dataTableConfig);
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
