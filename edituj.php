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
    <li><a href="vloz.php">VKLADANIE</a></li>
    <li><a href="citaj.php">CITANIE/MAZANIE</a></li>
    <li><a href="contact.php">KONTAKT</a></li>
    <!-- Po dokonceni vsetkeho doplnit zdrojove kody -->
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
    if (!$conn) {
        echo "Error: Neda sa pripojit na MySQL DB server.<br>" . PHP_EOL;
        exit;
    } else {
        echo "connectivity OK<br>";
    }


    $query = "SELECT id, meno, priezvisko FROM Student WHERE id=" . $_GET["id"];
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "ERR" . $query . PHP_EOL;
        exit;
    } else {
        echo "ok";
    }

    while ($row = mysqli_fetch_assoc($result)) {

        echo "<br><b>Editujes prave zaznam</b>" . $row["meno"] . " " . $row["priezvisko"];
        //echo "<br><b>meno:</b>" . $row["meno"] . "<br>";
    }
    ?>
    <script>
        const app = angular.module('myApp', []);
        app.controller('myCtrl', function ($scope) {
            $scope.firstName = "John";
            $scope.lastName = "Doe";
        });
    </script>

    <h2>Edituj udaj</h2>
    <div ng-app="myApp" ng-controller="myCtrl">
        <form action="citaj.php" method="post" autocomplete="on">
            <input name="id" type="hidden" value="<?php echo $row["id"]; ?>">
            <label for="name">Meno</label><input id="name" type="text" ng-model="meno" name="meno"
                                                 placeholder="<?php echo $row["meno"]; ?>">
            <label for="lastname">Priezvisko</label><input id="lastname" type="text" ng-model="priezvisko"
                                                           name="priezvisko"
                                                           placeholder="<?php echo $row['priezvisko']; ?>">
            <input type="submit" value="Uloz zmeny"><br>
            <input type="hidden" name="uloz" value="ano">
        </form>
        <p><strong>UPDATE student <br> SET meno='</strong>{{meno}}<strong>', priezvisko='</strong>{{priezvisko}}<strong>'
                <br>WHERE id=</strong> <?php echo $_GET["id"]; ?></p>
    </div>

    <?php

    if ($_POST["uloz"] == "ano") {
        echo "mal by sa vykonat SQL";
        $id = $_POST["id"];
        $meno = $_POST["meno"];
        $priezvisko = $_POST["priezvisko"];

        //Vykonanie prikazu
        $query = "UPDATE Student SET meno ='?',priezvisko='?' WHERE id=?";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($query, $conn);
        mysqli_stmt_bind_param($stmt, 'ssi', $meno, $priezvisko, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }

}
?>
</body>
</html>
