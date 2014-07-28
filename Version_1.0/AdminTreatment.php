<?php

	include_once("Database.php");
	include_once("Post.php");
	
	$db = new Database();
	$query =  $db->selectMessagesByStatus(0);
	
	$a = array();
	
	foreach($query as $post){
			array_push($a, new Post($post['message'],$post['author'],$post['title'],$post['post_date'],$post['mail'],$post['id']));
	}
	for($i = 0; $i < sizeof($a); $i++){
		
		echo $a[$i]->showAdminMessage();
	}

?>