<?php

require_once "database_class.php";

class Mahasiswa extends Database{

    private $table = 'mahasiswa';

    function __construct(){
        parent::__construct();
    }

    function insertMahasiswa($data){
        $qry = mysqli_query($this->con, "INSERT INTO $this->table VALUES (
            '". $data['nim']."',
            '". $data['nama']."',
            '". $data['jurusan']."',
            '". $data['gender']."',
            '". $data['phone']."',
            '". $data['address']."',
            '". $data['email']."',
            '". $data['nama_foto']."')
        ");
        return $qry;
    }


    function updateMahasiswa($data){
        extract($data);
            // variable diambil dari array $data proses_update
        if(isset($nama_foto)){
            $qry = mysqli_query($this->con, "UPDATE mahasiswa SET
                nama_mhs = '$nama',
                kd_jurusan = '$jurusan',
                gender = '$gender',
                no_hp = '$phone',
                alamat = '$address',
                email = '$email',
                nama_foto = '$nama_foto'
                WHERE nim = '$nim'");
        }else {
            $qry = mysqli_query($this->con, "UPDATE mahasiswa SET
                nama_mhs = '$nama',
                kd_jurusan = '$jurusan',
                gender = '$gender',
                no_hp = '$phone',
                alamat = '$address',
                email = '$email'
                WHERE nim = '$nim'");
        }
        return $qry;
    }

    function deleteMahasiwa($nim){
        $qry = mysqli_query($this->con, "DELETE FROM $this->table WHERE nim = '$nim'");
        return $qry;
    }
    function getMhs($nim){
        $data=[];
        $qry = mysqli_query($this->con,"SELECT * FROM $this->table WHERE nim = '$nim'");
        $data = mysqli_fetch_assoc($qry);
        return $data;
    }

    function biodata_table(){
        $qry = mysqli_query($this->con, "SELECT nim,nama_mhs,nama_jurusan,gender,no_hp,alamat,email,nama_foto 
               FROM mahasiswa a LEFT JOIN jurusan b on a.kd_jurusan = b.kd_jurusan");

        $data = array();
        while ($temp = mysqli_fetch_assoc($qry)){
            $data[] = $temp;
        }
        return $data;
    }

    function list_gender($data){
        if ($data['gender'] == 1) {
            echo '<div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="1" checked>
                    <label class="form-check-label" for="pria">Laki-Laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="0">
                    <label class="form-check-label form-secondary" for="wanita">Perempuan</label>
                </div>';
        }else {
            echo '<div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="1">
                    <label class="form-check-label" for="pria">Laki-Laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="0" checked>
                    <label class="form-check-label form-secondary" for="wanita">Perempuan</label>
                </div>';
        }
    }
}

$mhs = new Mahasiswa;