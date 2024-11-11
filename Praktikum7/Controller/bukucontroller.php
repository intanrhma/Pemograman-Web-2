<?php

require_once "Model/ListBuku.php";

class BukuController {

    public function jalankan() {
        // Using the model
        $daftar_buku_model = new ListBuku();
        $daftar_buku = $daftar_buku_model->getData();

        // Send and display data to the View
        include_once "View/BukuView.php";
    }

    public function edit() {
        $id_buku = $_GET['id_buku'];

        $daftar_buku = new ListBuku();
        $buku = $daftar_buku->getBukuById($id_buku);

        if($buku){
            include_once "view/EditBukuView.php";
        }else{
            header("Location: https://localhost/index.php");
        }
    }

    public function update() {
        echo "update";
    }

    public function simpan() {
        // Get values from the add form in BukuView
        if (isset($_POST['judul'], $_POST['pengarang'], $_POST['penerbit'], $_POST['tahun'])) {
            $judul = $_POST['judul'];
            $pengarang = $_POST['pengarang'];
            $penerbit = $_POST['penerbit'];
            $tahun = $_POST['tahun'];

            // Create a book object from the Buku class
            $buku = new Buku($judul, $pengarang, $penerbit, $tahun);

            // Save the book using the simpan method in ListBuku
            $daftar_buku = new ListBuku();
            $status = $daftar_buku->simpan($buku);

            session_start();
            if ($status) {
                $_SESSION['message'] = "Data Buku Dengan Judul '" . $buku->getJudul() . "' Berhasil disimpan";
            } else {
                $_SESSION['error'] = "Data gagal disimpan";
            }

            // Redirect to index.php
            header('Location: http://localhost/index.php');
            exit;
        } else {
            // Handle missing POST data
            session_start();
            $_SESSION['error'] = "Data tidak lengkap";
            header('Location: http://localhost/index.php');
            exit;
        }
    }

    public function hapus() {
        if (isset($_POST['id_buku'])) {
            $id_buku = $_POST['id_buku'];

            

            $daftar_buku = new ListBuku();
            $status = $daftar_buku->hapus($id_buku);

            session_start();
            if ($status) {
                $_SESSION['message'] = "Data buku dengan id '" . $id_buku . "' berhasil dihapus";
            } else {
                $_SESSION['error'] = "Gagal menghapus buku";
            }
        } else {
            session_start();
            $_SESSION['error'] = "id buku tidak ditemukan";
        }

        // Redirect to index.php
        header('Location: http://localhost/index.php');
        exit;
    }
}
