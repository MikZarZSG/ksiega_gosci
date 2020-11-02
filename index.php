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
</body>
</html>