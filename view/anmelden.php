<?php
	include 'head.php';
?>
<html lang="en">

<body>

<div class="container">
  <form action="../controller/anmeldenController.php" method="POST">
    <div class="form-group">
      <label for="text">Username:</label>
      <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="pwd">
    </div>
    <button type="submit" class="btn btn-success">Anmelden</button>
	<a href="index.php"><button type="button" class="btn btn-danger">Abbrechen</button></a>
  </form>
</div>
<div>
	<h3>Haben sie noch kein Konto?</h3>
	<a href="registrieren.php">Registrien</a>
</div>

</body>
</html>
