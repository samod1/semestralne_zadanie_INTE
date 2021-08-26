<!DOCTYPE HTML>
<html lang="sk-SK">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <title>Vloz udaje</title>
    <meta name="author" content="Samuel Domin"
    <meta name="keyword" content="HTML, CSS, JavaScript, PHP">
    <meta name="description" content="Semestralny projekt INTE">
    <meta http-equiv="refresh" content="60">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ikonky -->
    <link rel="apple-touch-icon" sizes="180x180" href="icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-16x16.png">
    <link rel="manifest" href="icon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>

<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

<body>
<header>
    <a class="uvod" href="index.php"><h1 class="uvod">Semestralne zadanie</h1></a>
    <h2 class="uvod">Internetove technologie</h2>
</header>
<div>
    <ul>
        <li><a href="index.php"><i class="fa fa-home fa-fw"></i></a></li>
        <li><a href="popis.php">POPIS PROJETKU</a></li>
        <li><a href="vloz.php">VKLADANIE</a></li>
        <li><a href="citaj.php">CITANIE/MAZANIE/UPRAVOVANIE</a></li>
        <li><a href="ine.php">INE PROJEKTY</a></li>
        <li><a href="contact.php">KONTAKT</a></li>
        <li><a href="https://github.com/samod1/semestralne_zadanie_INTE.git">ZDROJOVE KODY</a></li>
    </ul>
</div>
<!-- Reklama na uvod -->
<div>
    <h4 style="text-align:center">Webstranka je pohanana</h4>
    <a href="https://wy.sk/?dealer=68733"><img src="images/banner_728x90.png" alt="banner"></a>
</div>

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
