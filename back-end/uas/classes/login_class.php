<?php
require_once "database_class.php";

class Login extends Database{
    private $table = 'user';
    
    function __construct(){
        parent::__construct();
    }

    function login($username, $pass){
        // $username = $_POST['username'];
        // $pass = $_POST['pass'];
        $qry = mysqli_query($this->con,"SELECT * FROM $this->table WHERE username = '$username' AND password = '$pass'");
        $data = mysqli_fetch_assoc($qry);
        if($data){
            session_start();
            $_SESSION['username'] = $data['username'];
            echo "<script>alert('Login berhasil');</script>";
            header('Location: ../home.php');
            exit;
        }else {
            echo "<script>alert('Login gagal');window.location='../login.php';</script>";
        }
    }

    function registration($reg_username, $reg_pass){
        // $reg_username = $_POST['rUsername'];
        // $reg_pass = $_POST['rPass'];

        $qry = mysqli_query($this->con,"INSERT INTO $this->table VALUES ('$reg_username','$reg_pass')");
        $datareg = mysqli_fetch_assoc($qry);
        if($datareg){
            echo "<script>alert('Berhasil mendaftar');window.location='../login.php';</script>";
        }else {
            echo "<script>alert('Gagal mendaftar');window.location='../login.php';</script>";
        }
    }

    function access(){
        session_start();
        if(empty($_SESSION['username'])){
            echo "<script>alert('Silahkan login terlebih dahulu');window.location='login.php';</script>";
        };
    }

    function logout(){
        session_start();
        session_destroy();
        echo "<script>alert('Berhasil logout');window.location='login.php';</script>";
    }
}
$log = new Login;
