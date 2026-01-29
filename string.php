<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>String PHP</title>
</head>
<body>
    <h1>Berlatih String PHP</h1>
    <?php   
        echo "<h3>Soal No 1</h3>";

        $first_sentence = "Hello PHP!";
        $second_sentence = "I'm ready for the challenges";
        
        echo "Panjang string pertama: " . strlen($first_sentence) . ", Jumlah kata: " . str_word_count($first_sentence) . "<br>";
        echo "Panjang string kedua: " . strlen($second_sentence) . ", Jumlah kata: " . str_word_count($second_sentence) . "<br>";

        echo "<h3>Soal No 2</h3>";

        $string2 = "I love PHP";
        
        echo "<label>String: </label> \"$string2\" <br>";
        
        $kata = explode(" ", $string2);
        
        echo "Kata pertama: " . $kata[0] . "<br>";
        echo "Kata kedua: " . $kata[1] . "<br>";
        echo "Kata ketiga: " . $kata[2] . "<br>";

        echo "<h3>Soal No 3</h3>";

        $string3 = "PHP is old but sexy!";
        echo "String: \"$string3\" <br>";
        
        $string_baru = str_replace("sexy", "awesome", $string3);
        echo "String setelah perubahan: \"$string_baru\"";
    ?>
</body>
</html>