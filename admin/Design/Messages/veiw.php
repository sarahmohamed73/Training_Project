<?php
  $pageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/") + 1);
  if($pageName != "messages.php") {
    header("location: ../../ErrorPage.php");
    exit();
  }
?>
<!-- Show Message Modal -->
<div class="modal fade" id="showMessage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Message <span class="onwerMassage"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="message"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primar" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr class="text-primary">
    <th>ID</th>
    <th>Name</th>
    <th>E-mail</th>
    <th>Subject</th>
    <th>Veiw</th>
    <th>Controls</th>
    </tr>
  </thead>
  <tbody>
    <?php
      include_once "Function/connection.php";
      $select = "SELECT * FROM messages";
      $messages = $conn -> query($select);
      foreach($messages as $message) {
    ?>
    <tr>
      <td><?= $message['id'] ?></td>
      <td><?= $message['name'] ?></td>
      <td><?= $message['email'] ?></td>
      <td><?= $message['subject'] ?></td>
      <td><?= $message['view'] == 0 ? "Unread" : "Read"  ?></td>
      <td>
        <!-- Button trigger modal -->
        <button type="button" class="showMessage btn btn-primary" data-id="<?=$message['id']?>" data-name="<?=$message['name']?>" data-message="<?=$message['message']?>" data-toggle="modal" data-target="#showMessage">
          Show Messages
        </button>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>