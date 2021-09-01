<?php
	include_once 'conexion.php';

	if(isset($_GET['id']))
	{
		echo $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM paciente WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}
	else
	{
		header('Location: indexpac.php');   
	}

	if(isset($_POST['guardar']))
	{
		$Nombre=$_POST['Nombre'];
		$apPatp=$_POST['apPatp'];
		$apMatp=$_POST['apMatp'];
		$Sexo=$_POST['Sexo'];
		$FechaNac=$_POST['FechaNac'];
		$Foto=$_POST['Foto'];
		$id=(int) $_GET['id'];

		if(!empty($nombre) && !empty($apPatp) && !empty($apMatp) && !empty($Sexo) && !empty($FechaNac))
		{
			$consulta_update=$con->prepare('UPDATE paciente SET Nombre=:Nombre, apPat=:apPatp, apMat=:apMatp, Sexo=:Sexo, FechaNac=:FechaNac, Foto=:Foto WHERE id=:id');
			$consulta_update->execute(array(
				':Nombre' => $Nombre,
				':apPatp' => $apPatp,
				':apMatp' => $apMatp,
				':Sexo' => $Sexo,
				':Fechanac' => $FechaNac,
				':Foto' => $Foto,
				':id' => $id
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
	<title>Editar Paciente</title>
	<link rel="stylesheet" type="text/css" href="Styles/update.css">
</head>
<body>
	<div class="contenedor">
		<h2>ACTUALIZAR DATOS DEL PACIENTE</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="Nombre" class="input_text" placeholder="Nombre" value="<?php if($resultado) echo $resultado['Nombre']; ?>">
				<input type="text" name="apPatp" class="input_text" placeholder="Apellido Paterno" value="<?php if($resultado) echo $resultado['apPat']; ?>">
				<input type="text" name="apMatp" class="input_text" placeholder="Apellido Materno" value="<?php if($resultado) echo $resultado['apMat']; ?>">
				<input type="text" name="Sexo" placeholder="Sexo" value="<?php if($resultado) echo $resultado['Sexo']; ?>">
				<input type="date" name="FechaNac" class="input_text" placeholder="Fecha de nacimiento" value="<?php if($resultado) echo $resultado['FechaNac']; ?>">
				<input type="text" name="Foto" class="input_text" placeholder="Foto" value="<?php if($resultado) echo $resultado['Foto']; ?>">

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