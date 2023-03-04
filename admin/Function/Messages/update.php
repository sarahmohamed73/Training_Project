<?php
  $id = $_POST['id'];
  include "../connection.php";
  $update = "UPDATE messages SET view = 1 WHERE id = '$id'";
  $query = $conn -> query($update);
  if ($query) {
    echo "Message Updated";
  } else {
    echo $conn -> error ;
  }
?>