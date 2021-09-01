<?php
	include_once 'conexion.php';

	if(isset($_GET['idCita']))
	{
		echo $_GET['idCita'];

		$buscar_id=$con->prepare('SELECT * FROM cita WHERE idCita=:idCita LIMIT 1');
		$buscar_id->execute(array(
			':idCita'=>$idCita
		));
		$resultado=$buscar_id->fetch();
	}
	else
	{
		header('Location: indexcita.php');   
	}

	if(isset($_POST['guardar']))
	{
		$Fecha=$_POST['Fecha'];
		$Hora=$_POST['Hora'];
		$Estatus=$_POST['Estatus'];
		$idMedico=$_POST['idMedico'];
		$idPaciente=$_POST['idPaciente'];
		$idCita=(int) $_GET['idCita'];

		if(!empty($Fecha) && !empty($Hora) && !empty($Estatus) && !empty($idMedico) && !empty($idPaciente))
		{
			$consulta_update=$con->prepare('UPDATE cita SET Fecha=:Fecha, Hora=:Hora, Estatus=:Estatus, idMedico=:idMedico, idPaciente=:idPaciente WHERE idCita=:idCita');
			$consulta_update->execute(array(
				':Fecha' => $Fecha,
				':Hora' => $Hora,
				':Estatus' => $Estatus,
				':idMedico' => $idMedico,
				':idPaciente' => $idPaciente,
				':idCita' => $idCita
			));
			header('Location: indexcita.php');
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
				<input type="date" name="Fecha" class="input_text" placeholder="Fecha" value="<?php if($resultado) echo $resultado['Fecha']; ?>">
				<input type="date" name="Hora" class="input_text" placeholder="Hora" value="<?php if($resultado) echo $resultado['Hora']; ?>">
				<input type="text" name="Estatus" class="input_text" placeholder="Estatus" value="<?php if($resultado) echo $resultado['Estatus']; ?>">
				<input type="text" name="idMedico" placeholder="idMedico" value="<?php if($resultado) echo $resultado['idMedico']; ?>">
				<input type="text" name="idPaciente" class="input_text" placeholder="idPaciente" value="<?php if($resultado) echo $resultado['idPaciente']; ?>">

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