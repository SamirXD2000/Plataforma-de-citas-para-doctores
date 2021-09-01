<?php
	include_once 'conexion.php';

	if(isset($_POST['guardar']))
	{
		$nombre=$_POST['Nombre'];
		$apPatp=$_POST['apPatp'];
		$apMatp=$_POST['apMatp'];
		$sexo=$_POST['Sexo'];
		$fechanac=$_POST['FechaNac'];
		$foto=$_POST['Foto'];

		if(!empty($nombre) && !empty($apPatp) && !empty($apMatp) && !empty($sexo) && !empty($fechanac) && !empty($foto))
		{
			$consulta_insert=$con->prepare('INSERT INTO paciente(Nombre, apPatp, apMatp, Sexo, FechaNac, Foto) VALUES(:Nombre, :apPatp, :apMatp, :Sexo, :FechaNac, :Foto)');
			$consulta_insert->execute(array(
				':Nombre' => $nombre,
				':apPatp' => $apPatp,
				':apMatp' => $apMatp,
				':Sexo' => $sexo,
				':FechaNac' => $fechanac,
				':Foto' => $foto
			));
			header('Location: indexpac.php');
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
	<title>Nuevo Paciente</title>
	<link rel="stylesheet" type="text/css" href="Styles/update.css">
</head>
<body>
	<div class="contenedor">
		<h2>CREAR NUEVO PACIENTE</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="Nombre" class="input_text" placeholder="Nombre">
				<input type="text" name="apPatp" class="input_text" placeholder="Apellido Paterno">
				<input type="text" name="apMatp" class="input_text" placeholder="Apellido Materno">
				<input type="text" name="Sexo" class="input_text" placeholder="Sexo">
				<input type="date" name="FechaNac" class="input_text" placeholder="Fecha de nacimiento">
				<input type="text" name="Foto" class="input_text" placeholder="Foto">
			</div>
			<div class="btnGroup">
				<a href="indexpac.php" class="btnBack">Cancelar</a>
				<input type="submit" class="btnCancelar" name="guardar" value="Guardar">
			</div>
		</form>
		<img class="backg" src="https://cdn.hipwallpaper.com/m/11/1/aNEBTt.jpg" />
	</div>
</body>
</html>