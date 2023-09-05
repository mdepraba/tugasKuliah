<?php
require_once "../classes/login_class.php";
$username = $_POST['username'];
$pass = $_POST['pass'];

$reg_username = $_POST['rUsername'];
$reg_pass = $_POST['rPass'];

if(isset($_POST['sublogin'])){
    $log->login($username, $pass);

}else if(isset($_POST['subregis'])){
    $log->registration($reg_username, $reg_pass);

}else if(isset($_POST['btnLogout'])){
    $log->logout();
}
