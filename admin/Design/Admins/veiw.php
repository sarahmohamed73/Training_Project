<?php
  $pageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/") + 1);
  if($pageName != "admins.php") {
    header("location: ../../ErrorPage.php");
    exit();
  }
?>
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
    <tr class="row<?=$admin["id"]?>">
      <td class="id<?=$admin["id"]?>"><?= $admin['id'] ?></td>
      <td class="username<?=$admin["id"]?>"><?= $admin['username'] ?></td>
      <td class="email<?=$admin["id"]?>"><?= $admin['email'] ?></td>
      <td class="phone<?=$admin["id"]?>"><?= $admin['phone'] ?></td>
      <td class="address<?=$admin["id"]?>"><?= $admin['address'] ?></td>
      <td class="gender<?=$admin["id"]?>"><?= $admin['gender'] == 0 ? "Male" : "Female" ?></td>
      <td class="privliges<?=$admin["id"]?>"><?= $admin['privliges'] == 0 ? "Admin" : "User" ?></td>
      <td>
        <!-- Button trigger modal -->
        <button type="button" class="edit btn btn-primary" data-toggle="modal" data-target="#edit" data-id="<?=$admin['id']?>">
          Edit
        </button>
        <!-- Button trigger modal -->
        <button type="button" class="delete btn btn-danger" data-toggle="modal" data-target="#del" data-id="<?=$admin['id']?>" data-name="<?=$admin['username']?>">
          Delete
        </button>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>