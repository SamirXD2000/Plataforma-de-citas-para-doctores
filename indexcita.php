<?php
	include_once 'conexion.php';
	$sentencia_select=$con->prepare('SELECT * FROM cita ORDER BY idCita DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	if(isset($_POST['btnBuscar'])) 
	{
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT * FROM cita WHERE Fecha LIKE :campo;'
			);

		$select_buscar->execute(array(
			':campo' => "%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll(); 
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Citas</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="Styles/indexcrud.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<div class="div1"> 
		<h2>CITAS</h2>
		<div class="barrabuscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Filtrar por fecha" value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btnBuscar" value="Buscar">
				<a href="insertcitas.php" class="btnNuevo">+</a>
			</form>
		</div>
		<table class="table table-dark table-borderless table-hover">
			<thead class="thead-light">
				<tr>
					<td scope="col">idCita</td>
					<td scope="col">Fecha</td>
					<td scope="col">Hora</td>
					<td scope="col">Estatus</td>
					<td scope="col">idMedico</td>
					<td scope="col">idPaciente</td>
					<td scope="col" colspan="2">Acción</td>
				</tr>
			</thead>
			
			<?php foreach ($resultado as $fila):?> 
				<tr>
					<td><?php echo $fila['idCita']; ?></td>
					<td><?php echo $fila['Fecha']; ?></td>
					<td><?php echo $fila['Hora']; ?></td>
					<td><?php echo $fila['Estatus']; ?></td>
					<td><?php echo $fila['idMedico']; ?></td>
					<td><?php echo $fila['idPaciente']; ?></td>
					<td><a href="updatecita.php?id=<?php echo $fila['idCita']; ?>" class="btnUpdate">Editar</a></td>
					<td><a href="deletecita.php?id=<?php echo $fila['idCita']; ?>" class="btnUpdate">Eliminar</a></td>
				</tr>
			<?php endforeach ?>
			

			
			<a href="index.php"><img src="images/baston.png" class="snake" ></a>
		</table>
	</div>

</body>
</html>