<?php
  include "Includes/header.php";
?>
  <body>
    <div class="page-holder">
      <?php
        include "Includes/navbar.php";
      ?>
      <?php
        include_once "admin/Function/connection.php";
        if(isset($_GET['cat_id'])) {
          $cat_id = $_GET['cat_id'];
          $selectmodel = "SELECT * From products pro LEFT JOIN (SELECT id AS child_id, name AS child_name , cat_id AS child_cat FROM categories_from_category) AS child_cat ON pro.cat_id = child_cat.child_id WHERE child_cat = $cat_id";
        } else if(isset($_GET['id'])) {
          $id = $_GET['id'];
          $selectmodel = "SELECT * FROM products WHERE id = $id";
        } else {
          $selectmodel = "SELECT * FROM products";
        }
        $productsmodel = $conn -> query($selectmodel) ;
        foreach ($productsmodel as $productmodel) {
          $imagesmodel = explode(",", $productmodel['image']);
      ?>
      <!--  Modal -->
      <div class="modal fade" id="productView<?=$productmodel['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="row align-items-stretch">
                <div class="col-lg-6 p-lg-0">
                  <a class="product-view d-block h-100 bg-cover bg-center" style="background: url(admin/Images/<?=$imagesmodel[0]?>); background-size:cover;" href="admin/Images/<?=$imagesmodel[0]?>" data-lightbox="productview<?=$productmodel['id']?>" title="<?=$productmodel['name']?>">
                </a>
                <?php
                foreach($imagesmodel as $imagemodel) {
                ?>
                <a class="d-none" href="admin/Images/<?=$imagemodel?>" title="<?=$productmodel['name']?>" data-lightbox="productview<?=$productmodel['id']?>">
                </a>
                <?php } ?>
              </div>
                <div class="col-lg-6">
                  <button class="close p-4" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <div class="p-5 my-md-4">
                    <ul class="list-inline mb-2">
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                    </ul>
                    <h2 class="h4"><?=$productmodel['name']?></h2>
                    <p class="text-muted">$<?=$productmodel['price']?></p>
                    <p class="text-small mb-4" style="height: 100px; overflow:auto;"><?=$productmodel['description']?></p>
                    <div class="row align-items-stretch mb-4">
                      <div class="col-sm-7 pr-sm-0">
                        <div class="border d-flex align-items-center justify-content-between py-1 px-3"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                          <div class="quantity">
                            <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                            <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                            <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-5 pl-sm-0"><a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" href="Function/shoppingList/insert.php
                      ?id=<?=$productmodel['id']?>">Add To Cart</a></div>
                    </div><a class="btn btn-link text-dark p-0" href="#"><i class="far fa-heart mr-2"></i>Add to wish list</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
      <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Shop</h1>
              </div>
              <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
          <div class="container p-0">
            <div class="row">
              <!-- SHOP SIDEBAR-->
              <div class="col-lg-3 order-2 order-lg-1">
                <h5 class="text-uppercase mb-4">Categories</h5>
                <?php
                  include_once "admin/Function/connection.php";
                  $selectParCat = "SELECT * From categories";
                  $parentCategories = $conn -> query($selectParCat);

                  $ids = [];
                  $par_cats =[];
                  foreach($parentCategories as $parentCategory) {
                    $ids[] = $parentCategory['id'];
                    $par_cats[$parentCategory['id']] = $parentCategory['name'];
                  }
                  $par_cats_ids = implode(",", $ids);
                
                  $selectChildCat = "SELECT * FROM categories_from_category WHERE cat_id In ($par_cats_ids)";
                  $childCategories = $conn -> query($selectChildCat);
                  $child_cats = [];
                  foreach($childCategories as $childCategory) {
                    $child_cats[$childCategory["cat_id"]][$childCategory['id']] = $childCategory['name'];
                  }

                  foreach($par_cats as $par_key => $par_cat) {
                ?>
                <div class="py-2 px-4 bg-dark text-white mb-3">
                  <strong class="small text-uppercase font-weight-bold">
                  <a class="reset-anchor" href="?parent_cat=<?=$par_key?>"><?=$par_cat?></a>
                </strong>
              </div>
                <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
                  <?php
                    foreach($child_cats[$par_key] as $child_key => $child_cat) {
                  ?>
                  <li class="mb-2"><a class="reset-anchor" href="?child_cat=<?=$child_key?>"><?=$child_cat?></a></li>
                  <?php } ?>
                </ul>
                <?php } ?>
                <!-- <h6 class="text-uppercase mb-4">Price range</h6>
                <div class="price-range pt-4 mb-5">
                  <div id="range"></div>
                  <div class="row pt-2">
                    <div class="col-6"><strong class="small font-weight-bold text-uppercase">From</strong></div>
                    <div class="col-6 text-right"><strong class="small font-weight-bold text-uppercase">To</strong></div>
                  </div>
                </div>
                <h6 class="text-uppercase mb-3">Show only</h6>
                <div class="custom-control custom-checkbox mb-1">
                  <input class="custom-control-input" id="customCheck1" type="checkbox">
                  <label class="custom-control-label text-small" for="customCheck1">Returns Accepted</label>
                </div>
                <div class="custom-control custom-checkbox mb-1">
                  <input class="custom-control-input" id="customCheck2" type="checkbox">
                  <label class="custom-control-label text-small" for="customCheck2">Returns Accepted</label>
                </div>
                <div class="custom-control custom-checkbox mb-1">
                  <input class="custom-control-input" id="customCheck3" type="checkbox">
                  <label class="custom-control-label text-small" for="customCheck3">Completed Items</label>
                </div>
                <div class="custom-control custom-checkbox mb-1">
                  <input class="custom-control-input" id="customCheck4" type="checkbox">
                  <label class="custom-control-label text-small" for="customCheck4">Sold Items</label>
                </div>
                <div class="custom-control custom-checkbox mb-1">
                  <input class="custom-control-input" id="customCheck5" type="checkbox">
                  <label class="custom-control-label text-small" for="customCheck5">Deals &amp; Savings</label>
                </div>
                <div class="custom-control custom-checkbox mb-4">
                  <input class="custom-control-input" id="customCheck6" type="checkbox">
                  <label class="custom-control-label text-small" for="customCheck6">Authorized Seller</label>
                </div>
                <h6 class="text-uppercase mb-3">Buying format</h6>
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" id="customRadio1" type="radio" name="customRadio">
                  <label class="custom-control-label text-small" for="customRadio1">All Listings</label>
                </div>
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" id="customRadio2" type="radio" name="customRadio">
                  <label class="custom-control-label text-small" for="customRadio2">Best Offer</label>
                </div>
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" id="customRadio3" type="radio" name="customRadio">
                  <label class="custom-control-label text-small" for="customRadio3">Auction</label>
                </div>
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" id="customRadio4" type="radio" name="customRadio">
                  <label class="custom-control-label text-small" for="customRadio4">Buy It Now</label>
                </div> -->
              </div>
              <!-- SHOP LISTING-->
              <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                <div class="row mb-3 align-items-center">
                  <div class="col-lg-6 mb-2 mb-lg-0">
                    <p class="text-small text-muted mb-0">Showing 1–12 of 53 results</p>
                  </div>
                  <div class="col-lg-6">
                    <ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
                      <li class="list-inline-item text-muted mr-3"><a class="reset-anchor p-0" href="#"><i class="fas fa-th-large"></i></a></li>
                      <li class="list-inline-item text-muted mr-3"><a class="reset-anchor p-0" href="#"><i class="fas fa-th"></i></a></li>
                      <li class="list-inline-item">
                        <select class="selectpicker ml-auto" name="sorting" data-width="200" data-style="bs-select-form-control" data-title="Default sorting">
                          <option value="default">Default sorting</option>
                          <option value="popularity">Popularity</option>
                          <option value="low-high">Price: Low to High</option>
                          <option value="high-low">Price: High to Low</option>
                        </select>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="row">
                  <?php
                    include_once "admin/Function/connection.php";
                    if(isset($_GET['parent_cat'])) {
                      $parent_cat = $_GET['parent_cat'];
                      $selectproducts = "SELECT * From products pro LEFT JOIN (SELECT id AS child_id, name AS child_name , cat_id AS child_cat FROM categories_from_category) AS child_cat ON pro.cat_id = child_cat.child_id WHERE child_cat = $parent_cat";
                    } else if(isset($_GET['child_cat'])) {
                      $child_cat = $_GET['child_cat'];
                      $selectproducts = "SELECT * FROM products WHERE cat_id = $child_cat";
                    } else {
                      $selectproducts = "SELECT * FROM products";
                    }
                    $products = $conn -> query($selectproducts);
                    foreach($products as $product) {
                      $images = explode(",",$product['image']);
                  ?>
                  <!-- PRODUCT-->
                  <div class="col-lg-4 col-sm-6">
                    <div class="product text-center">
                      <div class="mb-3 position-relative" style="height: 20em">
                        <div class="badge text-white badge-"></div><a class="d-block" href="detail.php?id=<?=$product['id']?>"><img class="img-fluid" style="height: 15em;" src="admin/Images/<?=$images[0]?>" alt="..."></a>
                        <div class="product-overlay">
                          <ul class="mb-0 list-inline">
                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#"><i class="far fa-heart"></i></a></li>
                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="Function/shoppingList/insert.php?id=<?=$product['id']?>">Add To Cart</a></li>
                            <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView<?=$product['id']?>" data-toggle="modal"><i class="fas fa-expand"></i></a></li>
                          </ul>
                        </div>
                      </div>
                      <h6> <a class="reset-anchor" href="detail.php?id=<?=$product['id']?>"><?=$product['name']?></a></h6>
                      <p class="small text-muted">$<?=$product['price']?></p>
                    </div>
                  </div>
                  <?php } ?>
                </div>
                <!-- PAGINATION-->
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center justify-content-lg-end">
                    <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php
        include "Includes/footer.php";
      ?>
      <!-- Nouislider Config-->
      <script>
        var range = document.getElementById('range');
        noUiSlider.create(range, {
            range: {
                'min': 0,
                'max': 2000
            },
            step: 5,
            start: [100, 1000],
            margin: 300,
            connect: true,
            direction: 'ltr',
            orientation: 'horizontal',
            behaviour: 'tap-drag',
            tooltips: true,
            format: {
              to: function ( value ) {
                return '$' + value;
              },
              from: function ( value ) {
                return value.replace('', '');
              }
            }
        });
        
      </script>