<?php
  $pageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/") + 1);
  if($pageName != "products.php") {
    header("location: ../../ErrorPage.php");
    exit();
  }
?>
<a class="btn btn-primary" href="?action=add">Add Product</a>
<a class="btn btn-primary" href="?action=addCat">Add Category</a>
<br><br>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Price</th>
      <th>Sale</th>
      <th>Images</th>
      <th>Categories</th>
      <th>Controls</th>
    </tr>
  </thead>
  <tbody>
  <?php
      include "Function/connection.php";
      $select = "SELECT * From products pro LEFT JOIN (SELECT name AS cat_name , id AS cat_id FROM categories) AS cat ON pro.cat_id = cat.cat_id ;";
      $products = $conn -> query($select);
      foreach($products as $product) {
    ?>
      <tr>
      <td><?= $product['id'] ?></td>
      <td><?= $product['name'] ?></td>
      <td><?= $product['price']."$" ?></td>
      <td><?= $product['sale'] ?></td>
      <td>
        <?php
          $images = explode(",",$product['image']);
          foreach($images as $image) {
        ?>
        <img style="width: 100px;" src="Images/<?= $image ?>" alt=""><br>
        <?php } ?>
      </td>
      <td><?= $product['cat_name'] ?></td>
      <td>
        <a class="btn btn-primary" href="?action=edit&id=<?=$product["id"]?>">Edit</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?= $product["id"] ?>">
          Delete
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?= $product["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are You Sure You Want To Delete Product : <?= $product["name"] ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a class="btn btn-danger" href="Function/Products/delete.php?id=<?=$product["id"]?>">Confirm</a>
              </div>
            </div>
          </div>
        </div>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>