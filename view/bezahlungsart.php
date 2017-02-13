<?php
	session_start();
	include 'head.php';
	include 'nav_bar.php';
	?>

	<body>
		<div class="row" style="margin-top:60px;">
		<form action="../controller/bezahlungsartController.php?idt=<?php echo $_SESSION['idt'];?>" method="POST" class="form col-lg-push-3 col-lg-6">
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#ra">Rechnungsadresse</a></li>
			<li><a data-toggle="tab" href="#lfa">Lieferadresse</a></li>
			<li><a data-toggle="tab" href="#zahlungsart">Zahlungsart</a></li>
		  </ul>

		  <div class="tab-content">
			<div id="ra" class="tab-pane fade in active">
			  <h3>Rechnungsadresse</h3>
			  <p>Geben sie bitte die Lieferadresse ein</p>
				<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" disabled name="namekunde" class="form-control" value="<?php echo $_SESSION['namekunde']?>" required/>
					<label for="vorname">Vorname:</label>
					<input type="text" disabled name="vorname" class="form-control" value="<?php echo $_SESSION['vorname']?>" required/>
					<label for="straße">Straße:</label>
					<input type="text" disabled name="straße" class="form-control" value="<?php echo $_SESSION['strasse']?>" required/>
					<label for="plz">Plz:</label>
					<input type="text" disabled name="plz" class="form-control" value="<?php echo $_SESSION['plz']?>" required/>
					<label for="stadt">Stadt:</label>
					<input type="text" disabled name="stadt" class="form-control" value="<?php echo $_SESSION['stadt']?>" required/>
				</div>
			</div>
			<div id="lfa" class="tab-pane fade">
				<label class="checkbox-inline"><input type="checkbox" value="" id="liefadr">Lieferadresse, falls von der Rechnungsadresse abweichend</label>
			  <h3>Lieferadresse</h3>
			  <p>Geben sie bitte die Lieferadresse ein</p>
				<div class="form-group" id="div_liefadr">
					<label for="name">Name:</label>
					<input type="text" class="form-control" disabled id="liefadr_input"/>
					<label for="vorname">Vorname:</label>
					<input type="text" class="form-control" disabled id="liefadr_input"/>
					<label for="straße">Straße:</label>
					<input type="text" class="form-control" disabled id="liefadr_input"/>
					<label for="plz">Plz:</label>
					<input type="text"  class="form-control" disabled id="liefadr_input"/>
					<label for="stadt">Stadt:</label>
					<input type="text"  class="form-control" disabled id="liefadr_input"/>
				</div>
			</div>
			<div id="zahlungsart" class="tab-pane fade">
				<h3>Online-Banking</h3>
				<p>Fügen Sie Ihre Daten ein</p>
				<div class="form-group<?php
						if(isset($_GET['err_iban']) and $_GET['err_iban'] == true){?>has-error has-feedback<?php }else{?>
							has-primary has-feedback
						<?php
						}
						?>">
					<label for="IBAN">IBAN:</label>
					<input name="fest" type="hidden" id="fest"/>
					<input type="text" name="ibankunde" value="<?php echo $_SESSION['iban']?>" class="form-control"><?php
						if(isset($_GET['err_iban']) and $_GET['err_iban'] == true){
							?><span class="glyphicon glyphicon-alert form-control-feedback" style="color:red;"></span>
							<p class="label label-danger">Die eingegebene IBAN ist falsch formatiert oder leer</p><?php
						}
						$_GET['iban'] = 0;
					?>
				</div>
		  </div>
		  <input type="submit" value="Kaufen" class="btn btn-success" id="submit" style="margin-top:10px;">
		  <a href="start_seite.php"><input value="Abbrechen" class="btn btn-danger" style="margin-top:10px;"></a>
		  </form>
		</div>
	</div>
	
	  
	  

	</body>
	<script>
		var submit = document.getElementById('submit'),
			fest = document.getElementById('fest');
		submit.addEventListener('click', function(){
			var choice = confirm('Wollen Sie diese IBAN als Ihre Haupt-IBAN festlegen?');
			if(choice == true)
				fest.value = 'ja';
			else
				fest.value = 'no';
		}, false);
		function change_all_state(){
			var liefadr = document.getElementById('liefadr');
			liefadr.addEventListener('click', function(){
				var checked = this.checked, i;
				var liefadr_inputs = document.getElementsByTagName('input');
				for(i = 0; i < liefadr_inputs.length; i++)
					if(liefadr_inputs[i].id == "liefadr_input")
						change_state(liefadr_inputs[i], checked);
			}, false);
		}
		function change_state(element, checked){
			element.disabled = !checked;
			element.required = checked;
		}
		
		document.addEventListener('load', function(){
			change_all_state();
		}, false);
		change_all_state();
	</script>