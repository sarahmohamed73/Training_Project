<?php
  $pageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/") + 1);
  if($pageName != "admins.php") {
    header("location: ../../ErrorPage.php");
    exit();
  }
?>
<!-- Delete Modal -->
<div class="modal fade" id="del" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are You Sure You Want To Delete User : <span class="adminName"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" data-id="" onclick="ConfirmDeleteAdmin(this)" class="confirmDelete btn btn-danger">Confirm</button>
      </div>
    </div>
  </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD USER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
          <div class="form-group ">
            <label for="exampleFormControlInput1" class="form-label">Username</label>
            <input type="text" name="username" value="" class="username form-control" id="exampleFormControlInput1">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput2" class="form-label">Password</label>
            <input type="password" name="password" value="" class="password form-control" id="exampleFormControlInput2">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput3" class="form-label">E-mail Address</label>
            <input type="text" name="email" value="" class="email form-control" id="exampleFormControlInput3">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Phone Number</label>
            <input type="text" name="phone" value="" class="phone form-control" id="exampleInputEmail1" >
          </div>
          <div class="form-check">
            <input class="gender form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="0">
            <label class="form-check-label" for="flexRadioDefault1">
              Male
            </label>
          </div>
          <div class="form-check">
            <input class="gender form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="1">
            <label class="form-label" for="flexRadioDefault2">
              Female
            </label>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput4" class="form-label">Address</label>
            <input type="text" name="address" value="" class="address form-control" id="exampleFormControlInput4">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Privliges</label>
            <select class="privliges form-control" name="privliges" id="exampleFormControlSelect1">
              <option value="0">Admin</option>
              <option value="1">User</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="addUser btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
  ADD USER
</button>
<br><br>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr class="text-primary">
    <th>ID</th>
    <th>Username</th>
    <th>E-mail</th>
    <th>Phone Number</th>
    <th>Address</th>
    <th>Gender</th>
    <th>Privliges</th>
    <th>Controls</th>
    </tr>
  </thead>
  <tbody>
    <?php
      include_once "Function/connection.php";
      $select = "SELECT * FROM admins";
      $admins = $conn -> query($select);
      foreach($admins as $admin) {
    ?>
    <tr>
      <td><?= $admin['id'] ?></td>
      <td><?= $admin['username'] ?></td>
      <td><?= $admin['email'] ?></td>
      <td><?= $admin['phone'] ?></td>
      <td><?= $admin['address'] ?></td>
      <td><?= $admin['gender'] == 0 ? "Male" : "Female" ?></td>
      <td><?= $admin['privliges'] == 0 ? "Admin" : "User" ?></td>
      <td>
        <a class="btn btn-primary" href="?action=edit&id=<?=$admin["id"]?>">Edit</a>
        <!-- Button trigger modal -->
        <button type="button" class="delete btn btn-danger" onclick="DeleteAdmin(<?=$admin['username']?>, <?=$admin['id']?>)" data-toggle="modal" data-target="#del" data-id="<?=$admin['id']?>" data-name="<?=$admin['username']?>">
          Delete
        </button>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>