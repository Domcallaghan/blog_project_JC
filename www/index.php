<!DOCTYPE html>
<html>

	<body id="body_bg">
		
		<?php include("header.php") ?>
		<div class="blog">

			<?php include_once("Process/Process_checkUser.php"); ?>
			<?php include_once("Process/Process.php"); ?>
		</div> 
		<div id="form_post_div">
			<form name="Add a post" method="POST" action="Process/Process_send_post.php">
				<input type="text" name="login_post" placeholder="Login (Obligatoire)"/><br/>
				<input type="text" name="mail_post" placeholder="Mail (facultatif)"/><br/>
				<input type="text" name="title_post" placeholder="Titre (Obligatoire)"/><br/>
				<textarea id="textarea" name="content_post" rows="5" cols="20" placeholder="Votre anecdote (Obligatoire)"></textarea><br/>
				<input type="submit" name="Send" value="Poster">
			</form>
		</div>
        <?php include_once("footer.php"); ?>

		<!-- Bootstrap Core JavaScript -->
        <script type="text/javascript" src="js/index.js"></script>
		<script src="js/bootstrap.min.js"></script>

	</body>


	
	
</html>