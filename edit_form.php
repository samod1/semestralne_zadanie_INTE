<form action="edituj.php" method="POST" onsubmit="return confirm('Naozaj chces vykonat tieto zmeny ?');">
    <fieldset>
        <legend>Osobne udaje</legend>
        <input type="hidden" name="id" value="<?php echo $idp; ?>">
        <label for="meno">Meno:</label>
        <input id="meno" type="text" name="meno" value="<?php echo $menop; ?>" required autofocus><br>
        <label for="priezvisko">Priezvisko:</label>
        <input id="priezvisko" type="text" name="priezvisko" required autofocus
               value="<?php echo $priezviskop; ?>">
    </fieldset>
    <input type="submit" value="Uprav udaje"><br>
    <input type="hidden" name="uprav" value="ano">
</form>
