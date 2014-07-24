<?php
	class Database {
	
		private function _connectDB(){
		
		}
		public function selectMessagesByStatus($status){
			$query = $bdd->prepare('SELECT * FROM POST WHERE status = ?');
			$query->execute(array($status));
			$return query;
		}
		
		public function insertNewMessage(){
	
		}
		
		public function updateStatus($status)){
			$query = $bdd->prepare('ALTER TABLE POST where id = ?');
		}

	}
?>