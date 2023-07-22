$(document).ready(function () {
    $("#datatable").DataTable(),
      $("#datatable-buttons")
        .DataTable({
          lengthChange: !1,
          buttons: ["copy", "excel", "pdf","csv" ],
        })
        .buttons()
        .container()
        .appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"),
      $(".dataTables_length select").addClass("form-select form-select-sm");
  });
  $(document).ready(function () {
    $("#datatable").DataTable(),
      $("#myTable")
        .DataTable({
          lengthChange: !1,
          buttons: ["copy", "excel", "pdf","csv"],
        })
        .buttons()
        .container()
        .appendTo("#myTable_wrapper .col-md-6:eq(0)"),
      $(".dataTables_length select").addClass("form-select form-select-sm");
  });
  