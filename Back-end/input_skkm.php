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
                <form action="input_skkm.php?nim=<?= $data['nim'] ?>" method="GET">
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
    <form action="src/proses_skkm.php" method="POST" enctype="multipart/form-data">
        <h1 class="mb-4">Input SKKM</h1>

        <!-- nim -->
        <div class="mb-3 w-25">
            <label for="nim" class="form-label">NIM (Nomor Induk Mahasiswa)</label>
            <input type="number" class="form-control" id="nim" name="nim" value="<?= $data['nim'] ?>" readonly>
        </div>

        <!-- wajib (dropdown) -->
        <div class="mb-3 w-25">
            <label for="wajib" class="form-label">Wajib</label>
            <select class="selectpicker form-control" id="wajib" name="wajib" title="Select">
                <option class="special" value="gmti">GMTI</option>
                <option class="special" value="kulindus">Kulindus</option>
                <option class="special" value="dies">Dies Natalis</option>
            </select>
        </div>

        <!-- bidang_ilmiah (dropdown) -->
        <div class="mb-3 w-25">
            <label for="bidang_ilmiah" class="form-label">Bidang Ilmiah</label>
            <select class="selectpicker form-control" name="bidang_ilmiah" id="bidang_ilmiah" title="Select" >
                <optgroup label="Seminar" name="seminar">
                    <option value="peserta" class="special">Peserta Seminar</option>
                    <option value="anggota" class="special">Anggota Kepanitiaan</option>
                    <option value="ketua" class="special">Ketua Panitia</option>
                </optgroup>
                <optgroup label="Karya Tulis" name="kartul">
                    <option value="pt" class="special">Tingkat Perguruan Tinggi</option>
                    <option value="req" class="special">Tingkat Regional</option>
                    <option value="nas" class="special">Tingkat Nasional</option>
                    <option value="inter" class="special">Tingkat Internasional</option>
                </optgroup>
            </select>
        </div>

        <!-- bidang_minat (dropdown) -->
        <div class="mb-3 w-25">
            <label for="bidang_minat" class="form-label">Bidang Minat</label>
            <select class="selectpicker form-control" name="bidang_minat" title="Select">
                <optgroup label="Lomba" name="lomba">                        
                    <option  class="special" value="peserta">Peserta Lomba</option>
                    <option  class="special" value="harapan">Harapan</option>
                    <option  class="special" value="juara3">Juara 3</option>
                    <option  class="special" value="juara2">Juara 2</option>
                    <option  class="special" value="juara1">Juara 1</option>                    
                </optgroup>
                <optgroup label="Seni/Olahraga" name="seni">
                    <option  class="special" value="pt">Tingkat Perguruan Tinggi</option>
                    <option  class="special" value="req">Tingkat Regional</option>
                    <option  class="special" value="nas">Tingkat Nasional</option>
                    <option  class="special" value="inter">Tingkat Internasional</option>
                </optgroup>
                <optgroup>
                    <option  class="special" value="anggota">Anggota</option>
                    <option  class="special" value="pengurus">Pengurus</option>
                    <option  class="special" value="ketua">Ketua</option>
                </optgroup>
            </select>
        </div>

        <!-- organisasi (dropdown) -->
        <div class="mb-3 w-25">
            <label for="organisasi" class="form-label">Organisasi</label>
            <select class="selectpicker form-control" id="organisasi" name="organisasi" title="Select">
                <option  class="special" value="anggota">Anggota</option>
                <option  class="special" value="pengurus">Pengurus</option>
                <option  class="special" value="ketua">Ketua</option>
            </select>
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