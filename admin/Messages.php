<?php
$status = "messages";
include("includes/head-sidebar.php");
include("includes/topbar.php");
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-gray-800">Messages</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark bg-info">
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>phone</th>
                        <th>email</th>
                        <th>view</th>
                        <th>controlls</th>
                    </tr>
                </thead>
                <tbody>
                    <?php


                    $sel_mes = "SELECT * FROM messages";
                    $query = $conn->query($sel_mes);
                    $id = 0;
                    foreach ($query as $message) {



                    ?>
                        <tr>
                            <td><?= ++$id ?></td>
                            <td><?= $message['name'] ?></td>
                            <td><?= $message['phone'] ?></td>
                            <td><?= $message['email'] ?></td>
                            <td class="view <?= $message['view'] == 0 ? 'text-danger' : 'text-success' ?> "><?=

                                                                                                            $message['view'] == 0 ? 'unRead' : 'Read';

                                                                                                            ?></td>
                            <td>
                                <!-- Button trigger modal -->
                                <button data-id="<?= $message['id'] ?>" type="button" class="btn btn-primary modalbtn" data-toggle="modal" data-target="#MSG_MODAL<?= $message['id'] ?>">
                                    show message
                                </button>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>




        </div>
    </div>

</div> <!--/.main-->


<?php include("includes/footer.php") ?>