<?php

class Buku {
    protected $id;
    protected $judul;
    protected $pengarang;
    protected $penerbit;
    protected $tahun;

    // Constructor untuk inisialisasi data buku
    public function __construct($judul, $pengarang, $penerbit, $tahun)
    {
        $this->judul = $judul;
        $this->pengarang = $pengarang;
        $this->penerbit = $penerbit;
        $this->tahun = $tahun;
    }

    // Setter untuk ID
    public function setId($id) {
        $this->id = $id;  // Menyimpan nilai ID ke properti $id
    }

    // Getter untuk ID
    public function getId() {
        return $this->id;  // Mengembalikan nilai ID
    }

    // Getter untuk Judul
    public function getJudul() {
        return $this->judul;
    }

    // Getter untuk Pengarang
    public function getPengarang() {
        return $this->pengarang;
    }

    // Getter untuk Penerbit
    public function getPenerbit() {
        return $this->penerbit;
    }

    // Getter untuk Tahun
    public function getTahun() {
        return $this->tahun;
    }
}
?>
