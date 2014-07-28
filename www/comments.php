<?php
	class Comment {
	
		private $_id;
		private $_text;
		private $_author;

		/**
		* Function to construct the comment object 
		* @param $com_text VARCHAR
		* @param $com_author VARCHAR
		* @param $com_id INT
		*/	
		public function __construct($com_text, $com_author, $com_id)
		{
			// Secure with the htmlspecialchars.
			$this->_text = htmlspecialchars($com_text);
			$this->_author = htmlspecialchars($com_author);
			$this->_id = htmlspecialchars($com_id);
		}
		// GETTERS
		public function getAuthor ()
		{
			return $this->_author;
		}
		public function getText()
		{
			return $this->_text;
		}
		public function getId()
		{
			return $this->_id;
		}
		// END GETTERS

		/**
		* Function to show comment 
		* @return {string}
		*/
		public function showMessage()
		{
			return "<div class=\"post\">".$this->_text."</br>".$this->_author."</br></br></div>";
		}
		/**
		* Function to check if a comment is correct or not
		* @return {boolean}
		*/
		public function checkMessage()
		{
			if (strlen($this->_text) <= 500) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}

?>