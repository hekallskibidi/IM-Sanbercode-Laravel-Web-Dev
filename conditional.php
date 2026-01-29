<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Function</title>
</head>
<body>
    <h1>Berlatih Function PHP</h1>
    <?php

        echo "<h3>Soal No 1 Greetings</h3>";

        function greetings($nama) {
            echo "Halo $nama, Selamat Datang di Sanbercode!<br>";
        }

        greetings("Bagas");
        greetings("Wahyu");
        greetings("Haikal");

        echo "<br>";

        echo "<h3>Soal No 2 Reverse String</h3>";

        function reverseString($str) {
            $panjang = strlen($str);
            $balik = "";
            for ($i = $panjang - 1; $i >= 0; $i--) {
                $balik .= $str[$i];
            }
            echo $balik . "<br>";
        }

        reverseString("nama peserta");
        reverseString("Sanbercode");
        reverseString("We Are Sanbers Developers");

        echo "<br>";

        echo "<h3>Soal No 3 Tentukan Nilai</h3>";

        function tentukan_nilai($nilai) {
            if ($nilai >= 85 && $nilai <= 100) {
                return "Sangat Baik";
            } elseif ($nilai >= 70 && $nilai < 85) {
                return "Baik";
            } elseif ($nilai >= 60 && $nilai < 70) {
                return "Cukup";
            } else {
                return "Kurang";
            }
        }

        echo tentukan_nilai(98) . "<br>";
        echo tentukan_nilai(76) . "<br>";
        echo tentukan_nilai(67) . "<br>";
        echo tentukan_nilai(43) . "<br>";
    ?>
</body>
</html>