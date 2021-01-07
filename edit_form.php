<html>
<body>
<form action="edituj.php" method="GET">
    <fieldset>
        <legend>Osobne udaje</legend>
        <input type="hidden" name="id" value='<?php echo $idp; ?>'>
        <label for="meno">Meno:</label>
        <input id="meno" type="text" name="meno" placeholder='<?php echo $menop; ?>' required autofocus><br>
        <label for="priezvisko">Priezvisko:</label>
        <input id="priezvisko" type="text" name="priezvisko" required autofocus
               placeholder='<?php echo $priezviskop; ?>'>
    </fieldset>
    <input type="submit" value="Uprav udaje"><br>
    <input type="hidden" name="uprav" value="ano">
</form>
</body>
</html>