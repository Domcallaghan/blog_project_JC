<?php

	include_once("Class/Database.php");
	include_once("Class/Post.php");
	
	$db = new Database();
	// Take all the validate posts.
	$id_fk = $_GET['id_post'];
	$query =  $db->selectMessageById($id_fk);
	$a = array();
	
	// Make a post for each row in DB.
	foreach($query as $post){
			array_push($a, new Post($post['message'],$post['author'],$post['title'],$post['post_date'],$post['mail'],$post['id'], $post['nbComment']));
	}
	// Show all the messages in the index page.
	for($i = 0; $i < sizeof($a); $i++){

		echo $a[$i]->showOnlyMessageComment();

	}

?>