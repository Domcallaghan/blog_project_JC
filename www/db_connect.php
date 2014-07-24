<?php
	class Database {
	
		private function _connectDB(){
		
		}
		public function getMessagesByStatus(){
			$query = $bdd->prepare('SELECT * FROM POST WHERE status = ?');
			$query->execute(array(status));
			$return query;
		}
		
		public function setNewMessage(){
	
		}
		
		public function validateMessage(){
		
		}
		
		public function unvalidateMessage(){
		
		}
	}
?>