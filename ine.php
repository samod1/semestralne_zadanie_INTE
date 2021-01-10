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
        <li class="active"><a href="ine.php">INE PROJEKTY</a></li>
        <li><a href="contact.php">KONTAKT</a></li>
        <li><a href="https://github.com/samod1/semestralne_zadanie_INTE.git">ZDROJOVE KODY</a></li>
    </ul>
</div>
<!-- Reklama na uvod -->
<div>
    <h4 style="text-align:center">Webstranka je pohanana</h4>
    <a href="https://wy.sk/?dealer=68733"><img src="images/banner_728x90.png" alt="banner"></a>
</div>
<div>
    <h3>Projekty na, ktorych som pracoval</h3>
    <h4>4 idea Space</h4>
    <img style="width: 80%" src="images/4is.png" alt="4 idea space"
    <h5>Popis projektu</h5>
    <a href="https://www.4idea.space">Link na stranku</a>
    <p> Komunitny online priestor. Grantovy projekt spolocnosti <a href="https://www.ibm.com/sk-en">IBM</a>Projekt je
        smerovany najma pre studentov MTF STU. V sppolupraci s </p>
    <h3>Projekty na ktorych aktualne pracujem</h3>
    <h4>Angualar Eshop</h4>
    <p>V sucasnej dobe pracujem na Eshope vo frameworku Angular. Eshop bude mat vsetky potrebne funkcionality ako pre
        zakaznika, tak aj pre predajcu. Zlavove kupony,atd.</p>
</div>
<footer>
    <div class="footer">
        <p class="footer"><span>&copy;Samuel Domin 2020 - <?php echo date("Y"); ?></span></p>
    </div>
</footer>
</body>
</html>
