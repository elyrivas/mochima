<head>
    <meta charset="utf-8">
    <title>Ofertas Registradas</title>
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
        <div><span>REPORTE: </span> Registro de Ofertas</div>
      </div>

    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th>NOMBRE DE LA OFERTA</th>
            <th>DESCRIPCIÓN</th>
            <th>PRECIO</th>
          </tr>
        </thead>
        <tbody>
            
          <?php foreach($oferta as $item): ?>
            <tr>
              <td class="total"><?php echo  $item["nombre_oferta"]; ?></td>
              <td class="total"><?php echo  $item["descripcion"]; ?></td>
              <td class="total"><?php echo  $item["precio"]; ?></td> 
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
