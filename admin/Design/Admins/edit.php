<?php
  if(!isset($_GET['action'])) {
    header("location: ../../ErrorPage.php");
    exit();
  }
  
  include "Function/connection.php";
  $id = $_GET['id'];
  $select = "SELECT * FROM admins WHERE id = $id";
  $admin = $conn -> query($select) -> fetch_assoc();
?>
<form method="POST" action="Function/Admins/update.php">
  <input type="hidden" name="id" value = <?= $admin["id"] ?>>
  <div class="form-group">
    <label for="exampleFormControlInput1" class="form-label">Username</label>
    <input type="text" name="username" value="<?= $admin["username"] ?>" class="form-control" id="exampleFormControlInput1">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1" class="form-label">Password</label>
    <input type="password" name="password" value="" class="form-control" id="exampleFormControlInput1">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1" class="form-label">E-mail Address</label>
    <input type="text" name="email" value="<?= $admin["email"] ?>" class="form-control" id="exampleFormControlInput1">
  </div>
  <div class="form-group">
		<label for="exampleInputEmail1">Phone Number</label>
		<input type="text" name="phone" value="<?= $admin["phone"] ?>" class="form-control" id="exampleInputEmail1" >
	</div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="0" <?= $admin["gender"] == 0 ? "checked" : "" ?>>
    <label class="form-check-label" for="flexRadioDefault1">
      Male
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="1" <?= $admin["gender"] == 1 ? "checked" : "" ?>>
    <label class="form-check-label" for="flexRadioDefault2">
      Female
    </label>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1" class="form-label">Address</label>
    <input type="text" name="address" value="<?= $admin["address"]?>" class="form-control" id="exampleFormControlInput1">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1" class="form-label">Privliges</label>
    <select class="form-control" name="privliges" id="exampleFormControlInput1">
      <option value="0" <?= $admin["privliges"] == 0 ? "selected" : "" ?>>Admin</option>
      <option value="1" <?= $admin["privliges"] == 1 ? "selected" : "" ?>>User</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary mb-5">Submit</button>
</form>