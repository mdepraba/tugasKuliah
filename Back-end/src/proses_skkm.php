<?php
require_once "../classes/skkm_class.php";

$nim = $_POST['nim'];
$wajib = $_POST['wajib'];
$ilmiah = $_POST['bidang_ilmiah'];
$minat = $_POST['bidang_minat'];
$organisasi = $_POST['organisasi'];

$data = [
    'nim' => $nim,
    'skkm_wajib' => $skkm->SkkmWajib($wajib),
    'skkm_ilmiah' => $skkm->SkkmIlmiah($ilmiah),
    'skkm_minat' => $skkm->SkkmMinat($minat),
    'skkm_organisasi' => $skkm->SkkmOrganisasi($organisasi)
];
// var_dump($data);
// die();
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
