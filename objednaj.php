<?php
//definicia cookie
$session = session_start();
$cookie_name = "user";
$cookie_value = "Pouzivas moj projekt";

setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // 86400 = 1 day


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
        <li class="selected"><a href="index.php" class="active"><i class="fa fa-home fa-fw"></i></a></li>
        <li><a href="vloz.php">VKLADANIE</a></li>
        <li><a href="citaj.php">CITANIE/MAZANIE</a></li>
        <li><a href="edituj.php">EDITUJ</a></li>
        <li><a href="contact.php">KONTAKT</a></li>
        <!-- <li><a href="povedali.php">POVEDALI O PROJEKTE</a></li> -->
        <li><a href="https://www.google.com">ZDROJOVE KODY</a></li>
    </ul>
</div>
<!-- Reklama na uvod -->
<div>
    <h4 style="text-align:center">Webstranka je pohanana</h4>
    <a href="https://wy.sk/?dealer=68733"><img src="images/banner_728x90.png" alt="banner"></a>
</div>
<?php

?>
<div>
    <h2>Objednaj si obed</h2>

    <?php
    $conn = "";
    include_once "config.php";
    $query = "SELECT idObed, nazov FROM Obed ORDER BY idObed ASC";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "ERR";
        exit;
    }
    ?>
    <form action="citaj.php" method="post" autocomplete="off">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <input type="radio" value="<?php $row["nazov"]; ?>" name="obed">
            <label><?php echo $row["nazov"]; ?></label>

            <?php
        }

        //TODO Update
        // zajtra how to update predprirava by bola
        /* moje otazky
            da sa spravit radio tak aby sa dala odkliknut len jedna jedina moznost?
        */
        ?>
        <input type="submit" value="uloz">
    </form>
    <footer>

        <div class="footer">
            <p class="footer"><span>&copy;Samuel Domin 2020</span></p>
        </div>
    </footer>
</body>
</html>
