<?php
	
	class Post {

		public $message;
		public $user;
		public $date;
		public $title;
		public $id;
		public $status;
		private $mail;

		public function __construct($post_message, $post_user, $post_title, $post_date, $post_mail)
		{

			$this->message = htmlspecialchars($post_message);
			$this->user = htmlspecialchars($post_user);
			$this->title = htmlspecialchars($post_title);
			$this->id = 0;
			$this->date = $post_date;

			if(empty($post_mail))
			{
				$this->mail = "";
			}
			else
			{
				$this->mail = htmlspecialchars($post_mail);
			}
		}

		// GETTERS
		public function getTitle()
		{
			return $this->title;
		}
		public function getMessage()
		{
			return $this->message;
		}
		public function getAuthor()
		{
			return $this->user;
		}
		public function getMail()
		{
			return $this->mail;
		}
		// END GETTERS

		public function checkMessage()
		{
			if (strlen($this->message) <= 300) 
			{
				return true;
			}
			else 
			{
				return false;
			}
		}		
		// Return the post in a html division
		public function showMessage()
		{
			//A mettre en forme
			return "<div class=\"post\">".$this->title."---".$this->message."---".$this->user."</div>";
		}

		public function changeStatus($newStatus)
		{
			$this->status = $newStatus; // change the status

		}
	}
?>