<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>
<nav class="navbar d-flex navbar-expand-lg navbar-dark">
    <!-- Logo -->
    <div class="navbar-brand">
        <img src="img/jollyroger.png" width="45" height="45"/>
        <label for="" class="brand">MUGIWARA</label> 
    </div>

    <!-- Nav content -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="home.php">
                <i class="material-icons">home</i>
                    Home
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">person</i>
                    Mahasiswa
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="form.php">Formulir Mahasiswa</a>
                    <a class="dropdown-item" href="data_mhs.php">Data Mahasiswa</a>
                    <a class="dropdown-item" href="input_skkm.php">SKKM</a>
                    
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="jurusan.php"><i class="material-icons">school</i> Jurusan</a>
            </li>
            <li class="nav-item">
                <form action="src/proses_login.php" method="POST">
                    <button class="btnLogout" type="submit" name="btnLogout">
                        <i class="material-icons">logout</i>Logout
                    </button>
                </form>
            </li>
            
        </ul>
    </div>
</nav>
</html>