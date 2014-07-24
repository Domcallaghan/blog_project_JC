<?php
	class Database {
		
		/**
		* Constructor function to initialize the pdo connection line
		*/
		private function __construct(){
			
			// Connection values for the db
			private $dbname = 'vdm_project';
			private $dblogin = 'root';
			private $dbpassword = '';

			try
			{
			    $bdd = new PDO('mysql:host=localhost;dbname='.$dbname.'', $dblogin, $dbpassword); // The PDO connection line 
			}
			catch(Exception $e) // throw an error if a problem is alive
			{
			    echo "Impossible d'accéder à la base de données"; // add a error message in the page
			}

		}
		
		/**
		* Function to select messages by their status 
		* $status INT param
		*/
		public function selectMessagesByStatus($status){
			try 
			{
				$query = $bdd->prepare('SELECT * FROM POST WHERE status = ?'); // Prepare the query 
				$query->execute(array($status)); // execute the query 
				return $query; // return the result of teh query
			} 
			catch(Exception $e) {
				throw $e; // throw an exception
			}

			$query = $bdd->prepare('SELECT * FROM POST WHERE status = ?'); // Prepare the query 
			$query->execute(array($status)); // execute the query
			return $query; // return the result
		}

		/**
		* Function to insert a new message in the database 
		* $title VARCHAR param
		* $message VARCHAR (300) param
		* $author VARCHAR param
		* $post_date DATE param
		* $mail VARCHAR param
		*/
		public function insertNewMessage($title, $message, $author, $post_date, $mail){
			try {
				if(empty($mail)) // Check if the mail is empty
				{
					$query = $bdd->prepare('INSERT INTO post(title, message, author, post_date) VALUES(?, ?, ?, ?)'); // Prepare the without mail query
					$query->execute(array($title, $message, $author, $post_date)); // execute the query

				}
				else // If the mail is here
				{
					$query = $bdd->prepare('INSERT INTO post(title, message, author, post_date, mail) VALUES(?, ?, ?, ?, ?)'); // Prepare the with mail query
					$query->execute(array($title, $message, $author, $post_date, $mail)); // execute the cubrid_query(query)
				}
			} catch(Exception $e) {
				throw $e;
			}
		}
		
		/**
		* Function to update the status of a message by his status
		* $status INT param
		* $id_message INT param
		*/
		public function updateStatusById($status, $id_message)){
			try 
			{
				$query = $bdd->prepare('UPDATE TABLE POST SET status = ? WHERE id = ?'); // Prepare the query 
				$query->execute(array($status, $id_message)); // execute the query 
				return "le statut à été mis à jour"; // return an information message
			} 
			catch(Exception $e) {
				throw $e; // throw an exception
				return "Un erreur s'est produite, veuillez réessayer plus tard"; // return an information message
			}
		}
	}	
?>