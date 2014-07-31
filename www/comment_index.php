<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Post and comment</title>
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>

	<body>
		
		<?php include("header.php") ?>
		<div class="blog">

			<?php 
			include("Process/Process_onlyPost.php");
			include("Process/Process_comment.php"); 
			?>
		</div> 

		<div id="form_post_div">
			<form name="Add a com" method="POST" action="Process/Process_send_comment.php">
				<input type="text" id="login_comment" name="author_comment" placeholder="Votre nom"><br />
				<textarea id="textarea" name="content_post" rows="5" cols="20" placeholder="Votre commentaire (Allez commente ça me fait plaisir)"></textarea><br/>
				<input type="hidden" name="id_com_fk" value=<?php echo $_GET['id_post']; ?>>
				<input type="submit" name="Send" value="Commenter">
			</form>
		</div>

				<!-- jQuery Version 1.11.0 -->
		<script src="js/jquery-1.11.1.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>
	</body>


	
	
</html>