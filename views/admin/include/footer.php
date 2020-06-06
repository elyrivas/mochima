
  <footer class="main-footer">
    <strong>Copyright &copy; 2019 <a href="#">Mochima.com.ve</a>.</strong>
    Todos los Derechos Reservados.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>


</div>
<!-- ./wrapper -->

<?php require_once 'script.php'; ?>

<script type="text/javascript">
 // Que se desplacen los DIV
  $('.connectedSortable').sortable({
    placeholder         : 'sort-highlight',
    connectWith         : '.connectedSortable',
    handle              : '.card-header, .nav-tabs',
    forcePlaceholderSize: true,
    zIndex              : 999999
  });
  
  $('.connectedSortable .card-header, .connectedSortable .nav-tabs-custom').css('cursor', 'move');
</script>

</body>
</html>
