<?php

require_once "database_class.php";

class Skkm extends Database{
    private  $table = 'skkm';
    private $table2 = 'mahasiswa';

    function __construct(){
        parent::__construct();
    }

    function getSkkm($nim){
        $qry = mysqli_query($this->con, "SELECT * FROM $this->table a RIGHT JOIN $this->table2 b on a.nim = b.nim
                WHERE a.nim = '$nim'");
        return mysqli_fetch_assoc($qry);
    }

    function initializeSkkm($data){
        $qry = mysqli_query($this->con, "INSERT INTO $this->table VALUES (
            '". $data['nim']."',
            '". $data['wajib']."',
            '". $data['pilihan']."',
            '". $data['lain']."'
        )");
        return $qry;
    }

    function addSkkm($data){
        // extract($data);
        $qry = mysqli_query($this->con, "UPDATE $this->table SET
                skkm_wajib = skkm_wajib + '{$data['wajib']}',
                skkm_pilihan = skkm_pilihan + '{$data['pilihan']}',
                skkm_lain = skkm_lain + '{$data['lain']}' WHERE nim = '{$data['nim']}'");
        return $qry;
    }
}

$skkm = new Skkm;