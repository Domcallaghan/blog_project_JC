<?php
	
	class Post {

		private $message;
		private $user;
		private $date;
		private $title;
		private $id;
		private $status;

		private function __construct()
		{

		}

		public function checkForm()
		{

		}		
		// Return the post in a html division
		public function showMessage()
		{
			//A mettre en forme
			return "<div class=\"message\">" + $title + "---" + $message + "---" + $user+ "</div>";
		}

		public function changeStatus($newStatus)
		{

		}

	}
?>