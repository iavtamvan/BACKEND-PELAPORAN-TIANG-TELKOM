<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 5/5/2019
 * Time: 10:01 PM
 */
include 'config.php';


if ($_POST) {

    $url_image = $_POST['url_image'];
//    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $alamat = $_POST['alamat'];
    $idAKun = $_POST['id_user_akun'];


    $sql = "INSERT INTO pelapor
(url_image, deskripsi, alamat, status, id_user_akun)
VALUE ('$url_image', '$deskripsi', '$alamat', 'Belum Disetujui', '$idAKun')";

    $query = mysqli_query($db, $sql);
    if ($query){
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