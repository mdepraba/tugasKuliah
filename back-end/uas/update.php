<?php
    require_once "classes/login_class.php";
    require_once "classes/mahasiswa_class.php";
    $log->access();

    $nim = $_GET['nim'];
    $data = $mhs->getMhs($nim);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="src/navbar.css">
    
    <?php include "src/navbar.php" ?>
</head>
<body>
<div class="container mt-5">
        <form action="src/proses_update.php" method="POST" enctype="multipart/form-data">
            <h1 class="mb-4">Formulir Biodata</h1>
<!-- nim -->
            <div class="mb-3">
                <label for="nim" class="form-label">NIM (Nomor Induk Mahasiswa)</label>
                <input type="number" class="form-control" id="nim" name="nim" value="<?= $data['nim']?>" readonly>
            </div>
<!-- nama -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama_mhs']?>">
            </div>
<!-- jurusan -->
            <div class="mb-3">
                <label for="jurusan" class="form-label>Jurusan">Jurusan</label>
                <select class="form-select" id="jurusan" name="jurusan">
                    <?php 
                        $jurusan = $jur->list_jurusan('fill');
                        foreach ($jurusan as $j) : 
                    ?>
                        <option <?= ($j['kd_jurusan'] == $data['kd_jurusan']) ? 'selected' : '' ?> value="<?= $j['kd_jurusan'] ?>"><?= $j['nama_jurusan'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
<!-- gender -->        
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <?= $mhs->list_gender($data); ?>
            </div>
<!-- no hp -->        
            <div class="mb-3">
                <label for="phone" class="form-label">No HP</label>
                <input type="number" class="form-control" id="phone" name="phone" value="<?= $data['no_hp']?>">
            </div>
<!-- alamat -->
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="address" name="address" value="<?= $data['alamat']?>">
            </div>
<!-- email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?= $data['email']?>">
            </div>
<!-- foto -->
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <a href="uploads/<?= htmlspecialchars($data['nama_foto']) ?>" target="blank">
                        <img src="uploads/<?= htmlspecialchars($data['nama_foto']) ?>" alt="img" width=20 height 20>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-outline-dark" name="op" value="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
