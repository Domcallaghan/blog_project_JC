<?php
	class Database {

		// Connection values for the db
		private $bdd;
		private $dbname = 'vdm_project';
		private $dblogin = 'root';
		private	$dbpassword = '';

		// SQL QUERIES AS CONSTANTS
	//	const SQL_SELECT_POST_BY_ID = 'SELECT * FROM post WHERE id = ?';
		const SQL_SELECT_POST_BY_ID = 'SELECT p.id, p.title, p.message, p.author, p.post_date, p.mail, c.fk_id_post, count(*) as nbComment FROM post AS p LEFT OUTER JOIN comment AS c ON c.fk_id_post = p.id WHERE p.id = ? GROUP BY p.title, p.message';
	//  const SQL_SELECT_POST_BY_STATUS = 'SELECT * FROM post WHERE status = ? ORDER BY post_date DESC';
		const SQL_SELECT_POST_BY_STATUS = 'SELECT p.id, p.title, p.message, p.author, p.post_date, p.mail, c.fk_id_post as isCommented, count(*) as nbComment FROM post AS p LEFT OUTER JOIN comment AS c ON c.fk_id_post = p.id WHERE p.status = ? GROUP BY p.id, p.title, p.message';
		const SQL_INSERT_POST = 'INSERT INTO post(title, message, author, post_date, mail) VALUES(?, ?, ?, ?, ?)';
		const SQL_UDPATE_POST = 'UPDATE post SET status = ? WHERE id = ?';
		const SQL_SELECT_COM = 'SELECT * FROM comment WHERE fk_id_post = ? ';
		const SQL_SELECT_ALL_COM = 'SELECT * FROM comment';
		const SQL_DELETE_COM = 'DELETE FROM comment WHERE id = ?';
		const SQL_INSERT_COM = 'INSERT INTO comment(com_text, author, fk_id_post) VALUES(?, ?, ?)';
		const SQL_SELECT_COUNT_COM = 'SELECT COUNT(*) FROM comment WHERE fk_id_post = ?'; 
		

		/**
		* Constructor function to initialize the pdo connection line
		* @constructor 
		*/
		public function __construct(){

			try
			{
			    $this->bdd = new PDO('mysql:host=localhost;dbname='.$this->dbname.'', $this->dblogin, $this->dbpassword); // The PDO connection line 
			}
			catch(Exception $e) // catch the exception
			{
				throw $e; // throw an exception
			}
		}

		public function selectMessageById($id){

			try
			{
				$query = $this->bdd->prepare(Database::SQL_SELECT_POST_BY_ID); // Prepare the query 
				$query->execute(array($id)); // execute the query 
				return $query; // return the result of teh query
			}
			catch(Exception $e) // catch the exception
			{
				throw $e; // throw an exception
			}
		}
		/**
		* Function to select messages by their status 
		* @param $status INT 
		* @return {Query}
		*/
		public function selectMessagesByStatus($status){

			try 
			{
				$query = $this->bdd->prepare(Database::SQL_SELECT_POST_BY_STATUS); // Prepare the query 
				$query->execute(array($status)); // execute the query 
				return $query; // return the result of teh query
			} 
			catch(Exception $e) {
				throw $e; // throw an exception
			}
		}

		/**
		* Function to insert a new message in the database 
		* @param $title VARCHAR
		* @param $message VARCHAR (300)
		* @param $author VARCHAR
		* @param $post_date DATE
		* @param $mail VARCHAR
		*/
		public function insertNewMessage($title, $message, $author, $post_date, $mail){

			try 
			{ 
				$query = $this->bdd->prepare(Database::SQL_INSERT_POST); // Prepare the query
				$query->execute(array($title, $message, $author, $post_date, $mail)); // execute the cubrid_query(query)
			}
			catch(Exception $e) 
			{
				throw $e;
			}
		}
		
		/**
		* Function to update the status of a message by his status
		* @param $status INT 
		* @param $id_message INT 
		* @return {string}
		*/
		public function updateStatusById($status, $id_message){
			try 
			{
				$query = $this->bdd->prepare(Database::SQL_UDPATE_POST); // Prepare the query 
				$query->execute(array($status, $id_message)); // execute the query 
				return "le statut à été mis à jour"; // return an information message
			} 
			catch(Exception $e) 
			{
				throw $e; // throw an exception
				return "Un erreur s'est produite, veuillez réessayer plus tard"; // return an information message
			}
		}

		/**
		* Function to insert a new comment to a post 
		* @param $author VARCHAR 
		* @param $message VARCHAR (500) 
		* @param $id_post INT 
		* @return {string}
		*/
		public function insertNewComment($author, $message, $id_post)
		{
			try
			{
				$query = $this->bdd->prepare(Database::SQL_INSERT_COM); // Prepare the query 
				$query->execute(array($message, $author, $id_post)); // execute the query
			}
			catch(Exception $e)
			{
				throw $e; // throw an exception
				return "Un erreur s'est produite, veuillez réessayer plus tard"; // return an information message
			}
		}

		/**
		* Function to delete a existing comment
		* @param $id_com INT 
		* @return {string}
		*/
		public function deleteComment($id_com)
		{
			try
			{
				$query = $this->bdd->prepare(Database::SQL_DELETE_COM); // Prepare the query
				$query->execute(array($id_com)); // execute the query
			}
			catch(Exception $e)
			{
				throw $e; // throw an exception
				return "Un erreur s'est produite, veuillez réessayer plus tard"; // return an information message
			}
		}

		/**
		* Function to select all the comments
		* @return {Query}
		*/
		public function selectComment($fk_id_post)
		{
			try
			{
				$query = $this->bdd->prepare(Database::SQL_SELECT_COM); // Prepare the query 
				$query->execute(array($fk_id_post)); // execute the query  
				return $query; // return the result of the query 
			}
			catch(Exception $e)
			{
				throw $e; // throw an exception
				return "Un erreur s'est produite, veuillez réessayer plus tard"; // return an information message
			}
		}
		public function selectCountComments($fk_id_post)
		{
			$query = $this->bdd->prepare(Database::SQl_SELECT_COUNT_COM); // Prepare the query
			$query->execute(array($fk_id_post));
			return $query;
		}
		/**
		* Function to select all the comments
		* @return {Query}
		*/
		public function selectAllComments()
		{
			try
			{
				$request = $this->bdd->prepare(Database::SQL_SELECT_ALL_COM); // Prepare the query 
				$request->execute(); // execute the query  
				return $request; // return the result of the query 
			}
			catch(Exception $e)
			{
				throw $e; // throw an exception
				return "Un erreur s'est produite, veuillez réessayer plus tard"; // return an information message
			}
		}
	}	
?>