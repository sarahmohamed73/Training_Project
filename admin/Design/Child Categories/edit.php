<?php
  if(!isset($_GET['action'])) {
    header("location: ../../ErrorPage.php");
    exit();
  }
  
  include_once "Function/connection.php";
  $id = $_GET['id'];
  $select = "SELECT * FROM categories_from_category WHERE id = $id";
  $childCategory = $conn -> query($select) -> fetch_assoc();
?>
<form method="POST" action="Function/Child Categories/update.php">
  <input type="hidden" name="id" value = <?= $childCategory["id"] ?>>
  <div class="form-group">
    <label for="exampleFormControlInput1" class="form-label">Name</label>
    <input type="text" name="name" value="<?= $childCategory["name"] ?>" class="form-control" id="exampleFormControlInput1">
  </div>
  <div class="form-group">
    <select class="form-control" name="category" id="exampleFormControlSelect1">
      <?php
        include_once "Function/connection.php";
        $select = "SELECT * From categories";
        $parentCategories = $conn -> query($select);
        foreach($parentCategories as $parentCategory) {
      ?>
      <option value="<?=$parentCategory['id']?>" <?=$parentCategory['id'] == $childCategory['cat_id'] ? "selected" : ""?>><?=$parentCategory['name']?></option>
      <?php } ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary mb-5">Submit</button>
</form>