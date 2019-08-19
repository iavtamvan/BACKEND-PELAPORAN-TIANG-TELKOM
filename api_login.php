<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 7/7/2019
 * Time: 8:28 PM
 */

include "config.php";

if ($_GET){

    $username = $_GET['username'];
    $password = $_GET['password'];

    $sql = mysqli_query($db, "Select * from akun where username = '$username' and password = '$password'");
    $user = mysqli_fetch_assoc($sql);

    $id_account = "".$user['id_user'];
    $username = "".$user['username'];
    $rule = "".$user['rule'];

    if ($sql) {
        $response["error"] = false;
        $response["error_msg"] = "Berhasil Login";
        $response["id"] = $id_account;
        $response["username"] = $username;
        $response["rule"] = $rule;
        echo json_encode($response);
    } else{
        $response["error"] = false;
        $response["error_msg"] = "Gagal Mengirim";
        echo json_encode($response);
    }

} else {
    $response["error"] = true;
    $response["error_msg"] = "404";

    echo json_encode($response);
}
?>
