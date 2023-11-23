<?php
    require_once "classes/login_class.php";
    require_once "classes/skkm_class.php";
    $log->access();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input SKKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" 
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" 
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="src/navbar.css">
    
    <style>
        .selectpicker{
            font-
        }
    </style>
    
    <?php include "src/navbar.php" ?>
</head>
<body>      
<!-- table data SKKM mahasiswa -->
<div class="container mt-5 mr-4 ml-3">
    <h2>Data Mahasiswa</h2>
    <table class="table table-bordered mr-3">
        <thead class="thead-dark">
            <tr>
                <td>NIM</td>
                <td>Nama</td>
                <td>Wajib</td>
                <td>Ilmiah</td>
                <td>Minat</td>
                <td>Organisasi</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php 
                $data = $skkm->skkm_table();
                foreach($data as $data):
            ?>
            <tr>
                <td><?= $data['nim'] ?></td>
                <td><?= $data['nama_mhs'] ?></td>
                <td><?= $data['skkm_wajib'] ?></td>
                <td><?= $data['skkm_ilmiah'] ?></td>
                <td><?= $data['skkm_minat'] ?></td>
                <td><?= $data['skkm_organisasi'] ?></td>
                <td>
                <form action="input_skkm_trial.php?nim=<?= $data['nim'] ?>" method="GET">
                    <input type="hidden" name="nim" value="<?= $data['nim'] ?>">
                    <button type="submit" name="submit1">Tambah</button>
                </form>
                </td>
            <?php endforeach ?>
            </tr>
        </tbody>
    </table>
</div>

<?php 
if(isset($_GET['submit1'])):
    $nim = $_GET['nim'];
    $data = $skkm->getSkkm($nim);
?>
<div class="container mt-5">
    <form action="src/proses_skkm_trial.php" method="POST" enctype="multipart/form-data">
        <h1 class="mb-4">Input SKKM</h1>

        <!-- nim -->
        <div class="mb-3 w-25">
            <label for="nim" class="form-label">NIM (Nomor Induk Mahasiswa)</label>
            <input type="number" class="form-control" id="nim" name="nim" value="<?= $data['nim'] ?>" readonly>
        </div>

        <!-- bidang_ilmiah (dropdown) -->
        <div class="mb-3 w-25">
            <label for="bidang_ilmiah" class="form-label">Bidang Ilmiah</label>
            <select class="selectpicker form-control" name="skkm" id="skkm" title="Select" >
                <optgroup name="wajib">
                    <option class="special" value="gmti">GMTI</option>
                    <option class="special" value="kulindus">Kulindus</option>
                    <option class="special" value="dies">Dies Natalis</option>
                </optgroup>
                <optgroup label="Seminar" name="bidang_ilmiah">
                    <option value="peserta_ilmiah" class="special">Peserta Seminar</option>
                    <option value="anggota_ilmiah" class="special">Anggota Kepanitiaan</option>
                    <option value="ketua_ilmiah" class="special">Ketua Panitia</option>
                </optgroup>
                <optgroup label="Karya Tulis" name="bidang_ilmiah">
                    <option value="pt_ilmiah" class="special">Tingkat Perguruan Tinggi</option>
                    <option value="req_ilmiah" class="special">Tingkat Regional</option>
                    <option value="nas_ilmiah" class="special">Tingkat Nasional</option>
                    <option value="inter_ilmiah" class="special">Tingkat Internasional</option>
                </optgroup>
                <optgroup label="Lomba" name="bidang_minat">                        
                    <option  class="special" value="peserta_minat">Peserta Lomba</option>
                    <option  class="special" value="harapan_minat">Harapan</option>
                    <option  class="special" value="juara3_minat">Juara 3</option>
                    <option  class="special" value="juara2_minat">Juara 2</option>
                    <option  class="special" value="juara1_minat">Juara 1</option>                    
                </optgroup>
                <optgroup label="Seni/Olahraga" name="bidang_minat">
                    <option  class="special" value="pt_minat">Tingkat Perguruan Tinggi</option>
                    <option  class="special" value="req_minat">Tingkat Regional</option>
                    <option  class="special" value="nas_minat">Tingkat Nasional</option>
                    <option  class="special" value="inter_minat">Tingkat Internasional</option>
                </optgroup>
                <optgroup label="Ormawa" name="Ormawa">
                    <option  class="special" value="anggota_or">Anggota</option>
                    <option  class="special" value="pengurus_or">Pengurus</option>
                    <option  class="special" value="ketua_or">Ketua</option>
                </optgroup>
                <select name="alskdan" id="">
                    <option value="asda">asdasdasd</option>
                </select>
            </select>
        </div>

        <!-- tanggal -->
        <div class="mb-3 w-25">
            <label for="tanggal" class="form-label">Tanggal Kegiatan</label>
            <input type="date" id="tanggal" class="form-control" name="tanggal">
        </div>

        <!-- keterangan -->
        <div class="mb-3 w-25">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" cols="60" rows="5" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-outline-dark" name="submit" value="Simpan">Simpan</button>
    </form>
</div>

<?php endif ?>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<style>
    .inline-form1{
        display: inline-block;
    }
    .inline-form2{
        display: inline-block;
    }
    .inline-form1{
        display: inline-block;
    }
    .special{
        color: black; 
        background: whitesmoke;
    }
    .bootstrap-select > .dropdown-toggle {
        background: #FFF;
        color: #000;
        border-color: #999;
    }
</style>
</html>