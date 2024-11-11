<?php

require_once "buku.php";
require_once "Database/database.php";

class listbuku{

    public function getData(){
        $db = new database();
        $koneksi = $db->getkoneksi();

        $sql = "SELECT * FROM buku";

        $query = $koneksi->query ($sql);

        $list_buku = [];
        
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                $buku = new buku($row['judul'], $row['pengarang'], $row['penerbit'], $row['tahun']);
                $buku->setid($row['id']);
                //$buku->setid
                array_push($list_buku, $buku);
            }

        }
        
        return $list_buku;
}
}