<?php

	include_once("Database.php");
	include_once("Post.php");
	
	$db = new Database();
	$query =  $db->selectMessagesByStatus(1);
	
	$a = array();
	
	foreach($query as $post){
			array_push($a, new Post($post['text'],$post['author'],$post['title'],$post['date'],$post['id']));
	}
	for($i = 0; $i < sizeof($a); $i++){
		
		echo $a[$i]->showMessage();

	}

?>