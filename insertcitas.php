<?php
	include_once 'conexion.php';

	if(isset($_POST['guardar']))
	{
		$Fecha=$_POST['Fecha'];
		$Hora=$_POST['Hora'];
		$Estatus=$_POST['Estatus'];
		$idMedico=$_POST['idMedico'];
		$idPaciente=$_POST['idPaciente'];

		if(!empty($Fecha) && !empty($Hora) && !empty($Estatus) && !empty($idMedico) && !empty($idPaciente))
		{
			$consulta_insert=$con->prepare('INSERT INTO cita(Fecha, Hora, Estatus, idMedico, idPaciente) VALUES(:Fecha, :Hora, :Estatus, :idMedico, :idPaciente)');
			$consulta_insert->execute(array(
				':Fecha' => $Fecha,
				':Hora' => $Hora,
				':Estatus' => $Estatus,
				':idMedico' => $idMedico,
				':idPaciente' => $idPaciente
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
	<title>Nueva Cita</title>
	<link rel="stylesheet" type="text/css" href="Styles/update.css">
</head>
<body>
	<div class="contenedor">
		<h2>CREAR NUEVA CITA</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="date" name="Fecha" class="input_text" placeholder="Fecha">
				<input type="date" name="Hora" class="input_text" placeholder="Hora">
				<input type="text" name="Estatus" class="input_text" placeholder="Estatus">
				<input type="text" name="idMedico" placeholder="idMedico">
				<input type="text" name="idPaciente" class="input_text" placeholder="idPaciente">
			</div>
			<div class="btnGroup">
				<a href="indexcita.php" class="btnBack">Cancelar</a>
				<input type="submit" class="btnCancelar" name="guardar" value="Guardar">
			</div>
		</form>
		<img class="backg" src="https://cdn.hipwallpaper.com/m/11/1/aNEBTt.jpg" />
	</div>
</body>
</html>