<?php
    require_once "../classes/mahasiswa_class.php";
    $nim = $_GET['nim'];
    
    if (isset($_POST['submitDelete'])) {

        $exec = $mhs->deleteMahasiwa($nim);
        if ($exec) {
            echo "<script>alert('Data berhasil di-delete');window.location='../data_mhs.php';</script>";
        } else {
            echo "<script>alert('Data gagal di-delete');window.location='../data_mhs.php';</script>";
        }
    }