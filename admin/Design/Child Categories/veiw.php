<?php
  $pageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/") + 1);
  if($pageName != "categories.php") {
    header("location: ../../ErrorPage.php");
    exit();
  }
?>
<a class="btn btn-primary" href="?action=addChild">Add Child Category</a>
<a class="btn btn-primary" href="?action=addParent">Add Parent Category</a>
<br><br>
<table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr class="text-primary">
    <th>ID</th>
    <th>Name</th>
    <th>Category Of Categories</th>
    <th>Controls of Child</th>
    <th>Controls of Parent</th>
    </tr>
  </thead>
  <tbody>
    <?php
      include_once "Function/connection.php";
      $select = "SELECT * From categories_from_category child_cat LEFT JOIN (SELECT name AS parent_name , id AS parent_id FROM categories) AS parent_cat ON child_cat.cat_id = parent_cat.parent_id";
      $categories = $conn -> query($select);
      foreach($categories as $category) {
    ?>
    <tr>
      <td><?= $category['id'] ?></td>
      <td><?= $category['name'] ?></td>
      <td><?= $category['parent_name'] ?></td>
      <td>
        <a class="btn btn-primary" href="?action=editChild&id=<?=$category["id"]?>">Edit Child Category</a>
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?=$category['id']?>">
          Delete
        </button> -->

        <!-- Modal -->
        <!-- <div class="modal fade" id="exampleModal<?=$category['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are You Sure You Want To Delete Child Category : <?=$category['name']?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a type="button" class="btn btn-danger" href="Function/Child Categories/delete.php?id=<?=$category['id']?>">Confirm</a>
              </div>
            </div>
          </div>
        </div> -->
      </td>
      <td>
        <a class="btn btn-primary" href="?action=editParent&id=<?=$category["parent_id"]?>">Edit Parent Category</a>
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?=$category['parent_id']?>">
          Delete
        </button> -->

        <!-- Modal -->
        <!-- <div class="modal fade" id="exampleModal<?=$category['parent_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are You Sure You Want To Delete Parent Category : <?=$category['parent_name']?> 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a type="button" class="btn btn-danger" href="Function/Parent Categories/delete.php?id=<?=$category['parent_id']?>">Confirm</a>
              </div>
            </div>
          </div>
        </div> -->
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>