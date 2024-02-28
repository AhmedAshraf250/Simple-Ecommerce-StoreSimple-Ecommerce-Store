<?php
$STATUS = "details";
// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";
?>
<!--  head & headre -->
<?php include("includes/head&header.php"); ?>
<!--  Modal -->
<?php
// include("includes/modalFORproduct.php"); 
?>

<?php

if (!isset($_GET['id'])) {
  $select_PRO = "SELECT * FROM products randomly ";
} else {
  $selected_proID = $_GET['id'];
  $select_PRO = "SELECT * FROM products WHERE id = $selected_proID";
}

$resault_PRO = $conn->query($select_PRO);
$row = $resault_PRO->fetch_assoc();
?>

<section class="py-5">
  <div class="container">
    <div class="row mb-5 THEPRODUCT" data-id="<?= $row['id'] ?>">
      <div class="col-lg-6">
        <!-- PRODUCT SLIDER-->
        <div class="row m-sm-0">
          <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0">
            <div class="owl-thumbs d-flex flex-row flex-sm-column" data-slider-id="1">

              <?php

              if (!isset($_GET['id'])) {
                $selected_proID = $row['id'];
              }

              $IMG_select = "SELECT * FROM images WHERE pro_id = $selected_proID";
              $IMG_rsult = $conn->query($IMG_select);
              while ($IMG_row = $IMG_rsult->fetch_assoc()) { ?>

                <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0"><img class="w-100" src="admin/img/products/<?= $IMG_row['name'] ?>" alt="..."></div>

              <?php
              }
              ?>

            </div>
          </div>
          <div class="col-sm-10 order-1 order-sm-2">
            <div class="owl-carousel product-slider" data-slider-id="1">

              <?php
              $i = 1;
              $IMG_select1 = "SELECT * FROM images WHERE pro_id = $selected_proID";
              $IMG_rsult1 = $conn->query($IMG_select1);
              while ($IMG_row1 = $IMG_rsult1->fetch_assoc()) { ?>

                <a class="d-block" href="admin/img/products/<?= $IMG_row1['name'] ?>" data-lightbox="product" title="Product item <?= $i++ ?>">
                  <img class="img-fluid" src="admin/img/products/<?= $IMG_row1['name'] ?>" alt="...">
                </a>

              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <!-- PRODUCT DETAILS-->
      <div class="col-lg-6">
        <ul class="list-inline mb-2">
          <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
          <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
          <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
          <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
          <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
        </ul>
        <h1><?= $row['name'] ?></h1>
        <p class="text-muted lead"><?= $row['price'] ?> $</p>
        <p class="text-small mb-4"><?= $row['description'] ?></p>

        <!-- <div class="row align-items-stretch mb-4"> -->
        <form action="cart.php" method="post" class="row align-items-stretch mb-4">
          <input type="hidden" name="user-id" value="<?= $_SESSION['suc_USER_log_ID'] ?>">
          <input type="hidden" name="product-id" value="<?= $row['id'] ?>">
          <div class="col-sm-5 pr-sm-0">
            <div class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white">
              <span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
              <div class="quantity">
                <div style="cursor: pointer;" class="dec-btn p-0 "><i class="fas fa-caret-left"></i></div>
                <input class=" form-control border-0 shadow-0 p-0" type="text" name="quantity" value="1">
                <div style="cursor: pointer;" class="inc-btn p-0"><i class="fas fa-caret-right"></i></div>
              </div>
            </div>
          </div>
          <div class="col-sm-3 pl-sm-0">
            <button class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" type="submit">Add to cart</button>
          </div>
          <!-- <div class="col-sm-3 pl-sm-0"><a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" href="cart.php">Add to cart</a></div> -->
        </form>
        <!-- </div> -->

        <a class="btn btn-link text-dark p-0 mb-4" href="#"><i class="far fa-heart mr-2"></i>Add to wish list</a><br>
        <ul class="list-unstyled small d-inline-block">
          <li class="px-3 py-2 mb-1 bg-white"><strong class="text-uppercase">SKU:</strong><span class="ml-2 text-muted">039</span></li>
          <li class="px-3 py-2 mb-1 bg-white text-muted">
            <strong class="text-uppercase text-dark">Category:</strong>
            <?php
            $pro_cat = $row['category'];
            $CAT_select  = "SELECT * FROM category WHERE id = $pro_cat";
            $CAT_result = $conn->query($CAT_select);
            $row_CAT = $CAT_result->fetch_assoc();
            ?>
            <a class="reset-anchor ml-2" href="shop.php?cat=<?= $row_CAT['id'] ?>"><?= $row_CAT['name'] ?></a>
          </li>
          <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Tags:</strong><a class="reset-anchor ml-2" href="#">Innovation</a></li>
        </ul>
      </div>
    </div>
    <!-- DETAILS TABS-->
    <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
      <li class="nav-item"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a></li>
      <li class="nav-item"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a></li>
      <li class="nav-item"><a class="nav-link" id="addReview-tab" data-toggle="tab" href="#addReview" role="tab" aria-controls="addReview" aria-selected="false">Add Review</a></li>
    </ul>

    <div class="tab-content mb-5" id="myTabContent">
      <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
        <div class="p-4 p-lg-5 bg-white">
          <h6 class="text-uppercase">Product description </h6>
          <p class="text-muted text-small mb-0"><?= $row['description'] ?></p>
        </div>
      </div>
      <!-- SHOW REVIEW -->
      <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
        <div class="p-4 p-lg-5 bg-white">
          <div class="row">
            <div class="col-lg-8" id="REVIEWSHOW">
              <?php
              $review_pro_ID = $row['id'];
              $REVIEW_sel = "SELECT * FROM reviews WHERE `product-id` = $review_pro_ID";
              $result_REV = $conn->query($REVIEW_sel);
              if ($result_REV->num_rows > 0) {
                while ($row_REV = $result_REV->fetch_assoc()) { ?>
                  <?php
                  $REV_userid = $row_REV['user-id'];
                  $REV_USERsel = "SELECT * FROM users WHERE id = $REV_userid";
                  $REV_resultUser = $conn->query($REV_USERsel);
                  $REV_row_USER = $REV_resultUser->fetch_assoc();
                  ?>
                  <hr>
                  <div class="media mb-3">
                    <img class="rounded-circle" src="admin/img/profile/<?= $REV_row_USER['image'] ? $REV_row_USER['image'] : 'default.jpg'  ?>" alt="" width="50">
                    <div class="media-body ml-3">
                      <h6 class="mb-0 text-uppercase"><?= $REV_row_USER['name'] ?></h6>
                      <p class="small text-muted mb-0 d-inline-flex"><?= $row_REV['date'] ?></p>
                      <p class="small text-muted mb-0 d-inline-flex">||</p>
                      <p class="small text-muted mb-0 d-inline-flex"><?= $row_REV['time'] ?></p>
                      <ul class="list-inline mb-1 text-xs">
                        <?php
                        $the_RATE = $row_REV['rating'];
                        if ($the_RATE > 0) {
                          $RATING = 5;
                          $empty_RATE = $RATING - $the_RATE;
                          for ($i = 0; $i < $the_RATE; $i++) {
                            echo '<li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>';
                          }
                          for ($o = 0; $o < $empty_RATE; $o++) {
                            echo '<li class="list-inline-item m-0"><i class="far fa-star text-warning"></i></li>';
                          }
                        }
                        ?>
                      </ul>
                      <p class="h5 mb-0 text-muted"><?= $row_REV['review'] ?></p>
                    </div>
                  </div>
              <?php
                }
              } else {
                echo '<h6 class="text-muted text-small noREVyet">No reviews yet</h6>';
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <!-- END SHOW REVIEW -->
      <div class="tab-pane fade show " id="addReview" role="tabpanel" aria-labelledby="addReview-tab">
        <div class="p-4 p-lg-5 bg-white">
          <form class="reviewFORM">
            <div class="mb-3">
              <label for="" class="form-label">ADD REVIEW</label>
              <textarea class="form-control" name="addreview" id="REVIEWADD"></textarea>
              <!-- <input type="text" id="REVIEWADD" class="form-control" name="addreview"> -->
            </div>
            <?php
            include "design/star_rate.php"
            ?>
            <button type="submit" class="btn btn-primary addreviewbtn">SEND REVIEW</button>
          </form>
          <div class="alert-messages text-center mt-3"></div>
        </div>
      </div>
    </div>
    <!-- RELATED PRODUCTS-->
    <h2 class="h5 text-uppercase mb-4">Related products</h2>
    <div class="row">
      <!-- PRODUCT-->
      <div class="col-lg-3 col-sm-6">
        <div class="product text-center skel-loader">
          <div class="d-block mb-3 position-relative"><a class="d-block" href="detail.html"><img class="img-fluid w-100" src="img/product-1.jpg" alt="..."></a>
            <div class="product-overlay">
              <ul class="mb-0 list-inline">
                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#"><i class="far fa-heart"></i></a></li>
                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="#">Add to cart</a></li>
                <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView" data-toggle="modal"><i class="fas fa-expand"></i></a></li>
              </ul>
            </div>
          </div>
          <h6> <a class="reset-anchor" href="detail.html">Kui Ye Chen’s AirPods</a></h6>
          <p class="small text-muted">$250</p>
        </div>
      </div>
      <!-- PRODUCT-->
      <div class="col-lg-3 col-sm-6">
        <div class="product text-center skel-loader">
          <div class="d-block mb-3 position-relative"><a class="d-block" href="detail.html"><img class="img-fluid w-100" src="img/product-2.jpg" alt="..."></a>
            <div class="product-overlay">
              <ul class="mb-0 list-inline">
                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#"><i class="far fa-heart"></i></a></li>
                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="#">Add to cart</a></li>
                <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView" data-toggle="modal"><i class="fas fa-expand"></i></a></li>
              </ul>
            </div>
          </div>
          <h6> <a class="reset-anchor" href="detail.html">Air Jordan 12 gym red</a></h6>
          <p class="small text-muted">$300</p>
        </div>
      </div>
      <!-- PRODUCT-->
      <div class="col-lg-3 col-sm-6">
        <div class="product text-center skel-loader">
          <div class="d-block mb-3 position-relative"><a class="d-block" href="detail.html"><img class="img-fluid w-100" src="img/product-3.jpg" alt="..."></a>
            <div class="product-overlay">
              <ul class="mb-0 list-inline">
                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#"><i class="far fa-heart"></i></a></li>
                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="#">Add to cart</a></li>
                <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView" data-toggle="modal"><i class="fas fa-expand"></i></a></li>
              </ul>
            </div>
          </div>
          <h6> <a class="reset-anchor" href="detail.html">Cyan cotton t-shirt</a></h6>
          <p class="small text-muted">$25</p>
        </div>
      </div>
      <!-- PRODUCT-->
      <div class="col-lg-3 col-sm-6">
        <div class="product text-center skel-loader">
          <div class="d-block mb-3 position-relative"><a class="d-block" href="detail.html"><img class="img-fluid w-100" src="img/product-4.jpg" alt="..."></a>
            <div class="product-overlay">
              <ul class="mb-0 list-inline">
                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#"><i class="far fa-heart"></i></a></li>
                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="#">Add to cart</a></li>
                <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView" data-toggle="modal"><i class="fas fa-expand"></i></a></li>
              </ul>
            </div>
          </div>
          <h6> <a class="reset-anchor" href="detail.html">Timex Unisex Originals</a></h6>
          <p class="small text-muted">$351</p>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include("includes/footer.php") ?>