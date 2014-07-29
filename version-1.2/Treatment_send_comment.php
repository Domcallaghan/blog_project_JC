<?php

	include_once("Database.php");
	include_once("comments.php");
	
// GET THE POST DATA
	$post_author = $_POST['author_comment'];
	$post_content = $_POST['content_post'];
	$post_id_com = $_POST['id_com_fk'];

	$db = new Database(); // Create the database object 
	$c = new Comment($post_content, $post_author, $post_id_com); // Create the new comment object 

if(empty($_POST['author_comment']) || empty($_POST['content_post'])) // Check if the required fields are empty 
{
	header('Location: index.php'); // forward to the index page
	echo "An error occurs"; // show an error 
}
else
{
	if($c->checkMessage()) // if message is confirmed 
	{
		$db->insertNewComment($c->getText(), $c->getAuthor(), $c->getId()); // Insert the new comment
		header('Location: index.php'); // forward to the index page
	}
}
?>
