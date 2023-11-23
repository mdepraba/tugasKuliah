<?php
require_once "../classes/skkm_class_trial.php";

$nim = $_POST['nim'];
$skkm = $_POST['skkm'];
$tanggal = $_POST['tanggal'];
$keterangan = $_POST['keterangan'];

$data = [
    'nim' => $nim,
    // 'skkm_wajib' => $skkm->SkkmWajib($skkm), 
    'skkm_ilmiah' => $skkm->SkkmIlmiah($skkm),
    'skkm_minat' => $skkm->SkkmMinat($skkm),
    'skkm_organisasi' => $skkm->SkkmOrganisasi($skkm)
];
var_dump($data);
die();
if (isset($_POST['submit'])) {
    $getdata = $skkm->getSkkm($data['nim']);

    if ($getdata === null) {
        $exec = $skkm->initializeSkkm($data);
    } else {
        $exec = $skkm->addSkkm($data);
    }

    if ($exec) {
        echo "<script>alert('Data berhasil disimpan');window.location='../input_skkm.php';</script>";
    } else {
        echo "<script>alert('Data gagal disimpan');window.location='../input_skkm.php';</script>";
    }
}
