<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <?php
	include 'head.php'
  ?>
  <body style="padding-top:100px;">
        <?php include 'nav_bar.php' ?>
        <div class="container">
        
    					
        		<div class="row">
					<a href="#" class="col-sm-offset-4 col-sm-2"><button type="button" id="loeschen" class="btn btn-danger">Löschen</button></a>
					<a href="tascheRegistrieren.php" class="col-sm-2"><button type="button" class="btn btn-success">Hinzufügen</button></a>
					<div class="col-sm-4">
    				<form class="navbar-form navbar-left">
      				<div class="form-group">
        					<input type="text" class="form-control" placeholder="Search">
      				</div>
      				<button type="submit" class="btn btn-default">Submit</button>
    				</form>
					</div>
  				</div>
        </div>
        <div class="table-responsive">       
  				<table class="table">
    				<thead>
      				<tr>
      					<th><input type="checkbox" id="checkall"/></th>
        					<th>NameTasche</th>
        					<th>restliche Menge</th>
        					<th>Preis (Eur)</th>
        					<th>Bild</th>
        					<th>Marke</th>
        					<th>Design</th>
        					<th>Type</th>
        					<th>Kategorie</th>
        					<th>Beschreibung</th>
      				</tr>
    				</thead>
    				<tbody>
    				<form method="POST" action="../controller/tascheLoeschen.php" id="form">
        <?php
        	$bdd = getBDD();
        	$taschen = $bdd->query('SELECT * FROM tasche ORDER BY NameTasche');
        	$i = 1;
        	while($tasche = $taschen->fetch()) {
        		$queryDesign = $bdd->query('SELECT * FROM design WHERE IDDesign='.$tasche['IDDesign']);
				$queryMarke = $bdd->query('SELECT * FROM marke WHERE IDMarke='.$tasche['IDMarke']);
        		$queryKategorie = $bdd->query('SELECT * FROM kategorie k, hatkategorie hk WHERE k.IDKategorie=hk.IDKategorie AND hk.IDTasche='.$tasche['IDTasche']);
        		$queryType = $bdd->query('SELECT * FROM type t, hattype ht WHERE t.IDType=ht.IDType AND ht.IDTasche='.$tasche['IDTasche']);
				$design = $queryDesign->fetch();
				$marke = $queryMarke->fetch();
				$kategorie = $queryKategorie->fetch();
				$type = $queryType->fetch();
        		?>   
      				<tr>
      					<td><input type="checkbox" id="tasche<?php echo $i;?>" name="taschen[]" value="<?php echo $tasche['IDTasche'];?>"></td>
      					<td><a href="tascheEdit.php?idt=<?php echo $tasche['IDTasche'];?>"><?php echo $tasche['NameTasche'];?></td></a>
      					<td><?php echo $tasche['Menge'];?></td>
      					<td><?php echo $tasche['Preis'];?></td>
      					<td><img src="<?php echo $tasche['PATH'];?>" alt="<?php echo $tasche['NameTasche'];?>" style="height:100px;"/></td>
      					<td><?php echo $marke['NameMarke'];?></td>
      					<td><?php echo $design['NameDesign'];?></td>
      					<td><?php echo $type['NameType'];?></td>
      					<td><?php echo $kategorie['NameKategorie'];?></td>
      					<td><?php echo $tasche['BeschreibungTasche'];?></td>
      				</tr>
        		<?php
        		$i++;
        	}
        ?>
        </form>
    				</tbody>
  				</table>
  				<input type="hidden" value="<?php echo $i;?>" id="nbTasche"/>
        </div>
  </body>
  <script type="text/javascript">
  	var checkall = document.getElementById('checkall'),
  		nbTasche = document.getElementById('nbTasche'),
  		loeschen = document.getElementById('loeschen'),
  		form = document.getElementById('form');
  	checkall.addEventListener('change', function () {
  		if(this.checked == true){
  			for(var i = 1; i <= parseInt(nbTasche.value); i++){
  				elem = document.getElementById("tasche" + i);
  				elem.checked = true;
  			}
  		}else{                            
  			for(var i = 1; i <= parseInt(nbTasche.value); i++){
  				elem = document.getElementById("tasche" + i);
  				elem.checked = false;
  			}
  		}
  			
  	}, false);
  	
  	loeschen.addEventListener('click', function () {
  		form.submit();
  	}, false);
  </script>
</html>

