<?php

include_once 'conexion.php';
if(isset($_GET['id']))
{
	$id=(int) $_GET['id'];
	$delete=$con->prepare('DELETE FROM cita WHERE idCita=:id');
	$delete->execute(array(
		':id'=>$id
	));
	header('Location: indexcita.php');
}

//$user_name = $_SESSION['user_name'] ?? '';

else
{
	header('Location: indexcita.php');
}

?>