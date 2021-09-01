<?php

include_once 'conexion.php';
if(isset($_GET['id']))
{
	$id=(int) $_GET['id'];
	$delete=$con->prepare('DELETE FROM paciente WHERE id=:id');
	$delete->execute(array(
		':id'=>$id
	));
	header('Location: indexpac.php');
}

//$user_name = $_SESSION['user_name'] ?? '';

else
{
	header('Location: indexpac.php');
}

?>