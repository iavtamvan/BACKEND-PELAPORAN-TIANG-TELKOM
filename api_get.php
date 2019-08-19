<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 6/18/2019
 * Time: 11:33 PM
 */

include 'config.php';

if ($_GET){
    $change = $_GET['change'];

    switch ($change){
        case "dataPelapor" : //untuk validator
            $sql = mysqli_query($db, "Select * from pelapor where status='Belum Disetujui' || status ='Sedang Dalam Perbaikan'");
            $arrayJson = array();

            while($data = mysqli_fetch_assoc($sql)){
                $arrayJson[] = $data;
            }
            $response = $arrayJson;
            echo json_encode($response);
            break;
        case "onProgress" : // untuk validator | history
            $idUser = $_GET['id_user_validator'];
            $sql = mysqli_query($db, "Select * from pelapor where (status ='Sedang Dalam Perbaikan' || status = 'Sudah Diselesaikan' || status ='Ditolak Validator' || status='Disetujui Validator') AND id_user_validator='$idUser'");
//            $sql = mysqli_query($db, "Select * from pelapor where status ='Sedang Dalam Perbaikan' || status = 'Sudah Diselesaikan' where id_user = '$idUser'");
            $arrayJson = array();

            while($data = mysqli_fetch_assoc($sql)){
                $arrayJson[] = $data;
            }
            $response = $arrayJson;
            echo json_encode($response);
            break;

        case "disetujuiValidator" : //untuk teknisi
            $sql = mysqli_query($db, "Select * from pelapor where status ='Disetujui Validator' || status='Sedang Dalam Perbaikan'");
            $arrayJson = array();

            while($data = mysqli_fetch_assoc($sql)){
                $arrayJson[] = $data;
            }
            $response = $arrayJson;
            echo json_encode($response);
            break;
        case "historiTeknisi" : //untuk teknisi
            $idUser = $_GET['id_user_teknisi'];
            $sql = mysqli_query($db, "Select * from pelapor where id_user_teknisi ='$idUser'");
            $arrayJson = array();

            while($data = mysqli_fetch_assoc($sql)){
                $arrayJson[] = $data;
            }
            $response = $arrayJson;
            echo json_encode($response);
            break;

        case "historiPelapor" : //untuk teknisi
            $idUser = $_GET['id_user_akun'];
            $sql = mysqli_query($db, "Select * from pelapor where id_user_akun ='$idUser'");
            $arrayJson = array();

            while($data = mysqli_fetch_assoc($sql)){
                $arrayJson[] = $data;
            }
            $response = $arrayJson;
            echo json_encode($response);
            break;

        case "getTokenRegID" : //untuk mengirim notif
            $idUser = $_GET['id_user'];
            $sql = mysqli_query($db, "Select * from akun where id_user ='$idUser'");
            $user = mysqli_fetch_assoc($sql);
            $regID = "".$user['reg_id'];

            $response["error"] = false;
            $response["error_msg"] = "Fetch";
            $response["regID"] = $regID;

//            $arrayJson = array();
//
//            while($data = mysqli_fetch_assoc($sql)){
//                $arrayJson[] = $data;
//            }
//            $response = $arrayJson;
            echo json_encode($response);
            break;

    }
}



?>
