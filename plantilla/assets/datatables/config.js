$(document).ready(function(){
  $("#table").DataTable({
    "filter": "",
    "pagingType": "full_numbers",
    "lengtMenu": [
      [10, 25, 50, -1],
      [10, 25, 50, "All"]
  ],
    language: {
      search: "Buscar",
      searchPlaceholder: "",
      info: "Mostrando página _PAGE_ de _PAGES_",
      emptyTable: "No hay registros",
      infoEmpty: "No hay registros",
      lengthMenu: "",
      paginate: {
        first: "<i class='bx bx-chevrons-left bx-sm align-middle'></i>",
        last: "<i class='bx bx-chevrons-right bx-sm align-middle'></i>",
        next: "<i class='bx bx-chevron-right bx-sm align-middle'></i>",
        previous: "<i class='bx bx-chevron-left bx-sm align-middle'></i>",
      },
    }
  });
});