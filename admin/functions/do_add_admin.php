<?php
session_start();
$USER_PRIVILEGES_SESSION = $_SESSION['suc_log'][$_SESSION['user']]['priv'];
include('connect.php');

// $name = $_POST['name'];
// $privileges = $_POST['privileges'];
// $password = $_POST['password'];
// echo $privileges;

// Array
// (
//     [ADMINname] => sdf
//     [ADMINpriv] => 1
//     [ADMINpass] => dsssddd
//     [ADMINmail] => gg
//     [ADMIgender] => 0
// )
// print_r($_POST);
extract($_POST);

///////////////////////////////-- VALIDATE funs WALLing --///////////////////////////////
function value_isempty($chkname, $key)
{
    if (empty($chkname)) {
        $_SESSION['errors']['addadmin'][$key] = "empty";
    }
}
//////
function email_VALIDATE($chkname, $key)
{
    if (!filter_var($chkname, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors']['addadmin'][$key] = "true";
    }
}
///////////////////////////////-- VALIDATE funs WALLing --///////////////////////////////

value_isempty($ADMINname, 'user');
value_isempty($ADMINpass, 'password');
value_isempty($ADMINmail, 'email');
// email_VALIDATE($ADMINmail, 'isntEmail');

// $live_url_DN_open = $_SESSION['live_url_DN_open'];



// die();
if (empty($_SESSION['errors']['addadmin'])) {
    $ins = "INSERT INTO admins(name, priv_id, password, email, gender) VALUES ('$ADMINname','$ADMINpriv','$ADMINpass','$ADMINmail','$ADMINgender')";
    $conn->query($ins);
}
$lastAdmin_addedID = $conn->insert_id;
$select_last = "SELECT * FROM admins WHERE id = $lastAdmin_addedID";
$result = $conn->query($select_last);
$res_row = $result->fetch_assoc();
//////
$ADMN_idAAApriv = $res_row['priv_id'];
$sel_privileges = "SELECT * FROM privileges_admins WHERE id = $ADMN_idAAApriv";
$res_idAAApriv = $conn->query($sel_privileges);
$row_idAAApriv = $res_idAAApriv->fetch_assoc();

echo "<tr>";
?>

<th scope="row"><?= $res_row["id"] ?></th>
<td><?= $res_row['name'] ?></td>
<td><?= $res_row['priv_id'] ?></td>
<td> <?= $row_idAAApriv['name'] ?></td>
<td><?= $res_row['email'] ?></td>
<td><?= $res_row['gender'] == 0 ? "Male" : "Female" ?></td>
<td>
    <button <?php
            $unique_user_priv = $row_idAAApriv['priv'];
            if ($USER_PRIVILEGES_SESSION <= $unique_user_priv) {
                echo "disabled";
            } elseif ($USER_PRIVILEGES_SESSION > $unique_user_priv) {
                echo "";
            }
            ?> type="button" class="btn btn-danger" data-toggle="modal" data-target="#REMOVE<?= $res_row['id'] ?>"> Remove </button>
</td>

<?php
echo "</tr>";
?>