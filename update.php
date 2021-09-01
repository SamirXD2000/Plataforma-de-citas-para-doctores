<?php
	include_once 'conexion.php';

	if(isset($_GET['id']))
	{ 
		echo $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM medico WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}
	else
	{
		header('Location: index.php');   
	}

	if(isset($_POST['guardar']))
	{
		$nombre=$_POST['Nombre'];
		$apPat=$_POST['apPat'];
		$apMat=$_POST['apMat'];
		$especialidad=$_POST['Especialidad'];
		$consultorio=$_POST['Consultorio'];
		$id=(int) $_GET['id'];

		if(!empty($nombre) && !empty($apPat) && !empty($apMat) && !empty($especialidad) && !empty($consultorio))
		{
			$consulta_update=$con->prepare('UPDATE medico SET Nombre=:nombre, apPat=:apPat, apMat=:apMat, Especialidad=:especialidad, Consultorio=:consultorio WHERE id=:id');
			$consulta_update->execute(array(
				':nombre' => $nombre,
				':apPat' => $apPat,
				':apMat' => $apMat,
				':especialidad' => $especialidad,
				':consultorio' => $consultorio,
				':id' => $id
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
	<title>Editar Doctor</title>
	<link rel="stylesheet" type="text/css" href="Styles/update.css">
</head>
<body>
	<div class="contenedor">
		<h2>ACTUALIZAR DATOS DEL MEDICO</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="Nombre" class="input_text" placeholder="Nombre" value="<?php if($resultado) echo $resultado['Nombre']; ?>">
				<input type="text" name="apPat" class="input_text" placeholder="Apellido Paterno" value="<?php if($resultado) echo $resultado['apPat']; ?>">
				<input type="text" name="apMat" class="input_text" placeholder="Apellido Materno" value="<?php if($resultado) echo $resultado['apMat']; ?>">
				<input type="text" name="Especialidad" placeholder="Especialidad" value="<?php if($resultado) echo $resultado['Especialidad']; ?>">
				<input type="text" name="Consultorio" class="input_text" placeholder="Consultorio" value="<?php if($resultado) echo $resultado['Consultorio']; ?>">
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