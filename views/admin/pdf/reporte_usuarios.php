<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Usuarios Registrados</title>
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
        <div><span>REPORTE: </span> Registro de Usuarios</div>
      </div>

    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="desc">TIPO DE USUARIO</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>USUARIO</th>
            <th>CORREO</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($usuarios as $item): ?>
    	    <tr>
    	        <td class="desc">
    	          <?php if ($item["rol"]=="1") {
    	              echo 'Administrador';
    	          } elseif ($item["rol"]=="2") {
    	              echo 'Propietario';
    	          }?>
    	        </td>
    	        <td class="unit"><?php echo $item["nombre"]; ?></td>
    	        <td class="qty"><?php echo $item["apellido"]; ?></td>
    	        <td class="total"><?php echo $item["usuario"]; ?></td>
    	  		  <td class="total"><?php echo $item["correo"]; ?></td>
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
