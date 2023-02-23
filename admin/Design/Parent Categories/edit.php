<?php
  if(!isset($_GET['action'])) {
    header("location: ../../ErrorPage.php");
    exit();
  }
  
  include_once "Function/connection.php";
  $id = $_GET['id'];
  $select = "SELECT * FROM categories WHERE id = $id";
  $Category = $conn -> query($select) -> fetch_assoc();
?>
<form method="POST" action="Function/Parent Categories/update.php">
  <input type="hidden" name="id" value = <?= $Category["id"] ?>>
  <div class="form-group">
    <label for="exampleFormControlInput1" class="form-label">Name</label>
    <input type="text" name="name" value="<?= $Category["name"] ?>" class="form-control" id="exampleFormControlInput1">
  </div>
  <button type="submit" class="btn btn-primary mb-5">Submit</button>
</form>