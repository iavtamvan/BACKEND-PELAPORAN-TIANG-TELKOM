<?php
include 'config.php';


if ($_POST) {
    $regID = $_POST['reg_id'];
    $idUser = $_POST['id_user'];
    $sql = mysqli_query($db, "UPDATE akun SET reg_id='$regID' where id_user='$idUser'");
    if ($sql){
        $response["error"] = false;
        $response["error_msg"] = "Berhasil";
        $response["regID"] = $regID;
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
