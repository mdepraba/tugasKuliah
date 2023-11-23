<?php
require "../classes/mahasiswa_class.php";

$target_dir = "../uploads/";
$uploadOk = 1;

// Check if a file was uploaded
if (isset($_FILES["foto"]["tmp_name"]) && !empty($_FILES["foto"]["tmp_name"])) {
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $nama_foto = basename($_FILES["foto"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check for a real image
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image";
        $uploadOk = 0;
        die;
    }
}

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];


$data = [
    'nim' => $nim,
    'nama' => $nama,
    'jurusan' => $jurusan,
    'gender' => $gender,
    'phone' => $phone,
    'address' => $address,
    'email' => $email,
    'nama_foto' => $nama_foto,
];

    if (isset($_POST['submitInsert'])) {
        $exec = $mhs->insertMahasiswa($data);
        if ($exec) {
            echo "<script>alert('Data berhasil disimpan');window.location='../data_mhs.php';</script>";
        } else {
            echo "<script>alert('Data gagal disimpan');window.location='../update.php';</script>";
        }
    }elseif (isset($_POST['submitUpdate'])) {
        $exec = $mhs->updateMahasiswa($data);
        
        if ($exec) {
            echo "<script>alert('Data berhasil di-update');window.location='../data_mhs.php';</script>";
        } else {
            echo "<script>alert('Data gagal di-update');window.location='../update.php';</script>";
        }
    }
?>
