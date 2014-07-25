<?php
	
	class Post {

		public $message;
		public $user;
		public $date;
		public $title;
		public $id;
		public $status;

		public function __construct($post_message, $post_user, $post_title, $post_id, $post_date)
		{

			$this->message = htmlspecialchars($post_message);
			$this->user = htmlspecialchars($post_user);
			$this->title = htmlspecialchars($post_title);
			$this->id = $post_id;
			$this->date = $post_date;
		}

		public function checkMessage($post_message)
		{
			if (strlen($post_message) <= 300) 
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
			return "<div class=\"message\">".$this->title."---".$this->message."---".$this->user."</div>";
		}

		public function changeStatus($newStatus)
		{

		}

	}
?>