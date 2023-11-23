<?php
require_once "database_class.php";

class Jurusan extends Database{
    private $table = 'jurusan';

    function __construct(){
        parent::__construct();
    }

    function insertJurusan($data){
        $qry = mysqli_query($this->con, "INSERT INTO $this->table VALUES ('". $data['kd_jurusan']."','". $data['nama_jurusan']."')");
        return $qry;
    }

    function updateJurusan($data){
        extract($data);
        $qry = mysqli_query($this->con, "UPDATE $this->table SET 
            kd_jurusan = '$kd_jurusan', 
            nama_jurusan = '$nama_jurusan' 
            WHERE kd_jurusan = '$kd_jurusan'"
        );
        return $qry;
    }

    function deleteJurusan($kd_jurusan){
        $qry = mysqli_query($this->con, "DELETE FROM $this->table WHERE kd_jurusan = '$kd_jurusan'");
        return $qry;
    }

    function getJurusanData($kd_jurusan){
        $qry = mysqli_query($this->con, "SELECT * FROM $this->table WHERE kd_jurusan = '$kd_jurusan'");
        return mysqli_fetch_assoc($qry);
    }

    function list_jurusan(){
        $qry = "SELECT * FROM $this->table";
        $exec = mysqli_query($this->con,$qry);
        
        $data = array();
        while($temp = mysqli_fetch_assoc($exec)){  
            $data[]= $temp;                         
        }
        return $data;
    }
}

$jur = new Jurusan;