<?php
$error='';
$datos=$_REQUEST['Datos'];
$id=$_REQUEST['ID'];
$fecha=$_REQUEST['Fecha'];
$monto=$_REQUEST['Monto'];
$descripcion=$_REQUEST['Descripcion'];


function clear_text($string)
{
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}

	if ($error =='') 
	{
	$file_open= fopen("file.csv", "a");
	$no_rows=count(file("file.csv"));
	if($no_rows>1){
		$no_rows=($no_rows -1) +1;
	}
	$form_data=array(
	'Datos' => $datos,
	'ID' => $id,
	'Fecha' => $fecha,
	'Monto' => $monto,
	'Descripcion' => $descripcion
	);
	fputcsv($file_open, $form_data);
	$error = '<h2 class="texto-centrado">Gracias por realizar tu transaccion Con Nosotros</h2>';
	$datos='';
	$id='';
	$fecha='';
	$monto='';
	$descripcion='';
	}



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> <!--Link de Bootstrap-->
        <link rel="stylesheet" type="text/css" href="CSS/hojaestilo.css">

</head>
<body>
<form method="post" class="container-fluid">
	<nav class="navbar navbar-dark bg-dark">
<div class="container">
	<a href="index.php" class="navbar-brand">Contacto</a>
</div>
</nav>
					<br>
					<?php
echo $error;
					?>
					<br>
					<div class="form-group" method="post">
<section class="form-texto">
					<input type="text" class="title" class="form-control" placeholder="Datos de la Transaccion" autofocus name="Datos" id="Datos" value="<?php echo $datos; ?>" required>
				
					</div>
					<div class="form-group form-texto" method="post">
					<input type="text" class="title" class="form-control" placeholder="ID" autofocus name="ID" id="ID" value="<?php echo $id; ?>"required>
					</div>
					<div class="form-group form-texto" method="post">
					<input type="text" class="title" class="form-control" placeholder="Fecha y Hora" autofocus id="Fecha" name="Fecha" value="<?php echo $fecha; ?>" required>
					</div>
					<div class="form-group form-texto" method="post">
					<input type="text" class="title" class="form-control" placeholder="Monto" autofocus name="Monto" id="Monto" value="<?php echo $monto; ?>" required>
					</div>
					<div class="form-group form-texto" method="post">
					<input type="text" class="title" class="form-control" placeholder="Descripcion" autofocus id="Descripcion" name="Descripcion"  value="<?php echo $descripcion; ?>"required>
					</div>

</section>

<div class="boton">
	<br>
					<input type="submit" class="btn btn-success btn-block" name="save_task" value="Guardar Transaccion">
				</div>	
			</div>
		</form>
</body>
</html>
	