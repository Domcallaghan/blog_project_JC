<?php

	include_once("Database.php");
	include_once("Post.php");
	
	$db = new Database();
	// Take all the validate posts.
	$query =  $db->selectMessagesByStatus(1);
	$a = array();
	
	// Make a post for each row in DB.
	foreach($query as $post){
			array_push($a, new Post($post['message'],$post['author'],$post['title'],$post['post_date'],$post['mail'],$post['id']));
	}
	// Show all the messages in the index page.
	for($i = 0; $i < sizeof($a); $i++){

		echo $a[$i]->showMessage();

	}

?>