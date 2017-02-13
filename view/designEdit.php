	<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="de">
  <?php
	include 'head.php';
	include 'nav_bar.php';
  ?>
	<body>
	<?php
		$bdd = getBDD();
      $designn = $bdd->query('SELECT * FROM design WHERE IDDesign='.$_GET['idd']);
      $design = $designn->fetch();
	?>
	<div class="container">
		<div class="row" style="margin-top:80px;">
			  <h3>Tasche</h3>
		 <form class="form-group" action="../controller/designEditController.php?idd=<?php echo $design['IDDesign'];?>" method="POST" enctype="multipart/form-data" class="form col-lg-push-3 col-lg-6">
					<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" name="name" class="form-control" value="<?php echo $design['NameDesign'];?>" required/>
					<?php
					if(isset($_GET['err_name']) and $_GET['err_name'] == true){
				?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
				</div>
				<div class="form-group">
					<label for="bezeichnung">Taschenbeschreibung (max. 255 Zeichen):</label>
					<textarea name="bezeichnung" class="form-control"><?php echo $design['BezeichnungDesign'];?></textarea>
					<?php
					if(isset($_GET['err_bezeichnung']) and $_GET['err_bezeichnung'] == true){
					?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
				</div>
					<input type="submit" value="Einstellen" class="btn btn-success" id="submit" style="margin-top:10px;"/>
					<a href="designVerwaltung.php"><input value="Abbrechen" class="btn btn-danger" style="margin-top:10px;"></a>
					
				</form>
		</div>
		</div>
  </body>
  
  <script>
$(window).load(function()
{
	
});
  </script>
</html>
