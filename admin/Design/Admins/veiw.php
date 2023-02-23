<?php
  $pageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/") + 1);
  if($pageName != "admins.php") {
    header("location: ../../ErrorPage.php");
    exit();
  }
?>
<a class="btn btn-primary" href="?action=add">Add User</a>
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
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?= $admin["id"] ?>">
          Delete
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?= $admin["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are You Sure You Want To Delete User : <?= $admin["username"] ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a type="button" class="btn btn-danger" href="Function/Admins/delete.php?id=<?= $admin['id'] ?>">Confirm</a>
              </div>
            </div>
          </div>
        </div>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>