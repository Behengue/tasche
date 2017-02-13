<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <?php
	include 'head.php'
  ?>
  <body>
  <?php
	function getCount($query){
		$i = 0;
		while($query->fetch()){
			$i++;
		}
		return $i;
	}
  	$bdd = new PDO('mysql:host=localhost;dbname=taschen', 'root', '');
	if(isset($_GET['user_create']) AND $_GET['user_create'] == 1){
		?>
	<div class="container">
	  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#userCreate">Open Modal</button>

	  <div class="modal fade" id="userCreate" role="dialog">
		<div class="modal-dialog">
		
		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Kontoerstellung</h4>
			</div>
			<div class="modal-body">
			  <p>Das Konto wurde erfolgreich erstellt</p>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		  </div>
		  
		</div>
	  </div>
	</div>
	<?php
	}
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
        <?php include 'nav_bar.php' ?>
        <?php include 'caroussel.php'?>
		<?php include 'alltasche_marke.php'?>
      </div>
    </div>
	<?php
		if(isset($_GET['kauf']) and $_GET['kauf'] == true){
		?>
			<div class="container">
				<div class="modal fade" id="kaufSuccess" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Danke f�r Ihren Einkauf</h4>
							</div>
							<div class="modal-body">
								<p>Der Artikel <?php echo $_GET['idt']; ?> wurde erfolgreich gekauft.</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Schlie�en</button>
							</div>
						</div>
					</div>
				</div>
			</div>	
		<?php	
		}
	?>
  </body>
</html>

