<?php
$conn = "";
include "config.php";

$query = "SELECT názov, ulica, PSČ FROM Fakulty WHERE `kód školy`= 702000000";  //uspodiadaj ASC od najmensieho po najvacsi
$result = mysqli_query($conn, $query); // mysqli_query - vykona prikaz
$pocetRiadkov = mysqli_num_rows($result);
if (!$result) {
    echo "Error: Neda sa vykonat prikaz SQL: " . $query . ".<br>" . PHP_EOL;
    exit;
}
if ($pocetRiadkov == 0) {

    echo "Nemam co zobrazit";

}
?>

<table>
    <tr>
        <th>Názov</th>
        <th>Adresa</th>
        <th>PSČ</th>
    </tr>

    <?

    while ($row = mysqli_fetch_assoc($result)) {

        ?>
        <tr>

            <td><?php echo $row["názov"] ?></td>
            <td><?php echo $row["ulica"] ?></td>
            <td><?php echo $row["PSČ"] ?></td>
        </tr>

        <?php
    }


    ?>
</table>

<?php
$query = "SELECT názov, kód FROM Krajny_OSN";
$result = mysqli_query($conn, $query);
$pocetRiadkov = mysqli_num_rows($result);
if (!$result) {
    echo "Error: Neda sa vykonat prikaz SQL: " . $query . ".<br>" . PHP_EOL;
    exit;
}
if ($pocetRiadkov == 0) {
    echo "Nemam co zobrazit";
}
?>
<br>
<br>
<label>Krajna</label>
<select name="country" id="coutries">


    <?php

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $row["kód"] ?>"><?php echo $row["názov"] ?></option>

    <?php } ?>
</select>

<?php
$query = "SELECT názov, kód FROM Vysoke_skoly";
$result = mysqli_query($conn, $query);
$pocetRiadkov = mysqli_num_rows($result);
if (!$result) {
    echo "Error: Neda sa vykonat prikaz SQL: " . $query . ".<br>" . PHP_EOL;
    exit;
}
if ($pocetRiadkov == 0) {
    echo "Nemam co zobrazit";
}
?>
<br>
<br>
<label>Univerzita</label>
<select name="university" id="university">


    <?php

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $row["kód"] ?>"><?php echo $row["názov"] ?></option>

    <?php } ?>
</select>

<?php
$query = "SELECT názov, kód FROM Fakulty";
$result = mysqli_query($conn, $query);
$pocetRiadkov = mysqli_num_rows($result);
if (!$result) {
    echo "Error: Neda sa vykonat prikaz SQL: " . $query . ".<br>" . PHP_EOL;
    exit;
}
if ($pocetRiadkov == 0) {
    echo "Nemam co zobrazit";
}
?>
<br>
<br>
<label>Fakulta</label>
<select name="university" id="university">


    <?php

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $row["kód"] ?>"><?php echo $row["názov"] ?></option>

        <?php
    }
    mysqli_close($conn);
    ?>
</select>


</body>
</html>
