<?php 
    require_once "classes/login_class.php";
    require_once "classes/mahasiswa_class.php";
    $log->access();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="src/navbar.css">
    
    <?php include "src/navbar.php" ?>
</head>
<body>
<div class="container mt-5 mr-3 ml-3">
        <h2>Data Mahasiswa</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <td>NIM</td>
                    <td>Nama</td>
                    <td>Jurusan</td>
                    <td>Gender</td>
                    <td>No Hp</td>
                    <td>Alamat</td>
                    <td>Email</td>
                    <td>Foto</td>
                    <td colspan="2" class="text-center">Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $bio = $mhs->biodata_table();
                    foreach($bio as $data):
                ?>
                <tr>
                    <td><?= $data['nim'] ?></td>
                    <td><?= $data['nama_mhs'] ?></td>
                    <td><?= $data['nama_jurusan'] ?></td>
                    <td><?php
                            if($data['gender'] == 1){
                                echo "Laki-laki";
                            }else {
                                echo "Perempuan";
                            }
                        ?>
                    </td>
                    <td><?= $data['no_hp'] ?></td>
                    <td><?= $data['alamat'] ?></td>
                    <td><?= $data['email'] ?></td>
                    
                    <td><a href="uploads/<?= htmlspecialchars($data['nama_foto']) ?>">
                        <img src="uploads/<?= htmlspecialchars($data['nama_foto']) ?>" alt="img" width=20 height 20></a>
                    </td>
                        <td class="td_button" colspan="2">
                            <div>
                                <a href="update.php?nim=<?= $data['nim'] ?>" class="inline-link">
                                    <button class="btn" aria-pressed="true">Edit</button>
                                </a>
                                <form action="src/proses_delete_mhs.php?nim=<?= $data['nim'] ?>"  method="POST" class="inline-form">
                                    <button class="btn" name="submitDelete">Delete</button>
                                </form>
                            </div>
                        </td>
                        
                </tr>
                <?php endforeach ?> 
            </tbody>
        </table>
    </div>
</body>
<style>
    .inline-link{
        display: inline-block;
    }
    .inline-form{
        display: inline-block;
    }
    .btn:hover{
        color: black;
    }
</style>
</html>