<?php

	include_once("Class/Database.php");
	include_once("Class/Post.php");
	include_once("Class/Comments.php");
	
	$db = new Database();
	// Take all the validate posts.
	$id_fk = $_GET['id_post'];
	$query =  $db->selectComment($id_fk);
	$a = array();
	
	// Make a comment for each row in DB.
	foreach($query as $comment){
			array_push($a, new Comment($comment['com_text'], $comment['author'], $comment['fk_id_post']));
	}
	// Show all the messages in the index page.
	for($i = 0; $i < sizeof($a); $i++){

		echo $a[$i]->showMessage();

	}

?>