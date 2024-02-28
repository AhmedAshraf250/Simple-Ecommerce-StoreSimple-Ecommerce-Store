<style>
    .gradient-custom {
        /* fallback for old browsers */
        background: #f6d365;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
    }

    .aaa {
        color: white;
    }

    .aaa:hover {
        color: black;
    }
</style>

<?php
$liveuser_id = $_SESSION['suc_USER_log_ID'];
$user_sel = "SELECT * FROM users WHERE id = $liveuser_id";
$res_user = $conn->query($user_sel);
$row = $res_user->fetch_assoc();
?>

<section class="vh-100" style="background-color: #f4f5f7;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-6 ">
                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center text-white " style="border-radius: .5rem">
                            <img src="admin/img/profile/<?= $row['image'] ?>" alt="Avatar" class="img-fluid my-5 rounded-circle shadow-4-strong" style="width: 80px;" />
                            <h5 class="bg-dark rounded-pill"><?= $row['name'] ?></h5>
                            <p>Web Designer</p>
                            <a class="aaa" href="?edit=<?= $row['id'] ?>"><i class="far fa-edit mb-3"></i></a>

                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6>Information</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row d-flex flex-column pt-1">
                                    <div class=" mb-3">
                                        <h6 class="text-warning">Email</h6>
                                        <p class="text-muted"><?= $row['email'] ?></p>
                                    </div>
                                    <div class=" mb-3">
                                        <h6 class="text-warning">gender</h6>
                                        <p class="text-muted"><?= $row['gender']  ?></p>
                                    </div>
                                </div>

                                <!-- <h6>Projects</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Recent</h6>
                                        <p class="text-muted">Lorem ipsum</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Most Viewed</h6>
                                        <p class="text-muted">Dolor sit amet</p>
                                    </div>
                                </div> -->

                                <div class="d-flex">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item"><a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a></li>
                                        <li class="list-inline-item"><a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a></li>
                                        <li class="list-inline-item"><a href="#!"><i class="fab fa-instagram fa-lg"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>