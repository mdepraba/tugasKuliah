<?php
require "../classes/jurusan_class.php";

$kd_jurusan = $_POST['kd_jurusan'];
$nama_jurusan = $_POST['nama_jurusan'];

$data = [
    'kd_jurusan' => $kd_jurusan,
    'nama_jurusan' => $nama_jurusan
];

if(isset($_POST['addJur'])){
    $exec = $jur->insertJurusan($data);

    if($exec){
        echo "<script>alert('Data berhasil disimpan');window.location='../jurusan.php';</script>";
    }else {
        echo "<script>alert('Data gagal disimpan');window.location='../jurusan.php';</script>";
    }
}

// update
if(isset($_POST['submitJur']) && isset($_POST['kd_jurusan'])){
    $exec = $jur->updateJurusan($data);

    if($exec){
        echo "<script>alert('Data berhasil diubah');window.location='../jurusan.php';</script>";
    }else{
        echo "<script>alert('Data gagal diubah');window.location='../jurusan.php';</script>";
    }

// delete
}else if(isset($_GET['delBtn']) && isset($_GET['kd_jurusan'])){
    $kd_jurusan = $_GET['kd_jurusan'];
    
    $exe= $jur->deleteJurusan($kd_jurusan);

    if($exe){
        echo "<script>alert('Data berhasil dihapus');window.location='../jurusan.php';</script>";
    }
    else{
        echo "<script>alert('Data gagal dihapus');window.location='../jurusan.php';</script>";
    }
}