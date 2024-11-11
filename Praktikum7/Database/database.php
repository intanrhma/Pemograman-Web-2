<?php

class database{
    protected $host = "localhost";
    protected $username = "root";
    protected $password ="";
    protected $databaseName = "perpustakaan";
    protected $koneksi = null;

    public function __construct(){
        $this->koneksi = new mysqli($this->host, $this->username, $this->password, $this->databaseName);
    }

    public function __desttruct()
    {
        $this->koneksi->close();

    }

    public function getkoneksi(){
        return $this->koneksi;

    }

}