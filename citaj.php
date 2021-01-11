<!DOCTYPE HTML>
<html lang="sk-SK">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <title>Citanie/Mazanie udajov</title>
    <meta name="author" content="Samuel Domin"
    <meta name="keyword" content="HTML, CSS, JavaScript, PHP">
    <meta name="description" content="Semestralny projekt INTE">
    <meta http-equiv="refresh" content="60">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="apple-touch-icon" sizes="180x180" href="icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-16x16.png">
    <link rel="manifest" href="icon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>
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
        <li class="active"><a href="citaj.php">CITANIE/MAZANIE/UPRAVOVANIE</a></li>
        <li><a href="ine.php">INE PROJEKTY</a></li>
        <li><a href="contact.php">KONTAKT</a></li>
        <li><a href="https://github.com/samod1/semestralne_zadanie_INTE.git">ZDROJOVE KODY</a></li>
    </ul>
</div>

<!-- Reklama na uvod -->
<div id="reklama">
    <a href="https://wy.sk/?dealer=68733"><img src="images/banner_728x90.png" alt="banner"></a>
</div>


<h2>Citaj vlozene hodnoty</h2>
<!--<h5>Hladaj</h5>
<form action="citaj.php" method="get" autocomplete="on">
    <label for="priezvisko2">Priezvisko</label>
    <input type="text" name="priezvisko2">
    <input type="submit" value="Hladaj">
    <input type="hidden" name="hladaj" value="ano">
</form> -->
<?php
$conn = "";
include "config.php";

// DELETE
if ($_GET["zmazat"] == "ano" && $_GET["id"] != "") {
    $id = $_GET["id"];
    $query = "DELETE FROM Student WHERE id=?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}


//READING
include "tabulka.php";

if ($_POST["ulozit"] == "ano" && $_POST["id"] != "" && $_POST["meno"] != "" && $_POST["priezvisko"] != "") {
    $meno = $_POST["meno"];
    $id = $_POST["id"];
    $priezvisko = $_POST["priezvisko"];


    if ($_GET["ulozit"] == "ano") {
        $id = $_GET["id"];
        $obed = $_GET["obed"];

        $query_upobed = "UPDATE Student SET idObed= ? WHERE id= ?";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $query_upobed);
        mysqli_stmt_bind_param($stmt, "ii", $obed, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);


    }
}


?>
</body>
</html>

<?php


mysqli_close($conn);
?>