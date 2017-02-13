
<html lang="en">

<body>

<div class="container">
  <form action="../controller/AnmeldenController.php" method="POST">
    <div class="form-group">
      <label for="email">Username:</label>
      <input type="email" class="form-control">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-default">Anmelden</button>
	<button type="submit" class="btn btn-default">Abbrechen</button>
	 <div class="checkbox">
      <label><input type="checkbox"> password vergessen</label>
    </div>
  </form>
</div>

</body>
</html>
