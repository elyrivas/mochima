<head>
    <meta charset="utf-8">
    <title>Sitios Registrados</title>
    <link rel="stylesheet" href="views/admin/pdf/style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
       <div id="cintillo">
        <img src="views/admin/pdf/cintillo.png">
      </div>
      <div id="logo">
        <img src="views/admin/pdf/mochima.png">
      </div>
      <h1>MOCHIMA</h1>
      <div id="project">
        <div><span>PROYECTO</span> Sistema Mochima</div>
        <div><span></span>Ministerio del Popúlar para el turismo</div>
        <div><span>REPORTE: </span> Registro de Sitios Turísticos</div>
      </div>

    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th>RTN </th>
            <th>NOMBRE DEL SITIO </th>
            <th>TIPO</th>
            <th>ESTADO</th>
            <th>CIUDAD</th>
            <th>Telefono</th>
          </tr>
        </thead>
        <tbody>
            
          <?php foreach($sitios as $item): ?>
            <tr>
              <td class="unit"><?php  echo  $item["rtn"]; ?></td>
    	        <td class="qty"><?php   echo  $item["nombre_sitio"]; ?></td>
    	        <td class="desc">
                <?php if ($item["tipo_id"]=="1") {
                    echo 'Alojamiento';
                  }
                    if ($item["tipo_id"]=="2") {
                    echo 'Recreación';
                } elseif ($item["tipo_id"]=="3") {
                    echo 'Alimentos y bebidas';
                }?>
              </td>
    	  		  <td class="total"><?php echo  $item["estado_id"]; ?></td>
              <td class="total"><?php echo  $item["ciudad_id"]; ?></td>
              <td class="total"><?php echo  $item["telefono_sitio"]; ?></td>
    	    </tr>
    	    <?php endforeach ?>
        </tbody>
      </table>
      
    </main>
    
    <footer>
      <strong>Copyright &copy; 2019 <a href="#">Mochima.com.ve</a>.</strong>
    Todos los Derechos Reservados.
    </footer>
  </body>
</html>
