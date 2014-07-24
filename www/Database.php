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
		
		// Select messages by their status
		public function selectMessagesByStatus($status){
			try {
				$query = $bdd->prepare('SELECT * FROM POST WHERE status = ?');
				$query->execute(array($status));
				return $query;
			} catch(Exception $e) {
				throw $e;
			}

			$query = $bdd->prepare('SELECT * FROM POST WHERE status = ?'); // Prepare the query 
			$query->execute(array($status)); // execute the query
			return $query; // return the result
		}

		// Insert a new message in DB
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
		
		// Update the status of the message
		public function updateStatusById($status, $id_message)){
			try {
				$query = $bdd->prepare('UPDATE TABLE POST SET status = ? WHERE id = ?');
				$query->execute(array($status, $id_message));
				return "le statut à été mis à jour";
			} catch(Exception $e) {
				throw $e;
				return "Un erreur s'est produite, veuillez réessayer plus tard";
			}
		}
	}

		public function updateStatus($status, $id_message)){
			try {
				$query = $bdd->prepare('UPDATE post SET status = ? where id = ?'); // Prepare the query
				$query->execute(array($status, $id_message)); // execute the query
			} catch(Exception $e) {
				throw $e;
			}
		}
	
?>