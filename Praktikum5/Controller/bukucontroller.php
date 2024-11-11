<?php

require_once 'model/listbuku.php';

class bukucontroller{

    public function jalankan(){

        // menggunakan model
        $daftar_buku_model = new listbuku();
        $daftar_buku = $daftar_buku_model->getData();

        // mengirim dan menampilkan data ke view
        include_once "view/bukuview.php";
    }

}