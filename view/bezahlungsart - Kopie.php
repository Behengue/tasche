<?php
	session_start();
	include 'head.php';
	include 'nav_bar.php';
	?>

	<body>
		<div class="row" style="margin-top:60px;">
		<form action="../controller/bezahlungsartController.php?idt=<?php echo $_GET['id'];?>" method="POST" class="form col-lg-push-3 col-lg-6">
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#lfa">Rechnungsadresse</a></li>
			<li><a data-toggle="tab" href="#ra"></a>Lieferadresse</li>
			<li><a data-toggle="tab" href="#zahlungsart">Zahlungsart</a></li>
		  </ul>
		  
		  <div id="ra" class="tab-pane fade">
			  <h3>Rechnungsadresse</h3>
			  <p>Geben sie bitte die Lieferadresse ein</p>
				<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" disabled name="name" class="form-control" value="<?php echo $_SESSION['namekunde']?>" required/>
					<label for="name">Vorname:</label>
					<input type="text" disabled name="name" class="form-control" value="<?php echo $_SESSION['vorname']?>" required/>
					<label for="name">Straße:</label>
					<input type="text" disabled name="name" class="form-control" value="<?php echo $_SESSION['strasse']?>" required/>
					<label for="name">Plz:</label>
					<input type="text" disabled name="name" class="form-control" value="<?php echo $_SESSION['plz']?>" required/>
					<label for="name">Stadt:</label>
					<input type="text" disabled name="name" class="form-control" value="<?php echo $_SESSION['stadt']?>" required/>
				</div>
			</div>

		  <div class="tab-content">
			<div id="lfa" class="tab-pane fade in active">
				<label class="checkbox-inline"><input type="checkbox" value="" id="liefadr">Lieferadresse, falls von der Rechnungsadresse abweichend</label>
			  <h3>Lieferadresse</h3>
			  <p>Geben sie bitte die Lieferadresse ein</p>
				<div class="form-group" id="div_liefadr">
					<label for="name">Name:</label>
					<input type="text" class="form-control" disabled id="liefadr_input"/>
					<label for="name">Vorname:</label>
					<input type="text" class="form-control" disabled id="liefadr_input"/>
					<label for="name">Straße:</label>
					<input type="text" class="form-control" disabled id="liefadr_input"/>
					<label for="name">Plz:</label>
					<input type="text"  class="form-control" disabled id="liefadr_input"/>
					<label for="name">Stadt:</label>
					<input type="text"  class="form-control" disabled id="liefadr_input"/>
				</div>
			</div>
			
			<div id="zahlungsart" class="tab-pane fade">
				  <h3>Zahlungsart</h3>
				  <p>Wählen Sie eine Zahlungsmethode aus</p>
				<div class="radio">
				  <label><input type="radio" name="optradio">Paypal</label>
				</div>
				<div class="radio">
				  <label><input type="radio" name="optradio">Online-Banking</label>
				</div>
				<div class="radio">
				  <label><input type="radio" name="optradio">Kreditkarte</label>
				</div>
			</div>
		  </div>
		  <input type="submit" value="Kaufen" class="btn btn-primary">
		  <a href="start_seite.php"><input value="Abbrechen" class="btn btn-danger"></a>
		  </form>
		</div>
	</div>


	</body>
	<script>
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