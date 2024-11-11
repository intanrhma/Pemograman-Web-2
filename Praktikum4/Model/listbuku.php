<?php

require_once "buku.php";

class listbuku{

    public function getData(){
        $list_buku = array(
            new Buku('Belajar PHP Dasar', 'Minhyung', 'Informatika', '2005'),
            new Buku('Pukul Setengah Lima', 'Ntsana', 'Novel Fiksi', '2023'),
            new Buku('Kalkulus', 'BIBI', 'Informatika', '2000'),
            new Buku('Metode Penelitian', 'GIGI', 'Informatika', '2008'),
        );

        return $list_buku;
    }
}