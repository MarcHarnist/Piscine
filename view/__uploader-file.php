<article>
	<header class="row bg-light p-3">
		<h2 class="row ml-0 text-muted">Uploader file</h2>
	</header>	

	<div class="col-sm-12">
  <form enctype="multipart/form-data" method="post">    <p>Upload your file</p>    <input type="file" name="uploaded_file"></input><br />    <input type="submit" value="Upload"></input>  </form>	  <?php		if($message != ""){			?>			<p><?=$message?></p> 			<?		}		?>		<p><a href="index.php?page=__explorer-backups-secret">Voir le répertoire</a></p>
	</div></article>