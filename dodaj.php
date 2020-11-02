<?php
    require_once 'dbconn.php';

    $polaczenie = new mysqli($host, $user, $pass, $db);

    if(!$polaczenie) {
        echo '<span style="color: red;">Nieudana próba połączenia</span>';
    }
    else {
        $podpis = $_POST['podpis'];
        $data = date("Y-m-d");
        $tresc = $_POST['tresc'];
        
        echo $podpis;
        echo "<br>";
        
        echo $data;
        echo "<br>";
        
        echo $tresc;
        echo "<br>";
    }
?>