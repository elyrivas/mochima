<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    

    $('#tabla-ofertas').DataTable({
      "language": {
        "url": "src/js/es.json"
      },
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": true,
    });

    $('#tabla-servicios').DataTable({
      "language": {
        "url": "src/js/es.json"
      },
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": true,
    });

  });
</script>
