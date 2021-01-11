<?php

$session = session_start();
$cookie_name = "user";
$cookie_value = "Pouzivas moj projekt";
setcookie($cookie_name, $cookie_value, time() + (86400), "/");
?>


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
        <li class="active"><a href="vloz.php">VKLADANIE</a></li>
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

<!-- DB connect  -->
<?php
$conn = "";
include "config.php";
?>

<script>
    let app = angular.module('myApp', []);
    app.controller('myCtrl', function ($scope) {
        $scope.firstname = "";
        $scope.lastname = "";
        $scope.faculty = "Materialovo technologicka fakulta";
    });
</script>

<!-- Formular -->

<h2>Vloz hodnotu:</h2>
<div ng-app="myApp" ng-controller="myCtrl">

    <form action="vloz.php" method="post" autocomplete="on">
        <fieldset>
            <legend>Osobne udaje</legend>
            <label for="meno">Meno:</label> <input id="meno" ng-model="firstname" type="text" name="meno" required
                                                   autofocus
                                                   placeholder="Samuel"><br>
            <label for="priezvisko">Priezvisko:</label> <input id="priezvisko" ng-model="lastname" type="text"
                                                               name="priezvisko" required autofocus placeholder="Domin"><br><br>
        </fieldset>
        <fieldset>
            <legend>Skolske udaje</legend>
            <label for="fakulta">Zvol si fakultu</label>

            <select name="fakulta">
                <option label="MTF">Materialovo technologicka fakulta</option>
                <option label="FCHPT">Fakulta chcemicko potravinarskej technologie</option>
                <option label="FIIT">Fakulta informatiky a informacnych technologii</option>
                <option label="FEI">Fakulta elektrotechniky</option>
                <option label="SjF">Strojnicka fakulta</option>
                <option label="SvF">Stavebna fakulta</option>
            </select><br>
        </fieldset>
        <input type="submit" value="Vlozit"><br>
        <input type="hidden" name="vlozit" value="ano">

    </form>
</div>

<?php

//vkladanie udajov do DB
if ($_POST["vlozit"] == "ano") {
    $meno = $_POST["meno"];
    $priezvisko = $_POST["priezvisko"];
    $fakulta = $_POST["fakulta"];
    $id = 0;

    $query = "INSERT INTO Student (id,meno,priezvisko,fakulta) VALUES (?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_bind_param($stmt, 'isss', $id, $meno, $priezvisko, $fakulta);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:citaj.php");

}

mysqli_close($conn);
?>


</body>
</html>
