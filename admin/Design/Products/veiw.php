<?php
  $pageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/") + 1);
  if($pageName != "products.php") {
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
        Are You Sure You Want To Delete Product : <span class="productName"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" data-id="" class="confirmDeleteProduct btn btn-danger">Confirm</button>
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
      <form method="POST" action="" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" name="name" value="" class="name form-control" id="exampleFormControlInput1">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">Price</label>
            <input type="text" name="price" value="" class="price form-control" id="exampleFormControlInput1">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">Sale</label>
            <input type="text" name="sale" value="" class="sale form-control" id="exampleFormControlInput1">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Image</label>
            <input type="file" name="image[]" value="" class="image form-control" id="exampleInputEmail1" multiple>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Categories</label>
            <select class="category form-control" name="category" id="category exampleFormControlSelect1">
              <?php
                include_once "Function/connection.php";
                $select = "SELECT * From categories_from_category";
                $categories = $conn -> query($select);
                foreach($categories as $category) {
              ?>
              <option value="<?=$category['id']?>"><?=$category['name']?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-check">
            <input class="trending form-check-input" type="radio" name="trending" id="flexRadioDefault1" value="0">
            <label class="form-check-label" for="flexRadioDefault1">
              NOT TERENDING
            </label>
          </div>
          <div class="form-check">
            <input class="trending form-check-input" type="radio" name="trending" id="flexRadioDefault2" value="1">
            <label class="form-label" for="flexRadioDefault2">
              TERENDING
            </label>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">Description</label>
            <textarea type="text" name="description" value="" class="description form-control" id="exampleFormControlInput1"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="addProduct btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
  ADD Product
</button>
<br><br>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr class="text-primary">
      <th>ID</th>
      <th>Name</th>
      <th>Price</th>
      <th>Sale</th>
      <th>Images</th>
      <th>Categories</th>
      <th>Trending</th>
      <th>Controls</th>
    </tr>
  </thead>
  <tbody>
  <?php
      include_once "Function/connection.php";
      $select = "SELECT * From products pro LEFT JOIN (SELECT name AS cat_name , id AS cat_id FROM categories_from_category) AS cat ON pro.cat_id = cat.cat_id ORDER BY id DESC ;";
      $products = $conn -> query($select);
      foreach($products as $product) {
    ?>
      <tr>
      <td><?= $product['id'] ?></td>
      <td style="width:300px"><?= $product['name'] ?></td>
      <td><?= $product['price']."$" ?></td>
      <td><?= $product['sale'] ?></td>
      <td style="width:150px">
        <?php
          $images = explode(",",$product['image']);
          foreach($images as $image) {
        ?>
        <img style="width: 100px;" src="Images/<?= $image ?>" alt=""><br>
        <?php } ?>
      </td>
      <td><?= $product['cat_name'] ?></td>
      <td><?= $product['trending'] == 0 ? "NOT TRENDING" : "TRENDING" ?></td>
      <td>
        <a class="btn btn-primary" href="?action=edit&id=<?=$product["id"]?>">Edit</a>
        <!-- Button trigger modal -->
        <button type="button" class="deleteProduct btn btn-danger" data-toggle="modal" data-target="#del" data-id="<?=$product['id']?>" data-name="<?=$product['name']?>">
          Delete
        </button>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>