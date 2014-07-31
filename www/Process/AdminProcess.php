<?php

	include_once("Class/Database.php");
	include_once("Class/Post.php");
	include_once("Class/Comments.php");

	$db = new Database();
	$query =  $db->selectMessagesByStatus(0);
	
	$a = array();
	$b = array();

	foreach($query as $post){
			array_push($a, new Post($post['message'],$post['author'],$post['title'],$post['post_date'],$post['mail'],$post['id'],$post['nbComment'], $post['pros'], $post['cons']));
	}
	for($i = 0; $i < sizeof($a); $i++){
		
		echo $a[$i]->showAdminMessage();
	}

	$request = $db->selectAllComments();

	foreach($request as $comments)
	{
		array_push($b, new Comment($comments['author'], $comments['com_text'],$comments['id']));
	}
	for ($j = 0; $j < sizeof($b); $j++) { 

		echo $b[$j]->showAdminMessage();
	}
	// INCLUDE THE COMMENTS WE CAN DELETED 
?>