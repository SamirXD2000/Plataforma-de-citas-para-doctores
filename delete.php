<?php

include_once 'conexion.php';
if(isset($_GET['id']))
{
	$id=(int) $_GET['id'];
	$delete=$con->prepare('DELETE FROM medico WHERE id=:id');
	$delete->execute(array(
		':id'=>$id
	));
	header('Location: indexdoc.php');
}

//$user_name = $_SESSION['user_name'] ?? '';

else
{
	header('Location: index.php');
}

?>