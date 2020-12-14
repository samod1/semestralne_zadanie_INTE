<?php

if ($_GET["id"] != "" && $_GET["edituj"] == "ano")
    include "config.php";

if (!conn) {
    echo "ERR<br>";
    exit;
} else {
    echo "OK<br>";
}

$query = "SELECT id,meno,priezvisko FROM student WHERE id=" . $_GET["id"];
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "ERR<br>" . $query . PHP_EOL;
    exit;
} else {
    echo "OK";
}
?>

    <form action="edituj.php" method="post">
        <input type="hidden" name="id" value="<?php $row["id"]; ?>">
        <label>MENO</label><input type="text" name="meno" value="<?php $row["meno"]; ?>">
        <label>PRIEZVISKO</label><input type="text" name="priezvisko" value="<?php $row["priezvisko"]; ?>">
        <input type="hidden" name="ulozit" value="ano">
        <input type="submit" value="Uloz zmenu">
    </form>


<?php
mysqli_close($conn);
?>