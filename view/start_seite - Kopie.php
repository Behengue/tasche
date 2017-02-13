<!DOCTYPE html>
<html lang="en">
  <head>
    <title>KönigsreichTasche</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
  <?php
  	$bdd = new PDO('mysql:host=localhost;dbname=taschen', 'root', '');
	
	?>
    <div class="container" id="body">
      <div>
        <footer class="navbar navbar-default navbar-fixed-bottom">
          <div class="container">
            <ul class="nav navbar-nav">
              <li><a href="#">Projekt Datenbank</a></li>
            </ul>
          </div>
        </footer>
        <div class="navbar navbar-default navbar-fixed-top" id="navbar">
          <div class="container">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">KönigsreichTasche</a>
              <span><img id="logo" src="../media/500_F_43284985_CDLQaeuPVUe2j10Zlw8gMfoDH64dpEis.jpg"/></span>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
			  <?php
			  			try{
							$query = $bdd->query('SELECT * FROM kategorie');
			while($donnees = $query->fetch()){
			?>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $donnees['Name'] ?><span class="caret"></span></a>
                <div class="dropdown-menu unter_kategorie">
                  <table class="table">
                    <thead>
                      <tr class="info">
                        <th>Brand</th>
                        <th>Design</th>
                        <th>Type</th>
                      </tr>
                    </thead>
                    <?php
						try{
							$query = $bdd->query('SELECT * FROM brand');
							?>
							<tbody>
							<?php
								while($donnees = $query->fetch()){
							?>
									<tr>
										<td><?php echo $donnees['name'] ?></td>
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
              <li>
                <form class="navbar-form">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Suche">
                  </div>
                  <button type="submit" class="btn btn-default">Suchen</button>
                </form>
              </li>
              <li>
                <div class="btn-group" style="margin-top:8px;">
                  <button type="button" class="btn btn-primary">Angemeldet als Übungsgruppe</button>
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#"><span class="glyphicon glyphicon-user"> Profil</span></a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-out"> Abmelden</span></a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"> Warenkorb</span></a></li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="../media/img_chania.jpg" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <h1 class="text-center">Königreich<img id="logo-jumbotron" src="../media/500_F_43284985_CDLQaeuPVUe2j10Zlw8gMfoDH64dpEis.jpg"/>Tasche</h1>
          <p class="text-center">Kaufen Sie angenehm und billig die schönsten Taschen weltweit!!!</p>
        </div>
      </div>
      <div class="item">
        <img src="../media/img_chania.jpg" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <h1 class="text-center">Königreich<img id="logo-jumbotron" src="../media/500_F_43284985_CDLQaeuPVUe2j10Zlw8gMfoDH64dpEis.jpg"/>Tasche</h1>
          <p class="text-center">Kaufen Sie angenehm und billig die schönsten Taschen weltweit!!!</p>
        </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
      </div>
      <div class="container" id="contain-body">
        <div class="row">
          <div class="col-lg-3" id="nav">
              <h3>Taschen</h3>
              <div class="list-group">
                <a href="#" class="list-group-item">Louis Vuitton</a>
                <a href="#" class="list-group-item">Gucci</a>
                <a href="#" class="list-group-item">Addidas</a>
              </div>
          </div>
          <div class="col-lg-9" id="section">
            <h3><legend>Taschen</legend></h3>
			<?php
			$query = $bdd->query('SELECT * FROM Tasche');
			try{
			$i = 0;
			$marker = 0;
			while($donnees = $query->fetch()){
				if($i % 2 == 0){?>
					<div class="row" id="row-product">
				<?php }
						$queryDesign = $bdd->query('SELECT * FROM design WHERE IDDesign='.$donnees['IDDesign']);
						$queryMarke = $bdd->query('SELECT * FROM marke WHERE IDMarke='.$donnees['IDMarke']);
						$design = $queryDesign->fetch();
						$marke = $queryMarke->fetch();
						?>
							<div class="col-lg-6">
								<img src="<?php echo $donnees['PATH'] ?>" class="col-lg-8" id="product"/>
								<p class="col-lg-4" id="kurzbeschreibung">
									<b><?php echo $marke['Name'] ?></b><br>
									<?php echo $donnees['Name'] ?><br>
									<?php echo $donnees['Preis'] ?><br>
									<?php echo $donnees['Name'] ?><br>
								</p>
							</div>
					<?php if($i % 2 == 0){?></div><?php
				}
				$i++;
				//echo $donnees['Name'];
				}
			}catch(Exception $e){
				die('Fehler:' .$e->getMessage());
			}
			?>
              
	     </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

