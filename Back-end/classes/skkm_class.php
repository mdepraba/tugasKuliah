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
            case 'gmti':
            case 'kulindus':
                return 2;
            case 'ormawa':
                return 3;
            case 'dies':
                return 2;
            default:
                return 0;
        }
    }
    
    function SkkmIlmiah($value) {
        switch($value) {
            case 'peserta' : return 2;
            case 'anggota' : return 3;
            case 'ketua' : return 5;
            
            case 'pt' : return 3;
            case 'reg' : return 4;
            case 'nas' : return 5;
            case 'inter' :return 6;
        }
    }

    function SkkmMinat($value){
        switch($value) {
            case 'peserta' : return 2;                
            case 'harapan' : return 3;                
            case 'juara3' : return 3;                
            case 'juara2' : return 3;                
            case 'juara1' : return 4;
                
            case 'pt' : return 3;
            case 'reg' : return 4;
            case 'nas' : return 5;
            case 'inter' :return 6;
        }
    }
    
    function SkkmOrganisasi($value){
        switch($value){
            case 'anggota' :
                return 4;
            case 'pengurus' :
                return 5;
            case 'ketua' :
                return 6;
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