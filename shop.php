<?php
$STATUS = "shop";
?>
<!--  head & headre -->
<?php include("includes/head&header.php"); ?>
<!--  Modal -->
<?php
// include("includes/modalFORproduct.php"); 
?>

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

          <!-- <div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase font-weight-bold">Fashion &amp; Acc</strong></div> -->
          <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
            <?php
            $CATEGORY_selected =  "SELECT * FROM category";
            $CATEGORY_result = mysqli_query($conn, $CATEGORY_selected);
            // $CATEGORY_result = $conn->query($CATEGORY_selected);
            while ($CATEGORY_row = mysqli_fetch_assoc($CATEGORY_result)) { ?>

              <li class="mb-2 "><a class="reset-anchor" href="?cat=<?= $CATEGORY_row['id'] ?>"><?= $CATEGORY_row['name'] ?></a></li>

            <?php
            }
            ?>

          </ul>

          <!-- <div class="py-2 px-4 bg-light mb-3"><strong class="small text-uppercase font-weight-bold">Health &amp; Beauty</strong></div>
          <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
            <li class="mb-2"><a class="reset-anchor" href="#">Shavers</a></li>
            <li class="mb-2"><a class="reset-anchor" href="#">bags</a></li>
            <li class="mb-2"><a class="reset-anchor" href="#">Cosmetic</a></li>
            <li class="mb-2"><a class="reset-anchor" href="#">Nail Art</a></li>
            <li class="mb-2"><a class="reset-anchor" href="#">Skin Masks &amp; Peels</a></li>
            <li class="mb-2"><a class="reset-anchor" href="#">Korean cosmetics</a></li>
          </ul> -->

          <!-- <div class="py-2 px-4 bg-light mb-3"><strong class="small text-uppercase font-weight-bold">Electronics</strong></div>
          <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal mb-5">
            <li class="mb-2"><a class="reset-anchor" href="#">Electronics</a></li>
            <li class="mb-2"><a class="reset-anchor" href="#">USB Flash drives</a></li>
            <li class="mb-2"><a class="reset-anchor" href="#">Headphones</a></li>
            <li class="mb-2"><a class="reset-anchor" href="#">Portable speakers</a></li>
            <li class="mb-2"><a class="reset-anchor" href="#">Cell Phone bluetooth headsets</a></li>
            <li class="mb-2"><a class="reset-anchor" href="#">Keyboards</a></li>
          </ul> -->

          <h6 class="text-uppercase mb-4">Price range</h6>
          <!--  -->
          <div class="price-range pt-4 mb-5">
            <div id="range"></div>
            <div class="row pt-2">
              <div class="col-6"><strong class="small font-weight-bold text-uppercase">From</strong></div>
              <div class="col-6 text-right"><strong class="small font-weight-bold text-uppercase">To</strong></div>
            </div>
          </div>
          <!--  -->
          <!-- <h6 class="text-uppercase mb-3">Show only</h6>
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
            <!-- PRODUCT-->
            <?php

            if (!isset($_GET['page'])) {
              if (isset($_GET['cat'])) {
                $cat_id = $_GET['cat'];
                $PROs_select = "SELECT * FROM products where category = '$cat_id' LIMIT 3";
              } else {
                $PROs_select = "SELECT * FROM products LIMIT 3";
              }
            } elseif (isset($_GET['page'])) {
              $page = ($_GET['page'] - 1) * 3;
              $PROs_select = "SELECT * FROM products LIMIT 3 OFFSET $page ";
              // echo "<p> $page</p>";
            }






            $PROs_result = $conn->query($PROs_select);
            while ($row = $PROs_result->fetch_assoc()) { ?>

              <div class="col-lg-4 col-sm-6">
                <div class="product text-center">
                  <div class="mb-3 position-relative">
                    <div class="badge text-white badge-"></div>
                    <a class="d-block" href="detail.php?id=<?= $row['id'] ?>">
                      <img class="img-fluid w-100" src="admin/img/products/<?php
                                                                            $pro_id = $row['id'];
                                                                            $img_select = "SELECT * FROM images WHERE pro_id = $pro_id limit 1";
                                                                            $img_result = $conn->query($img_select);
                                                                            $img_row = $img_result->fetch_assoc();
                                                                            echo $img_row['name'];
                                                                            ?>" alt="...">
                    </a>
                    <div class="product-overlay">
                      <ul class="mb-0 list-inline">
                        <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#"><i class="far fa-heart"></i></a></li>
                        <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="cart.php">Add to cart</a></li>
                        <li class="list-inline-item mr-0">
                          <a class="btn btn-sm btn-outline-dark modalProToView" data-id="<?= $row['id'] ?>" href="#productView<?= $row['id'] ?>" data-toggle="modal">
                            <i class="fas fa-expand"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <h6> <a class="reset-anchor" href="detail.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></h6>
                  <p class="small text-muted"><?= $row['price'] ?></p>
                </div>
              </div>

            <?php
            }
            ?>


          </div>
          <!-- PAGINATION-->

          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center justify-content-lg-end">
              <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>

              <?php
              $selct_pros_count = "SELECT count(*)/3 as count FROM products";
              $count_result = $conn->query($selct_pros_count);
              $count_row = $count_result->fetch_assoc();
              // echo $count_row['count'];
              for ($i = 1; $i <= ceil($count_row['count']); $i++) { ?>
                <li class="page-item <?php
                                      if (!isset($_GET['page']) && $i === 1) {
                                        echo "active";
                                      } else if (isset($_GET['page'])) {
                                        if ($_GET['page'] == $i) {
                                          echo "active";
                                        }
                                      }
                                      ?>"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
              <?php
              }
              ?>

              <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </section>
</div>
<?php include("includes/footer.php") ?>