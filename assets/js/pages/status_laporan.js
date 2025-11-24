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