<?php
/*
	include_once("Database.php");
	include_once("Post.php");

	$query = Database.selectComment();
*/ 

	class Commentaries() {
	
		private $_id;
		private $_text;
		private $_author;

		
	public function __construct($com_text, $com_author, $com_id)
		{
			// Secure with the htmlspecialchars.
			$this->_text = htmlspecialchars($com_text);
			$this->_author = htmlspecialchars($com_author);
			$this->_id = htmlspecialchars($com_id);
			
		public function showMessage()
		{
			return "<div class=\"post\">".$this->_text."</br>".$this->_author."</br></br></div>";
		}
	
	}

?>