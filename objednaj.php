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
        <li><a class="active" href="index.php"><i class="fa fa-home fa-fw"></i></a></li>
        <li><a href="popis.php">POPIS PROJETKU</a></li>
        <li><a href="vloz.php">VKLADANIE</a></li>
        <li class="active"><a href="citaj.php">CITANIE/MAZANIE/UPRAVOVANIE</a></li>
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

?>
<div>
    <h2>Objednaj si obed</h2>

    <?php
    $conn = "";
    include "config.php";

    if ($_GET["objednaj"] == "ano" && $_GET["id"] != "") {

        $query = "SELECT id,meno,priezvisko from Student where id=" . $_GET["id"];
        $result = mysqli_query($conn, $query);


        while ($row = mysqli_fetch_assoc($result)) {

            $idp = $_GET["id"];

            ?>

            <h3>Obed kupuje: <?php echo $row["id"], " ", $row["meno"], " ", $row["priezvisko"];
                ?></h3>

            <form action="objednaj.php" method="GET" autocomplete="off">

                <input type="hidden" name="id" value="<? echo $idp; ?>">

                <?php
                $query_obed = "SELECT idObed, nazov FROM Obed ORDER BY idObed ASC";
                $result = mysqli_query($conn, $query_obed);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <input type="radio" name="obed" id="<? echo $row["idObed"]; ?>" value="<? echo $row["idObed"] ?>">
                    <label for="<? echo $row["idObed"] ?>"><?php echo $row["nazov"]; ?></label>
                    <br>
                    <?php
                }
            //TODO Update
            // zajtra how to update predprirava by bola
            /* moje otazky
                Update
            */
                ?>
                <!--<input type="text" name="obed">-->
                <br>
                <input type="submit" value="Objednaj obed">
                <input type="reset">
                <input type="hidden" name="objednaj" value="ano">
            </form>


            <?php
            if ($_GET["objednaj"] == "ano") {
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
    }
    mysqli_close($conn);
    ?>

    <footer>

        <div class="footer">
            <p class="footer"><span>&copy;Samuel Domin 2020</span></p>
        </div>
    </footer>
</body>
</html>
