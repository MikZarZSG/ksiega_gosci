<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Księga gości</title>
</head>
<body>
    <form action="dodaj.php" method="post">
        <div><label for="tresc">Komentarz:</label></div>
        <div>
            <textarea name="tresc" id="tresc" cols="30" rows="1"></textarea>
        </div>
        
        <div><label for="podpis">Podpis:</label></div>
        <div><input type="text" name="podpis" id="podpis"></div>
        
        <input type="submit" value="Dodaj komentarz">
    </form>
    
<?php
    //Pobranie danych do połączenia z BD
    require_once 'dbconn.php';

    //Nawiązanie połączenia z BD
    $polaczenie = new mysqli($host, $user, $pass, $db);

    if(!$polaczenie) {
        //Nieudana próba połączenia
        echo '<span style="color: red;">Nieudana próba połączenia!</span>';
    } else {
        //Zapytanie pobierające
        $sql = "
        SELECT * 
        FROM Komentarze 
        ORDER BY data DESC, id_komentarz";
        
        //Wykonanie zapytania
        
        //Zamknięcie połączenia z BD
        $polaczenie->close();
    }
?>
</body>
</html>