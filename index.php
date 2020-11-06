<!--
Wykonali:
- Mikołaj Żarnowski (PHP & MySQL)
- Marcin Stanaszek (HTML & CSS)
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Księga gości</title>
</head>

<style>
    body {
        background-color: #FFF8DC;
    }

    textarea {
        resize: none;
        background-color: #FFFFF0;
        border: 2px solid #FFEBCD;
    }


    .przycisk {
        height: 40px;
        background-color: #FFFFF0;
        color: black;
        border: 5px solid #FFEBCD;
        border-style: outset;
    }

    .przycisk:hover {
        background-color: #FDF5E6;
        border: 5px solid #FAEBD7;
        border-style: outset;
    }

    .boxKomentarze {
        width: 400px;
        background-color: #FFFFF0;
        border: 2px solid #FFEBCD;
    }
    

</style>

<body>

    <h1>Księga gości</h1>
    <br>
    Wpisz komentarz
    <br><br>
    <form action="dodaj.php" method="post">
        <textarea class="kom" name="kom" placeholder="Tutaj wpisz komentarz" rows="15" cols="50"></textarea>
        <br><br>
        <textarea class="podpis" name="podpis" placeholder="Podpis" rows="2" cols="15"></textarea>
        <br><br>
        <input class="przycisk" type="submit" value="Dodaj komentarz">

    </form>
    <br><br>

    Wpisy:
    <br><br>

<?php
    //Pobranie danych do połączenia z BD
    require_once 'dbconn.php';

    //Nawiązanie połączenia z BD
    $polaczenie = new mysqli($host, $user, $pass, $db);

    if($polaczenie->connect_errno) {
        //Nieudana próba połączenia
        echo '<span style="color: red;">Nieudana próba połączenia!</span>';
    } else {
        //Zapytanie pobierające
        $sql = "
        SELECT * 
        FROM Komentarze 
        ORDER BY data DESC, id_komentarz DESC";
        
        //Wykonanie zapytania
        $wynik = $polaczenie->query($sql);
        
        //Wypisanie danych
        while($wiersz = $wynik->fetch_assoc()) {
            $data = strtotime($wiersz['data']);
            $dataPL = date("d.m.Y", $data);
echo<<<END
    <div class="boxKomentarze">
        <p>${wiersz['podpis']} | $dataPL</p>
        <p>${wiersz['tresc']}</p>
    </div>
END;
        }
        
        //Zamknięcie połączenia z BD
        $polaczenie->close();
    }
?>

</body>

</html>
