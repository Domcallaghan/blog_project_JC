<?php


	include_once("Class/Database.php");
	include_once("Class/Post.php");

	$post_id_to_delete = $_POST['id_to_delete'];
	$db = new Database();

	$db->deleteComment($post_id_to_delete);
	header('Location: admin_index.php');

?>