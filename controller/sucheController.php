<?php
         session_start();
		include 'head.php';
	    include 'nav_bar.php';
		
		
		$suche = false;

        $suche = htmlspecialchars($_POST['suche']);
             if(isset($_POST['suche']) && $_POST['suche'] != NULL)
				
			 {
	
	               try{
						$query = $bdd->query("SELECT * FROM tasche WHERE NameTasche LIKE '%$suche%' ORDER BY id DESC"));
						$nb_resultats = mysql_num_rows($query);
						
						
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
						<h3>Keine ergebnisse gefunden</h3>
					</div>
				</div>
			<?php
		}
		?>