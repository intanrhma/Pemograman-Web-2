<?php 
include "orang.php";
include "visibility.php";
include "nilai.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum2</title>
</head>
<body>
    <h1> Praktikum2 </h1>
    <div>
        <?php
            $nakedbibi = new orang();
            $nakedbibi->nama = " BIBI";

            $nakedbibi->ucapSalam();

            $eloise = new orang();
            $eloise->nama = "  Eloise Bridgerton";
            $eloise->ucapSalam();

            $molen = new orang();
            //$molen->nama = "Molen";
            $molen->ucapSalam();

            echo "<br>";

            $visibility = new visibility();
            $visibility->tampilkanPropety();

            echo "ini di luar kelas <br>";
            echo "public : ". $visibility->public. '<br>';
            echo "protected : ". $visibility->protected. '<br>';
            echo "private : ". $visibility->private. '<br>';

            echo "<br> <br>";

            echo "Nilai MK Pemograman WEB: <br>";
            $nilai = new Nilai();
            $nilai->setTugas(79);
            $nilai->setUts(90);
            $nilai->setUas(89);

            echo "Nilai UTS : ". $nilai->getUts() . "<br>";
            echo "Nilai UAS: ". $nilai->getUas() . "<br>";
            echo "Nilai Tugas : ". $nilai->getTugas() . "<br>";
            echo "Total Nilai : ". $nilai->hitungTotal() . "<br>";
        ?>
    </div>
</body>
</html>