<?php
@$errors = $_SESSION['errors']['addadmin'];
?>
<table class="table  table-hover table-bordered text-center " style="align-items: center;">
    <thead class="thead-dark bg-info">
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">pr-id</th>
            <th scope="col">Privileges</th>
            <th scope="col">Email</th>
            <th scope="col">Gender</th>
            <th scope="col">Controls</th>
        </tr>
    </thead>

    <tbody>

        <?php
        $select = "SELECT * FROM admins ";
        $result = $conn->query($select);

        while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <th scope="row"><?= $row['id'] ?></th>
                <td><?= $row['name'] ?></td>
                <td><?= $row['priv_id'] ?></td>
                <td>
                    <?php
                    $ADMN_idAAApriv = $row['priv_id'];
                    $sel_privileges = "SELECT * FROM privileges_admins WHERE id = $ADMN_idAAApriv";
                    $res_idAAApriv = $conn->query($sel_privileges);
                    $row_idAAApriv = $res_idAAApriv->fetch_assoc();
                    echo $row_idAAApriv['name'];
                    ?>
                </td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['gender'] == 0 ? "Male" : "Female" ?></td>
                <td>
                    <button <?php
                            $unique_user_priv = $row_idAAApriv['priv'];
                            if ($USER_PRIVILEGES_SESSION <= $unique_user_priv) {
                                echo "disabled";
                            } elseif ($USER_PRIVILEGES_SESSION > $unique_user_priv) {
                                echo "";
                            }
                            ?> type="button" class="btn btn-danger" data-toggle="modal" data-target="#REMOVE<?= $row['id'] ?>"> Remove </button>
                </td>
            </tr>


            <!-- Remove Admin Modal-->
            <div class=" modal fade" id="REMOVE<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Are You Sure?</h5>
                        </div>
                        <div class="modal-body">To delete this?</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a href="functions/delete_admin.php?id=<?= $row['id']  ?>"><button class="btn btn-danger"> Delete </button></a>
                        </div>
                    </div>
                </div>

            <?php
        }
            ?>


    </tbody>
</table>
<div class=" col-lg-6 mb-4">
    <a href="?action=add"><button class="btn btn-success"> Add Admin For site ? </button></a>
</div>
<!-- --------------------------------------------------------------------------------------------- -->
<div class=" col-lg-6 mb-4">
    <!-- <a href="#"><button class="btn btn-success"> Modal for add Admins </button></a> -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Modal for add Admins</button>
</div>

<!-- Modal for add Admins -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title  text-success" id="exampleModalLabel">Add new ADMIN</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action="functions/do_add_admin.php">
                    <div class="form-group">
                        <label for="name" style="font-weight: bold;"> Name :</label>
                        <input type="text" class="form-control ADMINname" name="ADMINname">
                        <p class="err-msg">
                            <?php
                            if (isset($errors['user'])) {
                                if ($errors['user'] === 'empty') {
                                    echo "**" . "تأكد من عدم ترك احد حقول الاسم فارعة";
                                    unset($_SESSION['errors']['addadmin']);
                                }
                            }
                            ?>
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="privileges" style="font-weight: bold;"> Privileges :</label>
                        <select class="form-control ADMINpriv" name="ADMINpriv">
                            <?php
                            $sel_privileges = "SELECT * FROM privileges_admins WHERE priv <= '$USER_PRIVILEGES_SESSION'";
                            $res_idAAApriv = $conn->query($sel_privileges);
                            while ($row_idAAApriv = $res_idAAApriv->fetch_assoc()) { ?>
                                <option value="<?= $row_idAAApriv['id'] ?>"><?= $row_idAAApriv['name'] ?></option>

                            <?php
                            }
                            ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="password" style="font-weight: bold;"> Make A password for him :</label>
                        <input type="password" class="form-control ADMINpass" name="ADMINpass">
                        <p class="err-msg">
                            <?php
                            if (isset($errors['password'])) {
                                if ($errors['password'] === 'empty') {
                                    echo "**" . "لم يتم إدخال الرقم السرى";
                                    unset($_SESSION['errors']['addadmin']);
                                }
                            }
                            ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="email" style="font-weight: bold;"> Email :</label>
                        <input type="email" class="form-control ADMINmail" name="ADMINmail">
                        <p class="err-msg">
                            <?php
                            if (isset($errors['email'])) {
                                if ($errors['email'] === 'empty') {
                                    echo "**" . "لم يتم إدخال البريد الإلكترونى";
                                    unset($_SESSION['errors']['addadmin']);
                                }
                            } elseif (isset($errors['isntEmail'])) {
                                if ($errors['isntEmail'] === 'true') {
                                    echo "**" . " بريد إلكترونى غير صالح !! ";
                                    unset($_SESSION['errors']['addadmin']);
                                }
                            }
                            ?>
                        </p>
                    </div>

                    <div class="form-check ">
                        <input class="form-check-input ADMINgender" type="radio" name="ADMINgender" id="inlineRadio1" value="0" checked>
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check ">
                        <input class="form-check-input ADMINgender" type="radio" name="ADMINgender" id="inlineRadio2" value="1">
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>

                    <input type="button" value="Add ADMIN" class="form-control btn btn-success mt-2 addAdmin">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary closeAdmin" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal for add Admins -->



<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div> -->
<?php
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
?>