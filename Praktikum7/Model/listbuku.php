<?php

require_once "buku.php";
require_once "database/database.php";

class ListBuku {

    public function getData() {
        // Create an instance of the Database class
        $db = new Database();
        $koneksi = $db->getKoneksi();

        // SQL query to get data from the buku table
        $sql = "SELECT * FROM buku";

        // Execute the query and handle errors
        $query = $koneksi->query($sql);
        
        // Array to hold the list of books
        $list_buku = [];

        // Check if the query was successful and if there are results
        if ($query && $query->num_rows > 0) {
            // Fetch each row of data
            while ($row = $query->fetch_assoc()) {
                // Create a book object based on the fetched data
                $buku = new Buku($row['judul'], $row['pengarang'], $row['penerbit'], $row['tahun']);
                $buku->setid($row['id']);
                
                // If an ID column needs to be set, uncomment this line
                // $buku->setId($row['id']);
                
                // Add the book object to the list
                array_push($list_buku, $buku);
            }
        } else {
            // Handle case when query fails or returns no results
            die("Error executing query: " . $koneksi->error);
        }

        // Return the list of books
        return $list_buku;
    }

    public function getKolomTabel() {
        // Return an array containing the table column names
        return ['id', 'Judul', 'Pengarang', 'Penerbit', 'Tahun', 'Aksi'];
    }

    public function simpan(Buku $buku) {
        $db = new Database();
        $koneksi = $db->getKoneksi();

        // Prepare the SQL statement
        $sql = "INSERT INTO buku (judul, pengarang, penerbit, tahun) VALUES (
            '".$koneksi->real_escape_string($buku->getJudul())."', 
            '".$koneksi->real_escape_string($buku->getPengarang())."', 
            '".$koneksi->real_escape_string($buku->getPenerbit())."', 
            '".$koneksi->real_escape_string($buku->getTahun())."'
        )";

        // Execute the query
        $query = $koneksi->query($sql);

        return $query;
    }

    public function hapus($id) {
        $db = new Database();
        $koneksi = $db->getKoneksi();
        
        // Prepare the SQL statement for deletion
        $sql = "DELETE FROM buku WHERE id = " . intval($id);

        // Execute the query
        $query = $koneksi->query($sql);

        return $query;
    }

    public function update(Buku $buku) {
        $db = new Database();
        $koneksi = $db->getKoneksi();

        // Prepare the SQL statement for updating
        $sql = "UPDATE buku SET 
            judul = '".$koneksi->real_escape_string($buku->getJudul())."', 
            pengarang = '".$koneksi->real_escape_string($buku->getPengarang())."', 
            penerbit = '".$koneksi->real_escape_string($buku->getPenerbit())."', 
            tahun = '".$koneksi->real_escape_string($buku->getTahun())."' 
            WHERE id = " . intval($buku->getId());

        // Execute the query
        $query = $koneksi->query($sql);

        return $query;
    }

    public function getBukuById($id) {
        $db = new Database();
        $koneksi = $db->getKoneksi();

        // Prepare the SQL query to get a book by ID
        $sql = "SELECT * FROM buku WHERE id = " . intval($id);

        $query = $koneksi->query($sql);

        // Check if the query was successful and if a row was returned
        if ($query && $query->num_rows > 0) {
            $data = $query->fetch_assoc();

            // Create a new Buku object and set its properties
            $buku = new Buku($data['judul'], $data['pengarang'], $data['penerbit'], $data['tahun']);
            $buku->setId($data['id']);

            return $buku;
        }

        return false; // Return false if no book was found
    }
}
