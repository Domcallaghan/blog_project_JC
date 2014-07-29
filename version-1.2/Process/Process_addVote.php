<?php

 	// This file is for the vote functionality 
	include_once("Class/Database.php");

	$value = $_GET['value']; // The value of the vote
	$id_post = $_GET['id_post']; // The id of the post
	$address = $_SERVER['REMOTE_ADDR']; // The ip address of the user

	$db = new Database(); // Create the new database object 

	$query = $db->selectUserAndPost($address, $id_post); // Select the user and post

	if(!$query->fetch()) // If the user doesn't comment the post then he can comment 
	{
		$request = $db->selectUserByIp($address);  // Select a user by his Ip
		foreach($request as $data) {

			$request = $db->insertNewUserAndPost($data['id'], $id_post); // Insert the user and post 
		}

		$newQuery = $db->selectPostProsAndCons($id_post); // Select the values of pros and cons 
		foreach($newQuery as $donnees)
		{

			$pros = $donnees['pros']; // Get the pros values
			$cons = $donnees['cons']; // Get the cons values
		}
		if($value)
		{
			$pros++; // Add a +1 to the pros values 
			$db->updatePostPros($pros, $id_post);  // Update the pros field 
		}
		else
		{
			$cons++; // Add a +1 to the cons values 
			$db->updatePostCons($cons, $id_post); // Update the cons field
		}
		header('Location: index.php'); // Forward to the home page
	}
	else
	{	
		header('Location: index.php'); // Forward to the home page
	}

?>