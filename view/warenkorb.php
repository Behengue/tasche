<?php
	session_start();
	//session_destroy();
	include 'head.php';
	include 'nav_bar.php';
	include '../controller/functions.php';
?>
<body style="margin-top:60px;">
	<div class="container">
		<h1>Warenkorb</h1>
		<?php
			if(isset($_SESSION['waren']) and lengthWarenKorb($_SESSION["waren"]) > 0){
				$bdd = new PDO('mysql:host=localhost;dbname=taschen', 'root', '');
				try{
					foreach($_SESSION['waren'] as $waren){
						$query = $bdd->query('SELECT * from tasche where IDTasche = '.$waren['id']);
						if($query != false){
							$donnees = $query->fetch();
							$queryDesign = $bdd->query('SELECT * FROM design WHERE IDDesign='.$donnees['IDDesign']);
							$queryMarke = $bdd->query('SELECT * FROM marke WHERE IDMarke='.$donnees['IDMarke']);
							$design = $queryDesign->fetch();
							$marke = $queryMarke->fetch();
							?>
							<div class="col-lg-9 col-lg-push-3">
								<div class="row" id="row-product">
									<img src="<?php echo $donnees['PATH'] ?>" class="col-lg-6"/>
									<p class="col-lg-6" id="kurzbeschreibung">
										<div class="row"><br>
											<fieldset><legend>Tasche</legend>
												Name : <span ><?php echo $donnees['NameTasche']; ?></span><br>
												Preis : <span ><?php echo $donnees['Preis']; ?></span><br>
												Bezeichnung : <span><?php echo $donnees['NameTasche']; ?></span><br>
												Mengue : <span ><?php echo $donnees['Menge']; ?></span><br>
											</fieldset>
											<fieldset><legend>Marke</legend>
											<b><?php echo $marke['NameMarke']; ?></b><br>
												<?php echo $marke['BezeichnungMarke']; ?><br>
											</fieldset>
												<fieldset><legend>Design</legend>
											<b><?php echo $design['NameDesign']; ?></b><br>
												<?php echo $design['BezeichnungDesign']; ?><br>
											</fieldset>
										</div>
										<div class="row" style="margin-top:5px;">
											<form id="formKatalog" method="POST" action="../controller/sofortkaufen.php?idt=<?php echo $waren['id'];?>">
												<input type="number" name="menget" value="<?php echo $waren['menge'];?>"/>
												<input type="submit" id="kaufen" class="btn btn-success" value="Sofort kaufen">
												<a href="../controller/warenentfernen.php?idt=<?php echo $waren['id'];?>"><input id="entfern" class="btn btn-primary" value="Entfernen"></a>
											</form>
										</div>
									</p>
								</div>
							</div>
						<?php
						}
					}
			}catch(Exception $e){
				die('Fehler:' .$e->getMessage());
			}
		}else{
			?>
				<div class="col-lg-9 col-lg-push-3">
					<div class="row" id="row-product">
						<h3>Der Warenkorb ist leer</h3>
					</div>
				</div>
			<?php
		}
		?>
	</div>
</body>