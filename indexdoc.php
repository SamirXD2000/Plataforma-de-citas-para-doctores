<?php
	include_once 'conexion.php';
	$sentencia_select=$con->prepare('SELECT * FROM medico ORDER BY id DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();


	if(isset($_POST['btnBuscar'])) 
	{
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT * FROM medico WHERE Nombre LIKE :campo;'
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
	<title>CRUD</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="Styles/indexcrud.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<div class="div1"> 
		<h2>DOCTORES DISPONIBLES</h2>
		<div class="barrabuscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar nombre" value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btnBuscar" value="Buscar">
				<a href="insert.php" class="btnNuevo">+</a>
			</form>
		</div>
		<table class="table table-dark table-borderless table-hover">
			<thead class="thead-light">
				<tr>
					<td scope="col">idMedico</td>
					<td scope="col">Nombre</td>
					<td scope="col">Apellido Paterno</td>
					<td scope="col">Apellido Materno</td>
					<td scope="col">Especialidad</td>
					<td scope="col">Consultorio</td>
					<td scope="col" colspan="2">Acción</td>
				</tr>
			</thead>
			
			<?php foreach ($resultado as $fila):?> 
				<tr>
					<td><?php echo $fila['id']; ?></td>
					<td><?php echo $fila['Nombre']; ?></td>
					<td><?php echo $fila['apPat']; ?></td>
					<td><?php echo $fila['apMat']; ?></td>
					<td><?php echo $fila['Especialidad']; ?></td>
					<td><?php echo $fila['Consultorio']; ?></td>
					<td><a href="update.php?id=<?php echo $fila['id']; ?>" class="btnUpdate">Editar</a></td>
					<td><a href="delete.php?id=<?php echo $fila['id']; ?>" class="btnUpdate">Eliminar</a></td>
				</tr>
			<?php endforeach ?>
			

			
			<a href="index.php"><img src="images/baston.png" class="snake" ></a>
		</table>
	</div>

</body>
</html>