var proses;
$(document).ready(function() {
const dataTableConfig = {
  responsive: true,
  autoWidth: false,
  scrollX: false,
  columnDefs: [
    { targets: 0, width: "50px", className: "text-center" },
    { targets: 1, className: "text-wrap" },
    { targets: 2, width: "80px", className: "text-center" },
    { targets: 3, width: "80px", className: "text-center" }
  ],
  language: {
    paginate: {
      previous: '<i class="fas fa-chevron-left"></i>',
      next: '<i class="fas fa-chevron-right"></i>'
    },
    zeroRecords: "Laporan tidak ditemukan"
  },
  lengthChange: true,
  searching: false,
  info: false,
  ajax: origin + "/status_laporan/data_status"
};


$(document).ready(function() {
  $("#tabel_status").DataTable(dataTableConfig);
});
});

function detail(id) {
  $.ajax({
    url: origin + "/status_laporan/detail_status",
    method: "post",
    data: { id: id },
    dataType: "json",
    error: function() {
      Swal.fire({
        position: "center",
        icon: "error",
        title: "Sistem Bermasalah, Silahkan Coba Kembali"
      });
    },
    success: function(res) {

      $("#exampleModalLabel").html('<i class="fas fa-search-plus"></i>&nbsp; Detail Laporan');
      $("#exampleModal").modal("show");

      $("#deskripsi").val(res.deskripsi).prop("disabled", true);
      $("#id_laporan").val(res.id_laporan);

      $("#simpan").hide();

      // tampilkan foto
      let foto = res.foto && res.foto !== "" 
          ? origin + "/assets/img/dokumentasi/" + res.foto 
          : origin + "/assets/img/dokumentasi/no-image.png";

      $("#img_preview").attr("src", foto).show();

      // jika gambar gagal dimuat
      $("#img_preview").off("error").on("error", function() {
        $(this).attr("src", origin + "/assets/img/dokumentasi/no-image.png");
      });
    }
  });
}
