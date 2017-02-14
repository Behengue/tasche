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
        			<div class="row"><h2 class="col-sm-offset-4">Markenverwaltung</h2></div>
        		<div class="row">
					<a href="#" class="col-sm-offset-4 col-sm-2"><button type="button" id="loeschen" class="btn btn-danger"><span class="glyphicon glyphicon-trash"> Löschen</span></button></a>
					<a href="markeRegistrieren.php" class="col-sm-2"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"> Einfügen</span></button></a>
  				</div>
        </div>
        <div class="table-responsive">       
  				<table class="table">
    				<thead>
      				<tr>
      					<th><input type="checkbox" id="checkall"/></th>
        					<th>Name der Marke</th>
        					<th>Bezeichnung</th>
      				</tr>
    				</thead>
    				<tbody>
    				<form method="POST" action="../controller/markeLoeschen.php" id="form">
        <?php
        	$bdd = getBDD();
        	$marken = $bdd->query('SELECT * FROM marke ORDER BY NameMarke');
        	$i = 1;
        	while($marke = $marken->fetch()) {
        		?>   
      				<tr>
      					<td><input type="checkbox" id="marke<?php echo $i;?>" name="marken[]" value="<?php echo $marke['IDMarke'];?>"></td>
      					<td><a href="markeEdit.php?idm=<?php echo $marke['IDMarke'];?>"><?php echo $marke['NameMarke'];?></a></td>
      					<td><?php echo $marke['BezeichnungMarke'];?></td>
      				</tr>
        		<?php
        		$i++;
        	}
        ?>
        </form>
    				</tbody>
  				</table>
  				<input type="hidden" value="<?php echo $i;?>" id="nbMarke"/>
        </div>
  </body>
  <script type="text/javascript">
  	var checkall = document.getElementById('checkall'),
  		nbMarke = document.getElementById('nbMarke'),
  		loeschen = document.getElementById('loeschen'),
  		form = document.getElementById('form');
  	checkall.addEventListener('change', function () {
  		if(this.checked == true){
  			for(var i = 1; i <= parseInt(nbMarke.value); i++){
  				elem = document.getElementById("marke" + i);
  				elem.checked = true;
  			}
  		}else{                            
  			for(var i = 1; i <= parseInt(nbMarke.value); i++){
  				elem = document.getElementById("marke" + i);
  				elem.checked = false;
  			}
  		}
  			
  	}, false);
  	
  	loeschen.addEventListener('click', function () {
  		form.submit();
  	}, false);
  </script>
</html>

