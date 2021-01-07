<?php
//definicia cookie
$session = session_start();
$cookie_name = "user";
$cookie_value = "Pouzivas moj projekt";

setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // 86400 = 1 day


//TODO dokoncit menu, upravit vzhlad, vyhadzat hovadiny, dokoncit kuchynsku verziu obedov nieco narychlo zbuchaj, otestuj
//TODO popis celeho projektu, pridaj ine projekty spolu s odkazmi do gitu. Maybe si vymsysli clanok o nejakej sracke v exceli commitni pushni do GITU a odovzdaj

?>


<!DOCTYPE HTML>
<html lang="sk-SK">
<head>
    <link rel="stylesheet" href="css/style.css"
    <meta charset="UTF-8">
    <title>Vitajte</title>
    <meta name="author" content="Samuel Domin"
    <meta name="keyword" content="HTML, CSS, JavaScript, PHP">
    <meta name="description" content="Semestralny projekt INTE">
    <!-- <meta http-equiv="refresh" content="5"> -->
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
<script src="js/JS.js"></script>
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
        <li><a href="popis.php">INE PROJEKTY</a></li>
        <li><a class="active" href="contact.php">KONTAKT</a></li>
        <li><a href="https://github.com/samod1/semestralne_zadanie_INTE.git">ZDROJOVE KODY</a></li>


    </ul>
</div>
<!-- Reklama na uvod -->
<div>
    <h4 style="text-align:center">Webstranka je pohanana</h4>
    <a href="https://wy.sk/?dealer=68733"><img src="images/banner_728x90.png" alt="banner"></a>
</div>

<h4>
    O projekte
</h4>

<p>

    Dobrý deň,
    vitajte na mojom semestrálnom projekte z predmetu Internetové technológie. Našou úlohou je spraviť webovú stránku,
    ktorá bude prepojená na SQL databázu. V php využitím SQL príkazov budeme robiť DELETE, UPDATE, INSERT v databázových
    tabuľkách.</p>
<h5>O mojej stránke</h5>
<p>Stránka slúži na objednávanie obedov pre študentov školy. Samostatná stránka je pre <a
            href="http://kuchyna.4ideaspace.studenthosting.sk/">kuchňu</a>, kde si môžu nájsť zamestnaci kuchyne nájsť
    koľko ľudí si objednalo daný obed. Na tejto časti webovej stránky sa zatiaľ aktívne pracuje. </p>


<footer>

    <div class="footer">
        <p class="footer"><span>&copy;Samuel Domin 2020</span></p>
    </div>
</footer>
</body>
</html>
