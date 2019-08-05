<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 5/5/2019
 * Time: 10:01 PM
 */
include 'config.php';


if ($_POST) {

    $namaLengkap = $_POST['nama_lengkap'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $regID = $_POST['reg_id'];
    $rule = $_POST['rule'];


    $sql = "INSERT INTO akun
(nama_lengkap, username, password, reg_id, rule)
VALUE ('$namaLengkap', '$username', '$password', '$regID','$rule')";

    $query = mysqli_query($db, $sql);
    if ($query){
        $response["error"] = false;
        $response["error_msg"] = "Berhasil Registrasi";
        echo json_encode($response);
    } else{
        $response["error"] = false;
        $response["error_msg"] = "Gagal Mengirim";
        echo json_encode($response);
    }

}
else{
    $response["error"] = true;
    $response["error_msg"] = "404";

    echo json_encode($response);
}
?>