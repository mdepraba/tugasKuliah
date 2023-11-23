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
                WHERE b.nim = '$nim'");
        return mysqli_fetch_assoc($qry);
    }

    function skkm_table(){
        $qry = mysqli_query($this->con,"SELECT a.nim,a.nama_mhs,skkm_wajib,skkm_ilmiah,skkm_minat,skkm_organisasi
                FROM mahasiswa a LEFT JOIN skkm b on a.nim = b.nim");
        $data = array();
        while($temp = mysqli_fetch_assoc($qry)){  
            $data[]= $temp;                         
        }
        return $data;
    }

    function SkkmWajib($value) {
        switch ($value) {
            case 'gmti': return 2;
            case 'kulindus': return 2;
            case 'ormawa': return 3;
            case 'dies': return 2;
        }
    }
    
    function SkkmIlmiah($value) {
        switch($value) {
            // Seminar
            case 'peserta_ilmiah' : return 2;
            case 'anggota_ilmiah' : return 3;
            case 'ketua_ilmiah' : return 5;
            // Karya Tulis
            case 'pt_ilmiah' : return 3;
            case 'reg_ilmiah' : return 4;
            case 'nas_ilmiah' : return 5;
            case 'inter_ilmiah' :return 6;

        }
    }

    function SkkmMinat($value){
        switch($value) {
            // Lomba
            case 'peserta_minat' : return 2;                
            case 'harapan_minat' : return 3;                
            case 'juara3_minat' : return 3;                
            case 'juara2_minat' : return 3;                
            case 'juara1_minat' : return 4;
            // Seni/Olahraga
            case 'pt_minat' : return 3;
            case 'reg_minat' : return 4;
            case 'nas_minat' : return 5;
            case 'inter_minat' :return 6;
        }
    }
    
    function SkkmOrganisasi($value){
        switch($value){
            case 'anggota_or' : return 4;
            case 'pengurus_or' : return 5;
            case 'ketua_or' : return 6;
        }
    }
    
    function initializeSkkm($data){
        $qry = mysqli_query($this->con, "INSERT INTO $this->table VALUES (
            '". $data['nim']."',
            '". $data['skkm_wajib']."',
            '". $data['skkm_ilmiah']."',
            '". $data['skkm_minat']."',
            '". $data['skkm_organisasi']."'
        )");
        return $qry;
    }

    function addSkkm($data){
        $qry = mysqli_query($this->con, "UPDATE $this->table SET
                skkm_wajib = skkm_wajib + '{$data['skkm_wajib']}',
                skkm_ilmiah = skkm_ilmiah + '{$data['skkm_ilmiah']}',
                skkm_minat = skkm_minat + '{$data['skkm_minat']}',
                skkm_organisasi = skkm_organisasi + '{$data['skkm_organisasi']}'
                WHERE nim = '{$data['nim']}'");
        return $qry;
        
    }

}
$skkm = new Skkm;