<?php
  if(!isset($_GET['action'])) {
    header("location: ../../ErrorPage.php");
    exit();
  }
?>
<form method="POST" action="Function/Child Categories/insert.php">
  <div class="form-group ">
    <label for="exampleFormControlInput1" class="form-label">Name</label>
    <input type="text" name="name" value="" class="form-control" id="exampleFormControlInput1">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Parent Category</label>
    <select class="form-control" name="category" id="exampleFormControlSelect1">
      <?php
        include "Function/connection.php";
        $select = "SELECT * From categories";
        $categories = $conn -> query($select);
        foreach($categories as $category) {
      ?>
      <option value="<?=$category['id']?>"><?=$category['name']?></option>
      <?php } ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary mb-5">Submit</button>
</form>