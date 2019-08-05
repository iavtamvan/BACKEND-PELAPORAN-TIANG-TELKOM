<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 5/5/2019
 * Time: 10:01 PM
 */
include 'config.php';


if ($_POST) {

    $id_pelapor = $_POST['id_pelapor'];
    $id_user_validator = $_POST['id_user_validator'];
    $status = $_POST['status'];


    $sql = mysqli_query($db,"UPDATE `pelapor` SET `status`='$status', id_user_validator='$id_user_validator' WHERE `id_pelapor`='$id_pelapor'");

    if ($sql){
        $response["error"] = false;
        $response["error_msg"] = "Berhasil";
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