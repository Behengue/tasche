<?php
	session_start();
	include 'head.php';
	include 'nav_bar.php';
	?>
	<body>
	<div class="container">
		<div class="row" style="margin-top:80px;">
			  <h3>profil</h3>
		 <form class="form-group" action="../controller/profilController.php?=<?php echo $_SESSION['id'];?>" method="POST" class="form col-lg-push-3 col-lg-6">
					<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" name="name" class="form-control" value="<?php echo $_SESSION['namekunde']?>" required/>
					<?php
					if(isset($_GET['err_name']) and $_GET['err_name'] == true){
				?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
				</div>
				<div class="form-group">
					<label for="name">Vorname:</label>
					<input type="text" name="vorname" class="form-control" value="<?php echo $_SESSION['vorname']?>" required/>
					<?php
					if(isset($_GET['err_vorname']) and $_GET['err_vorname'] == true){
				?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
				</div>
				<div class="form-group">
					<label for="name">Strasse und Nummer:</label>
					<input type="text" name="strasse" class="form-control" value="<?php echo $_SESSION['strasse']?>" required/>
					<?php
					if(isset($_GET['err_strasse']) and $_GET['err_strasse'] == true){
				?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
				</div>
				<div class="form-group">
					<label for="name">Stadt:</label>
					<input type="text" name="stadt" class="form-control" value="<?php echo $_SESSION['stadt']?>" required/>
					<?php
					if(isset($_GET['err_stadt']) and $_GET['err_stadt'] == true){
				?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
				</div>
				<div class="form-group">
					<label for="name">Plz:</label>
					<input type="text" name="plz" class="form-control" value="<?php echo $_SESSION['plz']?>" required/>
					<?php
					if(isset($_GET['err_plz']) and $_GET['err_plz'] == true){
				?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
				</div>
				<div class="form-group">
					<label for="name">Email:</label>
					<input type="text" name="email" class="form-control" value="<?php echo $_SESSION['email']?>" required/>
					<?php
					if(isset($_GET['err_email']) and $_GET['err_email'] == true){
				?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
				</div>
				<div class="form-group">
					<label for="name">Username:</label>
					<input type="text" name="username" class="form-control" value="<?php echo $_SESSION['username']?>" required/>
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
					 <span class="error"></span> 
					 <p><span class="error"> Mindesten acht Zeichen.</span></p>
					<input type="password" name="pwd" class="form-control" placeholder="Mindesten acht Zeichen">
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
					 <span class="error"></span>
					<input type="password" name="repwd" class="form-control">
					<?php
						if(isset($_GET['err_rpwd']) and $_GET['err_rpwd'] == true){
					?>
							<span class="label label-danger">Fehler bei diesem Feld</span>
					<?php
						}
					?>
					</div>
					<label for="name">IBAN:</label>
					<input type="text" name="ibank" class="form-control" value="<?php echo $_SESSION['iban']?>" required/>
					<input type="submit" value="Aktualisieren" class="btn btn-success" id="submit" style="margin-top:10px;">
					<a href="start_seite.php"><input value="Abbrechen" class="btn btn-danger" style="margin-top:10px;"></a>
					
				</form>
		</div>
		</div>
			</body>