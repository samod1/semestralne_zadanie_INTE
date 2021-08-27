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

//TODO pridat tituly pred menom, za menom

$query = "SELECT ttpm.shortTitle, meno, priezvisko, Tzm.shortTitleAfterName, F.názov, KO.názovKrajny FROM tbl_student_new 
    INNER JOIN Fakulty F on tbl_student_new.fakulta = F.kód
    INNER JOIN Krajny_OSN KO on tbl_student_new.krajina = KO.kód
    INNER JOIN tbl_tituly_pred_menom ttpm on tbl_student_new.titulPredMenom = ttpm.kód
    INNER JOIN Tituly_za_menom Tzm on tbl_student_new.titulZaMenom = Tzm.kód";
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
        <th>titul pred menom</th>
        <th>Meno</th>
        <th>Priezvisko</th>
        <th>titul za menom</th>
        <th>Fakulta</th>
        <th>Krajina</th>
    </tr>

    <?

    while ($row = mysqli_fetch_assoc($result)) {

        ?>
        <tr>

            <td><?php echo $row["shortTitle"] ?></td>
            <td><?php echo $row["meno"] ?></td>
            <td><?php echo $row["priezvisko"] ?></td>
            <td><?php echo $row["shortTitleAfterName"] ?></td>
            <td><?php echo $row["názov"] ?></td>
            <td><?php echo $row["názovKrajny"] ?></td>

        </tr>

        <?php
    }
    ?>
</table>
</body>
</html>