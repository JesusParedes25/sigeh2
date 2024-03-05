<!doctype html>
<html> 
<head>
<title>Cargar Ficheros</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css'>
<style>
.navbar {
	position: relative;
	min-height: 50px;
	margin-bottom: 5px;
}
</style>
</head>
<body>
  

 <?php
 error_reporting(0);
              include('../conexion.php');
              $id_evidencia = $_GET['id'];
              //echo $id_evidencia;
              $sql = "SELECT id_tactico, indicador, dependencia, usuario
                  FROM tacticos
                  WHERE id_tactico = $id_evidencia";
              $result = $link->query($sql);
              $row = $result->fetch_assoc();
          ?>

<div class="container">
  <div class="row">
    <h4><?php echo $row['dependencia'];?></h4>
    <hr style="margin-top:5px;margin-bottom: 5px;">
    <div class="content"> </div>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Cargar archivos para <?php echo $row['indicador'];?></h3>
      </div>
      <div class="panel-body">
        <div class="col-lg-6">
         
          <form method="POST" action="CargarFicheros.php" enctype="multipart/form-data">
<div class="form-group">
              <label class="btn btn-primary" for="my-file-selector">
                <input required="" type="file" name="file" id="exampleInputFile">
                 <input type="hidden" name="id_tactico" value="<?php echo $row['id_tactico'];?>">
                  <input type="hidden" name="usuario" value="<?php echo $row['usuario'];?>">
              </label>
              
</div>
          <button class="btn btn-primary" type="submit">Cargar Evidencia </button>
          </form>
        </div>
        <div class="col-lg-6"> </div>
      </div>
    </div>
  
<!--tabla-->
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Descargas Disponibles</h3>
      </div>
      <div class="panel-body">
   
<table class="table">
  <thead>
    <tr>
      <th width="7%">#</th>
      <th width="70%">Nombre del Archivo</th>
      <th width="13%">Descargar</th>
      <th width="10%">Eliminar</th>
    </tr>
  </thead>
  <tbody>
<?php

$path = 'subidas/'.$row['usuario'].'/'.$row['id_tactico'].'/';
//echo $path;
$archivos = scandir('subidas/'.$row['usuario'].'/'.$row['id_tactico'].'');
$num=0;
for ($i=2; $i<count($archivos); $i++)
{$num++;
?>
<p>  
 </p>



         
    <tr>
      <th scope="row"><?php echo $num;?></th>
      <td><?php echo $archivos[$i]; ?></td>
      <td><a title="Descargar Archivo" href="<?php echo $path; echo $archivos[$i]; ?>" download="<?php echo $archivos[$i]; ?>" style="color: blue; font-size:18px;"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> </a></td>
      <td><a title="Eliminar Archivo" href="Eliminar.php?name=<?php echo $path; echo $archivos[$i]; ?>" style="color: red; font-size:18px;" onclick="return confirm('Esta seguro de eliminar el archivo?');"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </a></td>
    </tr>
 <?php }?> 

  </tbody>
</table>
</div>
</div>
<!-- Fin tabla--> 
  </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
</body>
</html>
