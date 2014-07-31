<?php

    /**
     * @class Database
     * Class Database
     */
    class Database {

		// Connection values for the db
        /**
         *
         * @member Database#bdd
         * @var PDO
         */
        private $bdd;
        /**
         *
         * @member Database#dbname
         * @var string
         */
        private $dbname = 'vdm_project';
        /**
         *
         * @member Database#dblogin
         * @var string
         */
        private $dblogin = 'root';
        /**
         *
         * @member Database#dbpassword
         * @var string
         */
        private	$dbpassword = '';

		// SQL QUERIES AS CONSTANTS
        const SQL_SELECT_POST_BY_ID = 'SELECT p.id, p.title, p.message, p.author, p.post_date, p.mail, p.pros, p.cons, c.fk_id_post, count(*) as nbComment FROM post AS p LEFT OUTER JOIN comment AS c ON c.fk_id_post = p.id WHERE p.id = ? GROUP BY p.title, p.message';
		const SQL_SELECT_POST_BY_STATUS = 'SELECT p.id, p.title, p.message, p.author, p.post_date, p.mail, p.pros, p.cons, c.fk_id_post as isCommented, count(*) as nbComment FROM post AS p LEFT OUTER JOIN comment AS c ON c.fk_id_post = p.id WHERE p.status = ? GROUP BY p.id, p.title, p.message';
		const SQL_INSERT_POST = 'INSERT INTO post(title, message, author, post_date, mail) VALUES(?, ?, ?, ?, ?)';
		const SQL_UPDATE_POST = 'UPDATE post SET status = ? WHERE id = ?';
		const SQL_SELECT_COM = 'SELECT * FROM comment WHERE fk_id_post = ? ';
		const SQL_SELECT_ALL_COM = 'SELECT * FROM comment';
		const SQL_DELETE_COM = 'DELETE FROM comment WHERE id = ?';
		const SQL_INSERT_COM = 'INSERT INTO comment(com_text, author, fk_id_post) VALUES(?, ?, ?)';
		const SQL_SELECT_COUNT_COM = 'SELECT COUNT(*) FROM comment WHERE fk_id_post = ?'; 
		const SQL_SELECT_USER = 'SELECT user_ip, id FROM user WHERE user_ip = ?';
		const SQL_INSERT_USER = 'INSERT INTO user(user_ip) VALUES(?)';
		const SQL_INSERT_ASSO_USER_POST = 'INSERT INTO asso_user_post(fk_id_post, fk_id_user) VALUES(?,?)';
		const SQL_UPDATE_POST_PROS = 'UPDATE post SET pros = ? WHERE id = ?';
		const SQL_UPDATE_POST_CONS = 'UPDATE post SET cons = ? WHERE id = ?';
		const SQL_SELECT_POST_PROS_CONS = 'SELECT pros, cons FROM post WHERE id = ?';
		const SQL_SELECT_USER_POST = 'SELECT fk_id_post, user_ip FROM user, asso_user_post WHERE fk_id_user = id AND user_ip = ? AND fk_id_post = ?';

        /**
         *
         * @construct
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

        /**
         *
         * @method Database#selectMessageById
         * @param $id
         * @return PDOStatement
         * @throws Exception
         */
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
         *
         * @method Database#selectMessagesByStatus
         * @param $status
         * @return PDOStatement
         * @throws Exception
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
         *
         * @method Database#insertNewMessage
         * @param $title
         * @param $message
         * @param $author
         * @param $post_date
         * @param $mail
         * @throws Exception
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
         *
         * @method Database#updateStatusById
         * @param $status
         * @param $id_message
         * @return string
         * @throws Exception
         */
        public function updateStatusById($status, $id_message){
			try 
			{
				$query = $this->bdd->prepare(Database::SQL_UPDATE_POST); // Prepare the query
				$query->execute(array($status, $id_message)); // execute the query 
				return "le statut à été mis à jour"; // return an information message
			} 
			catch(Exception $e) 
			{
				throw $e; // throw an exception
			}
		}

        /**
         *
         * @method Database#insertNewComment
         * @param $author
         * @param $message
         * @param $id_post
         * @throws Exception
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
			}
		}

        /**
         *
         * @method Database#deleteComment
         * @param $id_com
         * @throws Exception
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
			}
		}

        /**
         *
         * @method Database#selectComment
         * @param $fk_id_post
         * @return PDOStatement
         * @throws Exception
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
			}
		}

        /**
         *
         * @method Database#selectCountComments
         * @param $fk_id_post
         * @return PDOStatement
         */
        public function selectCountComments($fk_id_post)
		{
			$query = $this->bdd->prepare(Database::SQL_SELECT_COUNT_COM); // Prepare the query
			$query->execute(array($fk_id_post));
			return $query;
		}

        /**
         *
         * @method Database#selectAllComments
         * @return PDOStatement
         * @throws Exception
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
			}
		}

        /**
         *
         * @method Database#selectUserByIp
         * @param $ip
         * @return PDOStatement
         * @throws Exception
         */
        public function selectUserByIp($ip)
		{
			try
			{
				$query = $this->bdd->prepare(Database::SQL_SELECT_USER); // Prepare the query
				$query->execute(array($ip)); // execute the query
				return $query;
			}
			catch(Exception $e)
			{
				throw $e; // throw an exception
			}
		
		}

        /**
         *
         * @method Database#insertNewUser
         * @param $ip_user
         * @throws Exception
         */
        public function insertNewUser($ip_user)
		{
			try
			{
				$query = $this->bdd->prepare(Database::SQL_INSERT_USER); // Prepare the query
				$query->execute(array($ip_user));
			}
			catch(Exception $e)
			{
				throw $e; // throw an exception
			}
		}

        /**
         *
         * @method Database#selectUserAndPost
         * @param $user_adress
         * @param $post
         * @return PDOStatement
         * @throws Exception
         */
        public function selectUserAndPost($user_adress, $post)
		{
			try
			{
				$query = $this->bdd->prepare(Database::SQL_SELECT_USER_POST); // Prepare the query
				$query->execute(array($user_adress, $post));
				return $query;
			}
			catch(Exception $e)
			{
				throw $e; // throw an exception
			}
		}

        /**
         *
         * @method Database#insertNewUserAndPost
         * @param $id_user
         * @param $id_post
         * @throws Exception
         */
        public function insertNewUserAndPost($id_user, $id_post)
		{
			try
			{
				$query = $this->bdd->prepare(Database::SQL_INSERT_ASSO_USER_POST); // Prepare the query
				$query->execute(array($id_post, $id_user));
			}
			catch(Exception $e)
			{
				throw $e; // throw an exception
			}
		}

        /**
         *
         * @method Database#updatePostPros
         * @param $newValue
         * @param $id
         * @throws Exception
         */
        public function updatePostPros($newValue, $id)
		{
			try
			{
				$query = $this->bdd->prepare(Database::SQL_UPDATE_POST_PROS); // Prepare the query
				$query->execute(array($newValue, $id));
			}
			catch(Exception $e)
			{
				throw $e; // throw an exception
			}
		}

        /**
         *
         * @method Database#updatePostCons
         * @param $newValue
         * @param $id
         * @throws Exception
         */
        public function updatePostCons($newValue, $id)
		{
			try
			{
				$query = $this->bdd->prepare(Database::SQL_UPDATE_POST_CONS); // Prepare the query
				$query->execute(array($newValue, $id));
			}
			catch(Exception $e)
			{
				throw $e; // throw an exception
			}
		}

        /**
         *
         * @method Database#selectPostProsAndCons
         * @param $id_post
         * @return PDOStatement
         * @throws Exception
         */
        public function selectPostProsAndCons($id_post)
		{
			try
			{
				$query = $this->bdd->prepare(Database::SQL_SELECT_POST_PROS_CONS); // Prepare the query
				$query->execute(array($id_post));
				return $query;
			}
			catch(Exception $e)
			{
				throw $e; // throw an exception
			}
		}
	}	
?>