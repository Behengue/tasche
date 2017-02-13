<?php
?>

<div class="navbar navbar-default navbar-fixed-top" id="navbar">
          <div class="container-fluid" id="containerNavBar">
            <div class="navbar-header">
              <a class="navbar-brand" href="index.php">K&oumlnigsreichTasche</a>
              <span><img id="logo" src="../media/500_F_43284985_CDLQaeuPVUe2j10Zlw8gMfoDH64dpEis.jpg"/></span>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a href="/tasche/view/">Home</a></li>
			  <?php
			  	try{
					$bdd = getBDD();
							$query = $bdd->query('SELECT * FROM kategorie');
			while($donnees = $query->fetch()){
			?>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo mb_convert_encoding($donnees['NameKategorie'], 'UTF-8'); ?><span class="caret"></span></a>
                <div class="dropdown-menu unter_kategorie">
                  <table class="table">
                    <thead>
                      <tr class="info">
                        <th>Marke</th>
                        <th>Design</th>
                        <th>Type</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
						try{
							//Calcul de la longueur de toutes les requetes
							$queryMarke = $bdd->query('SELECT COUNT(*) FROM marke m, tasche t, hatkategorie hk, kategorie k WHERE
							m.IDMarke=t.IDMarke AND t.IDTasche=hk.IDTasche AND hk.IDKategorie='.$donnees['IDKategorie'].' GROUP BY NameMarke');
							$queryType = $bdd->query('SELECT COUNT(*) FROM tasche t, hatkategorie hk, kategorie k, type ty, hattype hty WHERE
							ty.IDType=hty.IDType AND hty.IDTasche=t.IDTasche AND t.IDTasche=hk.IDTasche AND hk.IDKategorie='.$donnees['IDKategorie'].' GROUP BY NameType');
							$queryDesign = $bdd->query('SELECT COUNT(*) FROM tasche t, hatkategorie hk, kategorie k, design d WHERE
							d.IDDesign=t.IDDesign AND t.IDTasche=hk.IDTasche AND hk.IDKategorie='.$donnees['IDKategorie'].' GROUP BY NameDesign');
							$lgMarke = $queryMarke->fetch()[0];
							$lgDesign = $queryDesign->fetch()[0];
							$lgType = $queryType->fetch()[0];
							
							//Extraction des donnees des requestes
							$queryMarke = $bdd->query('SELECT * FROM marke m, tasche t, hatkategorie hk, kategorie k WHERE
							m.IDMarke=t.IDMarke AND t.IDTasche=hk.IDTasche AND hk.IDKategorie='.$donnees['IDKategorie'].' GROUP BY NameMarke');
							$queryType = $bdd->query('SELECT * FROM tasche t, hatkategorie hk, kategorie k, type ty, hattype hty WHERE
							ty.IDType=hty.IDType AND hty.IDTasche=t.IDTasche AND t.IDTasche=hk.IDTasche AND hk.IDKategorie='.$donnees['IDKategorie'].' GROUP BY NameType');
							$queryDesign = $bdd->query('SELECT * FROM tasche t, hatkategorie hk, kategorie k, design d WHERE
							d.IDDesign=t.IDDesign AND t.IDTasche=hk.IDTasche AND hk.IDKategorie='.$donnees['IDKategorie'].' GROUP BY NameDesign');
							if($lgMarke > $lgDesign)
								$lgMax = $lgMarke;
							else
								$lgMax = $lgDesign;
							
							if($lgMax < $lgType)
								$lgMax = $lgType;
							
							for($i = 0; $i < $lgMax; $i++){
								$donneesMarke = $queryMarke->fetch();
								$donneesDesign = $queryDesign->fetch();
								$donneesType = $queryType->fetch();
					?>
                      <tr>
                        <td><a href="start_seite.php?idk=<?php echo $donnees['IDKategorie'];?>&idm=<?php echo $donneesMarke['IDMarke'];?>">
							<?php echo $donneesMarke['NameMarke'] ?></a></td>
                        <td><a href="start_seite.php?idk=<?php echo $donnees['IDKategorie'];?>&idd=<?php echo $donneesDesign['IDDesign'];?>">
							<?php echo $donneesDesign['NameDesign'] ?></a></td>
                        <td><a href="start_seite.php?idk=<?php echo $donnees['IDKategorie'];?>&idty=<?php echo $donneesType['IDType'];?>">
                     <?php echo $donneesType['NameType'] ?></a></td>
                      </tr>
					  <?php
							}
						}catch(Exception $e){
							die('Fehler:' .$e->getMessage());
						}
					?>
                    </tbody>
                  </table>
                </div>
              </li>
              
              <?php
			}
			}catch(Exception $e){
				die('Fehler:' .$e->getMessage());
			}
			?>
			<?php
				if (isset($_SESSION['id']) and isset($_SESSION['type']) and $_SESSION['type'] == 1){
			?>
				<li class="dropdown">
        			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Verwaltung<span class="caret"></span></a>
        			<ul class="dropdown-menu">
        			<li class="dropdown-submenu">
						<a tabindex="-1" href="taschenVerwaltung.php">Taschen</a>
					</li>
        			<li class="dropdown-submenu">
						<a tabindex="-1" href="kategorieVerwaltung.php">Kategorie</a>
					</li>
        			<li class="dropdown-submenu">
						<a tabindex="-1" href="designVerwaltung.php">Design</a>
					</li>
        			<li class="dropdown-submenu">
						<a tabindex="-1" href="#">Type</a>
					</li>
					</ul>
      		</li>
			<?php
				}
			?>
              <li>
                <form class="navbar-form" action="suche.php" method="POST">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Suche" name="suche">
                  </div>
                  <button type="submit" class="btn btn-default">Suchen</button>
                </form>
              </li>
              <li>
                
				<?php
					if(!isset($_SESSION['id'])){
				?>
					<div class="btn-group" style="margin-top:8px;">
                  <button type="button" class="btn btn-primary">Konto</button>
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="anmelden.php"><span class="glyphicon glyphicon-log-in"> Anmelden</span></a></li>
                    <li><a href="registrieren.php"><span class="glyphicon glyphicon-off"> Registrieren</span></a></li>
                  </ul>
                </div>
				<?php
					}else{
						?><div class="btn-group" style="margin-top:8px;">
                  <button type="button" class="btn btn-primary"><?php echo ucfirst($_SESSION['username']);?> </button>
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="profil.php"><span class="glyphicon glyphicon-user"> Profil</span></a></li>
                    <li><a href="./../controller/abmelden.php"><span class="glyphicon glyphicon-log-out"> Abmelden</span></a></li>
                  </ul>
                </div>
						
						<?php
					}
				?>
              </li>
			  <li><a href="warenkorb.php"><span class="glyphicon glyphicon-shopping-cart">Warenkorb</span><span class="badge"><?php if(isset($_SESSION['waren'])) echo sizeof($_SESSION['waren']); else echo 0;?></span></a></li>
            </ul>
          </div>
        </div>