<?php
	session_start();
	include 'head.php';
	include 'nav_bar.php';
	
	$err_name = $err_vorname = $err_strasse = $err_stadt = $err_plz = $err_email = $err_username = $err_pwd = $err_rpwd = "";
	$name = $email = $vorname = $strasse = $stadt = $plz = $username = $pwd = $rpwd = "";

?>

<div id="content" style="margin-top:50px;">
<div class="container">
<style>
.error {color: #FF0000;}
</style>
	<form action="../controller/registrierenController.php" method="POST">
		<h2>Registrierungsformular</h2>
		<fieldset><legend>Kunde</legend>
			<div class="form-group">
				<label for="name">Name:</label>
				 <span class="error">* <?php echo $err_name;?></span>
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
				<label for="vorname">Vorname:</label>
				 <span class="error">* <?php echo $err_vorname;?></span>
				<input type="text" name="vorname" class="form-control" required/>
				<?php
					if(isset($_GET['err_vorname']) and $_GET['err_vorname'] == true){
				?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
			</div>
		</fieldset>
		<fieldset><legend>Adresse</legend>
			<div class="form-group">
				<label for="land">Straße und Nummer</label>
				 <span class="error">* <?php echo $err_strasse;?></span>
				<input type="text" name="strasse" class="form-control" required/>
				<?php
					if(isset($_GET['err_strasse']) and $_GET['err_strasse'] == true){
				?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
			</div>
			<div class="form-group">
				<label for="stadt">Stadt</label>
				 <span class="error">* <?php echo $err_stadt;?></span>
				<input type="text" name="stadt" class="form-control" required/>
				<?php
					if(isset($_GET['err_stadt']) and $_GET['err_stadt'] == true){
				?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
			</div>
			<div class="form-group">
				<label for="plz">Plz</label>
				 <span class="error">* <?php echo $err_plz;?></span>
				<input type="text" name="plz" class="form-control" required/>
				<?php
					if(isset($_GET['err_plz']) and $_GET['err_plz'] == true){
				?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
			</div>
			<div class="form-group">
				<label for="email">Email address:</label>
				 <span class="error">* <?php echo $err_email;?></span>
				<input type="email" name="email" class="form-control" required/>
				<?php
					if(isset($_GET['err_email']) and $_GET['err_email'] == true){
				?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
			</div>
		</fieldset>
		<fieldset><legend>Verbindngsinformationen</legend>
			<div class="form-group">
				<label for="username">Username:</label>
				 <span class="error">* <?php echo $err_username;?></span>
				<input type="text" name="username" class="form-control" required/>
				<?php
					if(isset($_GET['err_username']) and $_GET['err_username'] == true){
				?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
			</div>
			<div class="form-group">
				<label for="pwd">Password:</label>
				 <span class="error">* <?php echo $err_pwd;?></span> 
				 <p><span class="error">* Mindesten acht Zeichen.</span></p>
				<input type="password" name="pwd" class="form-control" placeholder="Mindesten acht Zeichen" required/>
				<?php
					if(isset($_GET['err_pwd']) and $_GET['err_pwd'] == true){
				?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
			</div>
			<div class="form-group">
				<label for="repwd">Password erneut angeben:</label>
				 <span class="error">* <?php echo $err_rpwd;?></span>
				<input type="password" name="repwd" class="form-control" required/>
				<?php
					if(isset($_GET['err_rpwd']) and $_GET['err_rpwd'] == true){
				?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
			</div>
		</fieldset>
		<button type="submit" class="btn btn-default">Registrieren</button>
		<button type="reset" class="btn btn-default">Abbrechen</button>
	</form> 
</div>
</div>