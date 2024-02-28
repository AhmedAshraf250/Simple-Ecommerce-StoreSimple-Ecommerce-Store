<?php
// print_r($_SESSION);
// echo $USER_PRIVILEGES_SESSION;
?>
<form method="POST" action="functions/do_add_admin.php">


    <div class="form-group">
        <label for="name" style="font-weight: bold;"> Name :</label>
        <input type="text" class="form-control" name="name">
    </div>

    <div class="form-group">
        <label for="privileges" style="font-weight: bold;"> Privileges :</label>
        <select class="form-control" name="privileges">
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
        <input type="password" class="form-control" name="password">
    </div>

    <div class="form-group">
        <label for="email" style="font-weight: bold;"> Email :</label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="form-check ">
        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="0" checked>
        <label class="form-check-label" for="inlineRadio1">Male</label>
    </div>
    <div class="form-check ">
        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="1">
        <label class="form-check-label" for="inlineRadio1">Female</label>
    </div>

    <input type="submit" value="Add ADMIN" class="form-control btn btn-success mt-2">
</form>