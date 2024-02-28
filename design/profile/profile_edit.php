<style>
    /* body {
        margin-top: 20px;
        background-color: #f2f6fc;
        color: #69707a;
    } */

    .img-account-profile {
        height: 10rem;
    }


    .rounded-circle {
        border-radius: 50% !important;
    }

    .card {
        box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
    }

    .card .card-header {
        font-weight: 500;
    }

    .card-header:first-child {
        border-radius: 0.35rem 0.35rem 0 0;
    }

    .card-header {
        padding: 1rem 1.35rem;
        margin-bottom: 0;
        background-color: rgba(33, 40, 50, 0.03);
        border-bottom: 1px solid rgba(33, 40, 50, 0.125);
    }

    .form-control,
    .dataTable-input {
        display: block;
        width: 100%;
        padding: 0.875rem 1.125rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1;
        color: #69707a;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #c5ccd6;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.35rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .nav-borders .nav-link.active {
        color: #0061f2;
        border-bottom-color: #0061f2;
    }

    .nav-borders .nav-link {
        color: #69707a;
        border-bottom-width: 0.125rem;
        border-bottom-style: solid;
        border-bottom-color: transparent;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        padding-left: 0;
        padding-right: 0;
        margin-left: 1rem;
        margin-right: 1rem;
    }
</style>

<?php
$current_user_ID = $_GET['edit'];
$sel_this_user = "SELECT * FROM users WHERE id = $current_user_ID";
$res_user = $conn->query($sel_this_user);
$row  = $res_user->fetch_assoc();
?>
<section style=" height: 750px; display: flex; align-items: center">
    <div class="container-xl px-4 mt-4">

        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" href="profile.php">Profile</a>
            <a class="nav-link" href="#" target="__blank">Billing</a>
            <a class="nav-link" href="#" target="__blank">Security</a>
            <a class="nav-link" href="#" target="__blank">Notifications</a>
        </nav>

        <hr class="mt-0 mb-4">

        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle my-3" src="admin/img/profile/<?= $row['image'] ? $row['image'] : 'default.jpg' ?>" alt="">
                        <!-- Profile picture buttons-->
                        <button type="button" class="btn btn-primary d-block mx-auto mt-3" data-toggle="modal" data-target="#uploadProfImg">Upload Your Picture</button>
                        <!-- Modal -->
                        <div id="uploadProfImg" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Upload your Picture</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form -->
                                        <form method='post' action='' enctype="multipart/form-data">
                                            <input class="testtt" type="hidden" name="user-id" value="<?= $row['id'] ?>">
                                            <p class=" text-left">Select Picture:</p>
                                            <input type='file' name='profPic' id='file' class='form-control'><br>
                                            <input type='submit' class='btn btn-primary' value='Upload' id='btn_upload_prof_pic'>
                                        </form>
                                        <!-- Preview-->
                                        <div id='preview'></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form>
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="text-primary mb-1" for="inputUsername">Username <span class="small text-muted">(how your name will appear to other users on the site)</span></label>
                                <input class="form-control" id="inputUsername" type="text" placeholder="<?= $row['name'] ?>">
                            </div>
                            <!-- Form Group (password)-->
                            <div class="mb-3">
                                <label class="text-primary mb-1" for="inputEmailAddress">Password</label>
                                <input class="form-control" id="inputPassword" type="password" placeholder="******">
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="text-primary mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" id="inputEmailAddress" type="email" placeholder="<?= $row['email'] ?>">
                            </div>
                            <!-- Form Row-->
                            <!-- <div class="row gx-3 mb-3"> -->
                            <!-- Form Group (phone number)-->
                            <!-- <div class="col-md-6">
                                            <label class="small mb-1" for="inputPhone">Phone number</label>
                                            <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="555-123-4567">
                                        </div> -->
                            <!-- Form Group (birthday)-->
                            <!-- <div class="col-md-6">
                                            <label class="small mb-1" for="inputBirthday">Birthday</label>
                                            <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="Enter your birthday" value="06/10/1988">
                                        </div> -->
                            <!-- </div> -->
                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="button">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>