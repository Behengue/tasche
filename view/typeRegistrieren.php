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
	<div class="container">
		<div class="row" style="margin-top:80px;">
			  <h3>Neuer Typ</h3>
		 <form class="form-group" action="../controller/typeRegController.php" method="POST" enctype="multipart/form-data" class="form col-lg-push-3 col-lg-6">
					<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" name="name" class="form-control" required/>
					<?php
					if(isset($_GET['err_name']) and $_GET['err_name'] == true){
				?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
				</div>
				<div class="form-group">
					<label for="bezeichnung">Typenbezeichnung (max. 255 Zeichen):</label>
					<textarea name="bezeichnung" class="form-control"/></textarea>
					<?php
					if(isset($_GET['err_bezeichnung']) and $_GET['err_bezeichnung'] == true){
					?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
				</div>
					<input type="submit" value="Einstellen" class="btn btn-success" id="submit" style="margin-top:10px;"/>
					<a href="typeVerwaltung.php"><input value="Abbrechen" class="btn btn-danger" style="margin-top:10px;"></a>
				</form>
		</div>
		</div>
  </body>
  
  <script>
$(window).load(function()
{
	
});

/*
var inputBild = document.getElementById('inputBild'),
	bild = document.getElementById('bild');
	
inputBild.addEventListener('change', function () {
	alert(this.files[0].mozFullPath);
}, false);*/
  </script>
</html>
