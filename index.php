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
        $selectmodel = "SELECT * FROM products WHERE trending = 1";
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
                  <a class="product-view d-block h-100 bg-cover bg-center" style="background: url(admin/Images/<?=$imagesmodel[0]?>)" href="admin/Images/<?=$imagesmodel[0]?>" data-lightbox="productview" title="<?=$productmodel['name']?>">
                </a>
                <a class="d-none" href="admin/Images/<?=$imagesmodel[0]?>" title="<?=$productmodel['name']?>" data-lightbox="productview">
                </a>
                <a class="d-none" href="admin/Images/<?=$imagesmodel[0]?>" title="<?=$productmodel['name']?>" data-lightbox="productview">
                </a>
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
                      <div class="col-sm-5 pl-sm-0"><a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" href="Function/shoppingList/insert.php?id=<?=$productmodel['id']?>">Add To Cart</a></div>
                    </div><a class="btn btn-link text-dark p-0" href="#"><i class="far fa-heart mr-2"></i>Add to wish list</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
      <!-- HERO SECTION-->
      <div class="container">
        <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url(img/hero-banner-alt.jpg)">
          <div class="container py-5">
            <div class="row px-4 px-lg-5">
              <div class="col-lg-6">
                <p class="text-muted small text-uppercase mb-2">New Inspiration 2020</p>
                <h1 class="h2 text-uppercase mb-3">20% off on new season</h1><a class="btn btn-dark" href="shop.php">Browse collections</a>
              </div>
            </div>
          </div>
        </section>
        <!-- CATEGORIES SECTION-->
        <section class="pt-5">
          <header class="text-center">
            <p class="small text-muted small text-uppercase mb-1">Carefully created collections</p>
            <h2 class="h5 text-uppercase mb-4">Browse our categories</h2>
          </header>
          <div class="row">
            <div class="col-md-4 mb-4 mb-md-0"><a class="category-item" href="shop.php?parent_cat=4"><img class="img-fluid" src="img/cat-img-1.jpg" alt=""><strong class="category-item-title">Clothes</strong></a></div>
            <div class="col-md-4 mb-4 mb-md-0"><a class="category-item mb-4" href="shop.php?parent_cat=8"><img class="img-fluid" src="img/cat-img-2.jpg" alt=""><strong class="category-item-title">Shoes</strong></a><a class="category-item" href="shop.php?parent_cat=10"><img class="img-fluid" src="img/cat-img-3.jpg" alt=""><strong class="category-item-title">Watches</strong></a></div>
            <div class="col-md-4"><a class="category-item" href="shop.php?parent_cat=11"><img class="img-fluid" src="img/cat-img-4.jpg" alt=""><strong class="category-item-title">Electronics</strong></a></div>
          </div>
        </section>
        <!-- TRENDING PRODUCTS-->
        <section class="py-5">
          <header>
            <p class="small text-muted small text-uppercase mb-1">Made the hard way</p>
            <h2 class="h5 text-uppercase mb-4">Top trending products</h2>
          </header>
          <div class="row">
            <!-- PRODUCT-->
            <?php
              include_once "admin/Function/connection.php";
              $select = "SELECT * FROM products WHERE trending = 1";
              $products = $conn -> query($select) ;
              foreach ($products as $product) {
                $images = explode(",", $product['image']);
            ?>
            <!-- PRODUCT-->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="product text-center">
                <div class="position-relative mb-3">
                <a class="d-block" href="detail.php?id=<?=$product['id']?>">
                  <img class="img-fluid w-100" style="height: 350px;" src="admin/Images/<?=$images[0]?>" alt="...">
                </a>
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
        </section>
        <!-- SERVICES-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row text-center">
              <div class="col-lg-4 mb-3 mb-lg-0">
                <div class="d-inline-block">
                  <div class="media align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#delivery-time-1"> </use>
                    </svg>
                    <div class="media-body text-left ml-3">
                      <h6 class="text-uppercase mb-1">Free shipping</h6>
                      <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 mb-3 mb-lg-0">
                <div class="d-inline-block">
                  <div class="media align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#helpline-24h-1"> </use>
                    </svg>
                    <div class="media-body text-left ml-3">
                      <h6 class="text-uppercase mb-1">24 x 7 service</h6>
                      <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="d-inline-block">
                  <div class="media align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#label-tag-1"> </use>
                    </svg>
                    <div class="media-body text-left ml-3">
                      <h6 class="text-uppercase mb-1">Festival offer</h6>
                      <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- NEWSLETTER-->
        <section class="py-5">
          <div class="container p-0">
            <div class="row">
              <div class="col-lg-6 mb-3 mb-lg-0">
                <h5 class="text-uppercase">Let's be friends!</h5>
                <p class="text-small text-muted mb-0">Nisi nisi tempor consequat laboris nisi.</p>
              </div>
              <div class="col-lg-6">
                <form action="#">
                  <div class="input-group flex-column flex-sm-row mb-3">
                    <input class="form-control form-control-lg py-3" type="email" placeholder="Enter your email address" aria-describedby="button-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-dark btn-block" id="button-addon2" type="submit">Subscribe</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php
        include "Includes/footer.php";
      ?>