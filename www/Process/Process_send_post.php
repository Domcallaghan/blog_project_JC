<?php

	include_once("../Class/Database.php");
	include_once("../Class/Post.php");
	
// GET THE POST DATA 
	$post_message = $_POST['content_post']; // Get the content message
	$post_user = $_POST['login_post']; // Get the login 
	$post_title = $_POST['title_post']; // Get the title
	$post_mail = $_POST['mail_post']; // Get the mail 
	$post_id = $_POST['id']; // Get the id
	$post_comment = 0;
    $post_pros = 0;
    $post_cons = 0;

// CHECK IF THE DATA EXISTS
	$dateToday = date('Y-m-d'); // Get the actual date 
	$db = new Database(); // Create the database object 
	$p = new Post($post_message, $post_user, $post_title, $dateToday, $post_mail, $post_id, $post_comment, $post_pros, $post_cons); // Create the post object with datas

if(empty($_POST['login_post']) || empty($_POST['content_post']) || empty($_POST['title_post'])) // Check if the required fields are empty 
{
	header('Location: ../index.php'); // forward to the index page
	echo "An error occurs"; // show an error 
}
else
{
	if($p->checkMessage()) // if message is confirmed 
	{
		$db->insertNewMessage($p->getTitle(), $p->getMessage(), $p->getAuthor(), $dateToday, $p->getMail()); // insert the post 
		header('Location: ../index.php'); // forward to the index page
	}
}
?>
