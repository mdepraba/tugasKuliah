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
    <title>Jurusan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="" href="style.css">
    <link rel="stylesheet" type="text/css" href="src/navbar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> 
    
    <?php include "src/navbar.php" ?>
</head>
<body>
<!-- tabel jurusan -->
    <div class="container mt-5 mr-3 ml-3">
        <h2>Data Jurusan</h2>
        <table class="table table-striped table-bordered w-50">
            <thead>
                <tr>
                    <td>Kode Jurusan</td>
                    <td>Nama Jurusan</td>
                    <td colspan="2" class="text-center">Action</td>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    $jur->list_jurusan();
                ?>
                <tr>
                    <td><?= $data['kd_jurusan'] ?></td>
                    <td><?= $data['nama_jurusan'] ?></td>
                    <td class="text-center">
                        <form action="jurusan.php?kd_jurusan=<?= $data['kd_jurusan'] ?>" method="GET">
                            <input type="hidden" name="kd_jurusan" value="<?= $data['kd_jurusan'] ?>">
                            <input type="hidden" name="edit" value="true">
                            <button type="submit" name="editBtn">edit</button>
                        </form>
                    </td>
                    <td class="text-center">
                        <form action="src/proses_jurusan.php?kd_jurusan=<?= $data['kd_jurusan'] ?>" method="GET">
                            <input type="hidden" name="kd_jurusan" value="<?= $data['kd_jurusan'] ?>">
                            <input type="hidden" name="del" value="true">
                            <button type="submit" name="delBtn">delete</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="text-center">
                        <form action="jurusan.php" method="GET">
                            <button type="submit" name="addJur"><i class="material-icons">add_circle_outline</i></button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

<!-- Add Jurusan -->
<?php if(isset($_GET['addJur'])){?>
    <div class="container mt-5">
        <form action="src/proses_jurusan.php" method="POST" enctype="multipart/form-data">
            <h2 class="mb-4">Formulir Jurusan</h2>
            <div class="mb-2 w-25">
                <label for="kd_jurusan" class="form-label">Kode Jurusan</label>
                <input type="text" class="form-control" id="kd_jurusan" name="kd_jurusan">
            </div>
            <div class="mb-2 w-25">
                <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
                <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan">
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-outline-dark" name="addJur" value="Simpan">Simpan</button>
        </form>
    </div>


<!-- Edit Jurusan -->
<?php }else if(isset($_GET['editBtn']) && isset($_GET['kd_jurusan'])){
    $kd_jurusan = $_GET['kd_jurusan'];

    $data = $jur->getJurusanData($kd_jurusan);
    if($data){
        $kd_jurusan = $data['kd_jurusan']; 
        $nama_jurusan = $data['nama_jurusan'];
        
?>
    <div class="container mt-5">
        <form action="src/proses_jurusan.php" method="POST" enctype="multipart/form-data">
            <h2 class="mb-4">Update Jurusan</h2>
            <div class="mb-2 w-25">
                <label for="kd_jurusan" class="form-label">Kode Jurusan</label>
                <input type="text" class="form-control" id="kd_jurusan" name="kd_jurusan" value="<?= $data['kd_jurusan'] ?>">
            </div>
            <div class="mb-2 w-25">
                <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
                <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" value="<?= $data['nama_jurusan'] ?>">
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-outline-dark" name="submitJur" value="Simpan">Simpan</button>
        </form>
    </div>
<?php }} ?>
</body>
</html>