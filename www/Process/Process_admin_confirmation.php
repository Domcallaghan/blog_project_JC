<?php


	include_once("../Class/Database.php");
	include_once("../Class/Post.php");
	
	$post_status = $_POST['valid'];
	$post_id = $_POST['id_post'];

	$db = new Database();

	if ($post_status == 1) {

		 // Insert here code for update status
		$db->updateStatusById($post_status, $post_id);
		header('Location: ../admin_index.php'); // forward to the index page
	}
	else
	{
		// insert here code for update status 
		$db->updateStatusById(2, $post_id);
		header('Location: ../admin_index.php'); // forward to the index page
	}


?>