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
        			<div class="row"><h2 class="col-sm-offset-4">Typverwaltung</h2></div>
					<a href="#" class="col-sm-offset-4 col-sm-2"><button type="button" id="loeschen" class="btn btn-danger"><span class="glyphicon glyphicon-trash"> Löschen</span></button></a>
					<a href="typeRegistrieren.php" class="col-sm-2"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"> Einfügen</span></button></a>
  				</div>
        </div>
        <div class="table-responsive">       
  				<table class="table">
    				<thead>
      				<tr>
      					<th><input type="checkbox" id="checkall"/></th>
        					<th>Name der Type</th>
        					<th>Bezeichnung</th>
      				</tr>
    				</thead>
    				<tbody>
    				<form method="POST" action="../controller/typeLoeschen.php" id="form">
        <?php
        	$bdd = getBDD();
        	$typen = $bdd->query('SELECT * FROM type ORDER BY NameType');
        	$i = 1;
        	while($type = $typen->fetch()) {
        		?>   
      				<tr>
      					<td><input type="checkbox" id="type<?php echo $i;?>" name="typen[]" value="<?php echo $type['IDType'];?>"></td>
      					<td><a href="typeEdit.php?idk=<?php echo $type['IDType'];?>"><?php echo $type['NameType'];?></a></td>
      					<td><?php echo $type['BezeichnungType'];?></td>
      				</tr>
        		<?php
        		$i++;
        	}
        ?>
        </form>
    				</tbody>
  				</table>
  				<input type="hidden" value="<?php echo $i;?>" id="nbType"/>
        </div>
  </body>
  <script type="text/javascript">
  	var checkall = document.getElementById('checkall'),
  		nbType = document.getElementById('nbType'),
  		loeschen = document.getElementById('loeschen'),
  		form = document.getElementById('form');
  	checkall.addEventListener('change', function () {
  		if(this.checked == true){
  			for(var i = 1; i <= parseInt(nbType.value); i++){
  				elem = document.getElementById("type" + i);
  				elem.checked = true;
  			}
  		}else{                            
  			for(var i = 1; i <= parseInt(nbType.value); i++){
  				elem = document.getElementById("type" + i);
  				elem.checked = false;
  			}
  		}
  			
  	}, false);
  	
  	loeschen.addEventListener('click', function () {
  		form.submit();
  	}, false);
  </script>
</html>

