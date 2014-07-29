<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Post and comment</title>
		<link rel="stylesheet" type="text/css" href="css/index.css">
	</head>

	<body>
		
		<h1>Bienvenue sur notre blog :)</h1></br>
		<div class="blog">

			<?php 
			include("Treatment_onlyPost.php");
			include("Treatment_comment.php"); 
			?>
		</div> 

		<div id="form_com_div">
			<form name="Add a com" method="POST" action="Treatment_send_comment.php">
				<input type="text" id="login_comment" name="author_comment" placeholder="Votre nom"><br />
				<textarea id="textarea" name="content_post" rows="5" cols="20" placeholder="Votre commentaire (Allez commente ça me fait plaisir)"></textarea><br/>
				<input type="hidden" name="id_com_fk" value=<?php echo $_GET['id_post']; ?>>
				<input type="submit" name="Send" value="Commenter">
			</form>
		</div>
	</body>


	
	
</html>