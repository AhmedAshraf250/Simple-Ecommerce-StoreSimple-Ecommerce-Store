<?php
session_start();
include "connect.php";

$current_user = $_SESSION['suc_USER_log_ID'];
$selected_productID = $_POST['product'];
$REVIEW = $_POST['review'];
$Rating = $_POST['rating'];
$review_date = date('d M Y');
$review_time = date("h:i a");
$review_date_today = date('l');



// echo "<pre>";
// Array
// (
//     [live_url_DN_open] => http://localhost/projects/MyPro1-SubAdmin2-EDITED/
//     [user] => ahmed
//     [suc_log] => Array
//         (
//             [ahmed] => Array
//                 (
//                     [id] => 1
//                     [name] => Owner
//                     [priv] => 300
//                 )

//         )

//     [suc_USER_log] => ahmed
//     [contact_email] => sdfsd@sdfd.dsfsd
// )


// print_r($_POST);


if ($current_user && $selected_productID && $REVIEW) {
    $insert = "INSERT INTO reviews (`user-id`, `product-id`, review, rating, date, time) VALUES 
    ('$current_user','$selected_productID','$REVIEW','$Rating','$review_date','$review_time')";
    $result = $conn->query($insert);

    if ($result) {
        // $last_review_added_ID = $conn->insert_id;
        $selcect_user_who_reviewed = "select image from users where id = $current_user";
        $res_img = $conn->query($selcect_user_who_reviewed);
        $row_img = $res_img->fetch_assoc();
        echo "<hr>
        <div class='media mb-3'>";
?>
        <img class="rounded-circle" src="admin/img/profile/<?= $row_img['image'] ? $row_img['image'] : 'default.jpg' ?>" alt="" width="50">
        <div class="media-body ml-3">
            <h6 class="mb-0 text-uppercase"><?= $_SESSION['suc_USER_log'] ?></h6>
            <p class="small text-muted mb-0 d-inline-flex "><?= $review_date ?></p>
            <p class="small text-muted mb-0 d-inline-flex">||</p>
            <p class="small text-muted mb-0 d-inline-flex "><?= $review_time ?></p>
            <ul class="list-inline mb-1 text-xs">
                <?php
                // $the_RATE = $row_REV['rating'];
                if ($Rating > 0) {
                    $RATING = 5;
                    $empty_RATE = $RATING - $Rating;
                    for ($i = 0; $i < $Rating; $i++) {
                        echo '<li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>';
                    }
                    for ($o = 0; $o < $empty_RATE; $o++) {
                        echo '<li class="list-inline-item m-0"><i class="far fa-star text-warning"></i></li>';
                    }
                }
                ?>
            </ul>
            <p class="h5 mb-0 text-muted"><?= $REVIEW ?></p>
        </div>
        </div>
<?php
    }
    // else {
    //         echo "error";
    //     }
}

// echo $review_date;
// echo $review_date_today;
// echo "1 -" . $current_user;
// echo "2 -" . $selected_productID;
// echo "3 -" . $REVIEW;
// echo "4 -" . $Rating;
// echo "5 -" . $review_time;
