<!DOCTYPE html>
<html lang="sk-SK">
<head>

    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <title>Edituj udaj</title>
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

<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

<body>
<header>
    <a class="uvod" href="index.php"><h1 class="uvod">Semestralne zadanie</h1></a>
    <h2 class="uvod">Internetove technologie</h2>
</header>
<ul>
    <li><a href="index.php"><i class="fa fa-home fa-fw"></i></a></li>
    <li><a href="popis.php">POPIS PROJETKU</a></li>
    <li><a href="vloz.php">VKLADANIE</a></li>
    <li><a href="citaj.php">CITANIE/MAZANIE/UPRAVOVANIE</a></li>
    <li><a href="popis.php">INE PROJEKTY</a></li>
    <li><a class="active" href="contact.php">KONTAKT</a></li>
    <li><a href="https://www.google.com">ZDROJOVE KODY</a></li>


</ul>
<!-- Reklama na uvod -->
<div>
    <h4 style="text-align:center">Webstranka je pohanana</h4>
    <a href="https://wy.sk/?dealer=68733"><img src="images/banner_728x90.png" alt="banner"></a>
</div>


<?php
$conn = "";
if ($_GET["id"] != "" && $_GET["edituj"] == "ano") {
    include_once "config.php";
    $query = "SELECT id, meno, priezvisko FROM Student WHERE id=" . $_GET["id"];
    $result = mysqli_query($conn, $query);


    while ($row = mysqli_fetch_assoc($result)) {
        echo "<br><b>Editujes prave zaznam</b>" . $row["id"] . " " . $row["meno"] . " " . $row["priezvisko"];
    }
    ?>
    <!-- <script>
        const app = angular.module('myApp', []);
        app.controller('myCtrl', function ($scope) {
            $scope.firstName = "John";
            $scope.lastName = "Doe";
        });
    </script> -->

    <h2>Edituj udaj</h2>
    <form action="edituj.php" method="get" autocomplete="on">
        <label for="idStud">ID:<?php echo $row["id"]; ?></label>
        <label>
            <input name="idStud" type="text" value="<?php echo $row["id"]; ?>">
        </label>
        <label for="name">Meno</label>
        <input type="text" name="meno">
        <label for="lastname">Priezvisko</label>
        <input type="text" name="priezvisko">
        <input type="submit" value="Uloz zmeny"><br>
        <input type="hidden" name="uloz" value="ano">
    </form>
    <!--<p><strong>UPDATE student <br> SET meno='</strong>{{meno}}<strong>', priezvisko='</strong>{{priezvisko}}<strong>'
                <br>WHERE id=</strong> <?php //echo $_GET["id"];
    ?></p>-->


    <?php

    if ($_POST["uloz"] == "ano") {
        $id = $_GET["idStud"];
        $meno = $_GET["meno"];
        $priezvisko = $_GET["priezvisko"];

        //Vykonanie prikazu
        $query_update = "UPDATE Student SET meno ='?',priezvisko='?' WHERE id=?";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($query_update, $conn);
        mysqli_stmt_bind_param($stmt, 'ssi', $meno, $priezvisko, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}
?>
</body>
</html>
