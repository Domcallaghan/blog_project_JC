<?php

	include_once("Class/Database.php");
	include_once("Class/Post.php");
	
	$db = new Database();
	$null = 0;
	// Take all the validate posts.
	$query =  $db->selectMessagesByStatus(1);
	$a = array();
	
	// Make a post for each row in DB.
	foreach($query as $post){
		if(is_null($post['isCommented']))
		{
			array_push($a, new Post($post['message'],$post['author'],$post['title'],$post['post_date'],$post['mail'],$post['id'], $null, $post['pros'], $post['cons']));
		}
		else
		{	
			array_push($a, new Post($post['message'],$post['author'],$post['title'],$post['post_date'],$post['mail'],$post['id'], $post['nbComment'], $post['pros'], $post['cons']));
		}
			
	}
	// Show all the messages in the index page.
	for($i = 0; $i < sizeof($a); $i++){

		echo $a[$i]->showMessage();

	}

?>