<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Post and comment</title>
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<script src="js/jquery-1.11.1.min.js"></script>
	</head>

	<body>
		
		<h1>Bienvenue sur notre blog :)</h1></br>
		<div class="blog">

			<?php include("Treatment.php"); ?>
			
		</div> 
		<div id="form_post_div">
			<form name="Add a post" method="POST" action="Treatment_send_post.php">
				<input type="text" name="login_post" placeholder="Login (Obligatoire)"/><br/>
				<input type="text" name="mail_post" placeholder="Mail (facultatif)"/><br/>
				<input type="text" name="title_post" placeholder="Titre (Obligatoire)"/><br/>
				<textarea id="textarea" name="content_post" rows="5" cols="20" placeholder="Votre anecdote (Obligatoire)"></textarea><br/>
				<input type="submit" name="Send" value="Poster">
			</form>
		</div>

	</body>


	
	
</html>