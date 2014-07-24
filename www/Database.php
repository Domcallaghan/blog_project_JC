<?php
	class Database {
		

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
			    die('Erreur : '.$e->getMessage());
			    echo "Impossible d'accéder à la base de données"; // add a error message in the page
			}

		}

		public function selectMessagesByStatus($status){

			$query = $bdd->prepare('SELECT * FROM POST WHERE status = ?');
			$query->execute(array($status));
			return $query;
		}

		
		public function insertNewMessage($title, $message, $author, $post_date, $mail){

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
			
		}
		
		public function updateStatus($status, $id_message)){
	
			$query = $bdd->prepare('ALTER TABLE POST where id = ?');
		}
	}
?>