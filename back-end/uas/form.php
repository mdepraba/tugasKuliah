<?php 
    require_once "classes/login_class.php";
    require_once "classes/jurusan_class.php";
    $log->access();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="src/navbar.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <?php include "src/navbar.php" ?>
</head>
<body>
    <div class="container mt-5">
        <form action="src/proses_mahasiswa.php" method="POST" enctype="multipart/form-data">
            <h1 class="mb-4">Formulir Biodata</h1>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM (Nomor Induk Mahasiswa)</label>
                <input type="number" class="form-control" id="nim" name="nim">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select class="form-select" id="jurusan" name="jurusan">
                    <?php 
                        $jurusan = $jur->list_jurusan();
                        foreach ($jurusan as $j) : 
                    ?>
                        <option <?= ($j['kd_jurusan'] == $data['kd_jurusan']) ? 'selected' : '' ?> value="<?= $j['kd_jurusan'] ?>"><?= $j['nama_jurusan'] ?></option>
                    <?php endforeach ?>
                </select>
                
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="1">
                    <label class="form-check-label" for="pria">Laki-Laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="0">
                    <label class="form-check-label form-secondary" for="wanita">Perempuan</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">No HP</label>
                <input type="number" class="form-control" id="phone" name="phone">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-outline-dark" name="submit" value="Simpan">Simpan</button>
        </form>
    </div>

    
</body>
</html>