<?php
	
	class Post {
		
		private $_message;
		private $_user;
		private $_date;
		private $_title;
		private $_id;
		private $_status;
		private $_mail;
		
		/**
		* A post of a user.
		* @class Post
		* @param $post_message {string} The message of the post
		* @param $post_user {string} The user who has write the post
		* @param $post_title {string} The title of the message
		* @param $post_date {date} The date of the post
		* @param $post_mail {string} The mail of the user
		*/
		public function __construct($post_message, $post_user, $post_title, $post_date, $post_mail, $post_id)
		{
			// Secure the post with the htmlspecialchars.
			$this->_message = htmlspecialchars($post_message);
			$this->_user = htmlspecialchars($post_user);
			$this->_title = htmlspecialchars($post_title);
			$this->_id = 0;
			$this->_date = $post_date;

			$this->message = htmlspecialchars($post_message);
			$this->user = htmlspecialchars($post_user);
			$this->title = htmlspecialchars($post_title);
			$this->id = $post_id;
			$this->date = $post_date;

			if(empty($post_mail))
			{
				$this->_mail = "";
			}
			else
			{
				$this->_mail = htmlspecialchars($post_mail);
			}
		}

		// GETTERS
		public function getTitle()
		{
			return $this->_title;
		}
		public function getMessage()
		{
			return $this->_message;
		}
		public function getAuthor()
		{
			return $this->_user;
		}
		public function getMail()
		{
			return $this->_mail;
		}
		
		/**
		* Check the size of the message.
		* @method Post.checkMessage
		* @return {boolean} Return true if the message is valid else return false.
		*/
		public function checkMessage()
		{
			if (strlen($this->_message) <= 300) 
			{
				return true;
			}
			else 
			{
				return false;
			}
		}	
		
		/**
		* Return the post in a html division.
		* @method Post.showMessage
		* @return {string} 
		*/
		public function showMessage()
		{
			return "<div class=\"post\">".$this->_title."</br>".$this->_message."</br>".$this->_user."</br>".$this->_date."</br></br></div>";
		}
		
		/**
		* Change the status of the post.
		* @method changeStatus
		* @param $newStatus
		*/
		public function changeStatus($newStatus)
		{	
			$this->_status = $newStatus; 
		}

			public function showAdminMessage()
		{
			//A mettre en forme
			return "<div class=\"post\"><form method='POST' action='Treatment_admin_confirmation.php' >".$this->title."---".$this->message."---".$this->user. "- id - ".$this->id. " <input hidden name='id_post' value=".$this->id." /><input type='checkbox' name='valid' value='1'>  <input type='submit' name='Valider' value='Ok' /></form></div>";
		}

	}
?>