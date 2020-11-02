<?php
    //Pobranie danych do połączenia z BD
    require_once 'dbconn.php';

    //Nawiązanie połączenia z BD
    $polaczenie = new mysqli($host, $user, $pass, $db);

    if(!$polaczenie) {
        //Nieudana próba połączenia
        echo '<span style="color: red;">Nieudana próba połączenia!</span>';
    }
    else {
        //Pobranie danych z formularza
        $podpis = $_POST['podpis'];
        $data = date("Y-m-d");
        $tresc = $_POST['tresc'];
        
        //Zapytanie wstawiające
        $sql = "
        INSERT INTO Komentarze
        VALUES(NULL, '$podpis', '$data', '$tresc')";
        
        //Wykonanie zapytania
        if(!$polaczenie->query($sql)) {
            echo '<span style="color: red;">Nieudana próba wstawienia danych do tabeli!</span>';
        }
        
        //Zamknięcie połączenia z BD
        $polaczenie->close();
        
        header('Location: index.php');
    }
?>