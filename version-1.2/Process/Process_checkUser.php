<?php

	// This file is for checking if a user exists or not and store it into the database
	include_once("Class/Database.php");

	$db = new Database(); // Create the database object 
	$ip = $_SERVER['REMOTE_ADDR']; // Get the ip address of the user

	$query = $db->selectUserByIp($ip); // Select a user by Ip

	if(!$data = $query->fetch()) // Check if the adress is already stored
	{
		$db->insertNewUser($ip); // insert the adress
	}

?>