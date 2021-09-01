<?php
	include_once 'conexion.php';

	if(isset($_POST['guardar']))
	{
		$nombre=$_POST['Nombre'];
		$apPat=$_POST['apPat'];
		$apMat=$_POST['apMat'];
		$especialidad=$_POST['Especialidad'];
		$consultorio=$_POST['Consultorio'];

		if(!empty($nombre) && !empty($apPat) && !empty($apMat) && !empty($especialidad) && !empty($consultorio))
		{
			$consulta_insert=$con->prepare('INSERT INTO medico(Nombre, apPat, apMat, Especialidad, Consultorio) VALUES(:Nombre, :apPat, :apMat, :Especialidad, :Consultorio)');
			$consulta_insert->execute(array(
				':Nombre' => $nombre,
				':apPat' => $apPat,
				':apMat' => $apMat,
				':Especialidad' => $especialidad,
				':Consultorio' => $consultorio
			));
			header('Location: indexdoc.php');
		}
		else
		{
			echo "<script> alert('Está vacío... ves?);</script>";
		}

	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Doctor</title>
	<link rel="stylesheet" type="text/css" href="Styles/update.css">
</head>
<body>
	<div class="contenedor">
		<h2>CREAR NUEVO DOCTOR</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="Nombre" class="input_text" placeholder="Nombre">
				<input type="text" name="apPat" class="input_text" placeholder="Apellido Paterno">
				<input type="text" name="apMat" class="input_text" placeholder="Apellido Materno">
				<input type="text" name="Especialidad" placeholder="Especialidad">
				<input type="text" name="Consultorio" class="input_text" placeholder="Consultorio">
			</div>
			<div class="btnGroup">
				<a href="indexdoc.php" class="btnBack">Cancelar</a>
				<input type="submit" class="btnCancelar" name="guardar" value="Guardar">
			</div>
		</form>
		<img class="backg" src="https://cdn.hipwallpaper.com/m/11/1/aNEBTt.jpg" />
	</div>
</body>
</html>