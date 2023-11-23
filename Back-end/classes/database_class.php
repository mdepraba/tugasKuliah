<?php

class Database{
    protected $con;

    public function __construct(){
        $this->con = mysqli_connect("localhost","root","","websp_db");    
    }
}