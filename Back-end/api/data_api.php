<?php
header("Content-Type: aplication/json; charset=UTF-8");
require "../classes/mahasiswa_class.php";

$method = $_SERVER['REQUEST_METHOD'];
// $mhs = new Mahasiswa;
function sendResponse($status, $data = null){
    http_response_code($status);
    echo json_encode($data);
}

if($method == "GET"){
    $data = $mhs->getMhs();
    sendResponse(200, $data);

}elseif($method == "POST"){
    $data = json_decode(file_get_contents("php://input"),true);

    $insert = $mhs->insertMahasiswa($data);

    if($insert){
        $res = "Data berhasil disimpan";
    }else{
        $res = "Data gagal disimpan";
    }
    sendResponse(200, $res);

}elseif($method == "PUT"){              //edit data
    $data = json_decode(file_get_contents("php://input"),true);
    $update = $mhs->updateMahasiswa($data);
    if($update){
        $res = "Data " .$data['nim']. " berhasil diubah";
    }else{
        $res = "Data " .$data['nim']. " gagal diubah";
    }
    sendResponse(200, $res);

}elseif($method == "DELETE"){                   
    $data = json_decode(file_get_contents("php://input"),true);
    $delete = $mhs->deleteMahasiwa($data['nim']);
    if($delete){
        $res = "Data " .$data['nim']. " berhasil dihapus";
    }else{
        $res = "Data " .$data['nim']. " gagal dihapus";
    }
    sendResponse(200, $res);
}