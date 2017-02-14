<div class="modal fade" id="filter" role="dialog">
						<div class="modal-dialog modal-sm">
      					<div class="modal-content">
        						<div class="modal-header">
          						<button type="button" class="close" data-dismiss="modal">&times;</button>
          						<h4 class="modal-title">Filter</h4>
        						</div>
        						<?php
        							$queryMarke = $bdd->query('SELECT * FROM marke GROUP BY NameMarke');
									$queryDesign = $bdd->query('SELECT * FROM design GROUP BY NameDesign');
									$queryType = $bdd->query('SELECT * FROM type GROUP BY NameType');
									$queryKategorie = $bdd->query('SELECT * FROM kategorie GROUP BY NameKategorie');
        						?>
        						<div class="modal-body">
          						<form method="POST" action="taschenSuche.php">
				<div class="form-group">
					<label for="suche">Stichwort:</label>
					<input type="text" name="suche" step=any class="form-control"/>
				</div>
				<div class="form-group">
					<label for="preisMin">Preis Min:</label>
					<input type="number" name="preisMin" step=any class="form-control" />
					<?php
					if(isset($_GET['err_preismin']) and $_GET['err_preismin'] == true){
				?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
				</div>
				<div class="form-group">
					<label for="preisMin">Preis Max:</label>
					<input type="number" name="preisMax" step=any class="form-control" />
					<?php
					if(isset($_GET['err_preismax']) and $_GET['err_preismax'] == true){
				?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
				</div>
				<div class="form-group">
					<label for="mengeMin">Menge Min:</label>
					<input type="number" name="mengeMin" step=any class="form-control" />
					<?php
					if(isset($_GET['err_mengemin']) and $_GET['err_mengemin'] == true){
				?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
				</div>
				<div class="form-group">
					<label for="mengeMin">Menge Max:</label>
					<input type="number" name="mengeMax" step=any class="form-control" />
					<?php
					if(isset($_GET['err_mengemax']) and $_GET['err_mengemax'] == true){
				?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
				</div>
          						<div class="form-group">
					<label for="name">Kategorie:</label>
					<select name="kategorie" class="form-control">
						<option value=""></option>
						<?php
							while($donneesKat = $queryKategorie->fetch()){
								?>
									<option value="<?php echo $donneesKat['IDKategorie'];?>"><?php echo $donneesKat['NameKategorie'];?></option>
								<?php
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="marke">Marke:</label>
					<select name="marke" class="form-control">
						<option value=""></option>
						<?php
							while($donneesMarke = $queryMarke->fetch()){
								?>
									<option value="<?php echo $donneesMarke['IDMarke'];?>"><?php echo $donneesMarke['NameMarke'];?></option>
								<?php
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="name">Design:</label>
					<select name="design" class="form-control">
						<option value=""></option>
						<?php
							while($donneesDesign = $queryDesign->fetch()){
								?>
									<option value="<?php echo $donneesDesign['IDDesign'];?>"><?php echo $donneesDesign['NameDesign'];?></option>
								<?php
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="name">Type:</label>
					<select name="type" class="form-control">
						<option value=""></option>
						<?php
							while($donneesType = $queryType->fetch()){
								?>
									<option value="<?php echo $donneesType['IDType'];?>"><?php echo $donneesType['NameType'];?></option>
								<?php
							}
						?>
					</select>
				</div>
          						<button type="submit" class="btn btn-info">Suchen</button>
          						</form>
        						</div>
        						<div class="modal-footer">
          						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        						</div>
      					</div>
    					</div>
  					</div>
					</div>
  				</div>
        </div>