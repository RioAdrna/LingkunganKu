$(document).ready(function() {
    $("#tabel_lapor").DataTable({
      responsive: {
        details: { type: 'column' }
      },
      columnDefs: [
        { targets: 0, className: 'control', orderable: false }, 
        { targets: 1, className: "text-center" },
        { targets: 3, className: "text-center" }
      ],
      language: {
        paginate: {
          previous: '<i class="fas fa-chevron-left"></i>',
          next: '<i class="fas fa-chevron-right"></i>'
        }
      },    
      autoWidth: false,
      lengthChange: false,
      searching: false,
      info: false,
      ajax: origin + "/lapor/data_lapor"
    });
  });
  