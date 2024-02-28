<?php
session_start();
if (isset($_SESSION['suc_USER_log'])) {
  header("location:index.php");
}
include('functions/connect.php');
// echo "<pre>";
// print_r($_SERVER);
// print_r($_SESSION);
// echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />

  <title>Login</title>
  <style>
    .fffff:hover {
      color: #28a745;
      border-bottom: 1px solid #28a745;
    }
  </style>
</head>

<body>
  <section class="form-01-main">
    <div class="form-cover">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form class="form-sub-main form" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
              <div class="_main_head_as">
                <a href="#">
                  <img src="assets/images/vector.png" />
                </a>
              </div>
              <div class="form-group">
                <input id="username" name="user" class="form-control _ge_de_ol" type="text" placeholder="Enter username" required="" aria-required="true" />
              </div>
              <!-- <div class="form-group">
                  <input
                    id="email"
                    name="email"
                    class="form-control _ge_de_ol"
                    type="text"
                    placeholder="Enter Email"
                    required=""
                    aria-required="true"
                  />
                </div> -->

              <div class="form-group">
                <input id="password" type="password" class="form-control" name="password" placeholder="********" required="required" />
                <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
              </div>

              <?php
              $live_url_DN_open = $_SESSION['live_url_DN_open'];
              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $user = $_POST['user'];
                $pass = $_POST['password'];

                $users_SELECT = "SELECT * FROM users WHERE name = '$user' AND password = '$pass'";
                $result = $conn->query($users_SELECT);
                $num = $result->num_rows;
                $res_row_U = $result->fetch_assoc();

                if ($num == 0) {
                  echo '
                                                            <h3 style="color: red;text-align:center">* للاسف عملية تسجيل الدخول خاطئة  *</h3>
                                                            <h2 class="text-center">:(</h2>
                                                            ';
                } elseif ($num > 0) {
                  $_SESSION['suc_USER_log'] = $user;
                  $_SESSION['suc_USER_log_ID'] = $res_row_U['id'];

                  if ($live_url_DN_open) {

                    header("location:$_SESSION[live_url_DN_open]"); //!!!!!!!!!!!!!!!!!!!!!
                  } else {

                    header("Location:../index.php");
                  }
                }
              }
              ?>

              <div class="form-group">
                <div class="check_box_main">
                  <a href="#" class="pas-text fffff">Forgot Password ?!</a>
                </div>
              </div>
              <hr />
              <div class="form-group">
                <div class="check_box_main">
                  <a href="register.php" class="pas-text fffff">Create an Account!</a>
                </div>
              </div>
              <hr />
              <input type="submit" value="Login" class="btn btn-success btn-user btn-block">
              <!-- <div class="form-group">
                <div class="btn_uy">
                  <button type="submit"><a href="#"><span>Login</span></a></button>
                </div>
                <div class="form-group">
                  <div class="btn_uy">
                    <a href="#"><span>Login</span></a>
                  </div>
                </div>
              </div> -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>