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


    <link rel="apple-touch-icon" sizes="180x180" href="icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-16x16.png">
    <link rel="manifest" href="icon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<body>
<header>
    <a class="uvod" href="index.php"><h1 class="uvod">Semestralne zadanie</h1></a>
    <h2 class="uvod">Internetove technologie</h2>
</header>
<ul>
    <li><a href="index.php"><i class="fa fa-home fa-fw"></i></a></li>
    <li><a class="active" href="vloz.php">VKLADANIE</a></li>
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
<!-- DB connect  -->
<?php
/*
//Connect do DB
$db_server="edudb-02.nameserver.sk";
$db_user="samod150";
$db_pass="Hesloheslo123";
$db_name="4ideaspace_stude";
$db_port="3307";
*/
include "config.php";
//$conn=mysqli_connect($db_server, $db_user, $db_pass, $db_name, $db_port);

/*if(!$conn)
{
    echo "Neuspesne pripojenie".PHP_EOL;
    exit;
}
else
{
    echo "Konektivita s DB nadviazana";
}
*/
?>
<script>
    var app = angular.module('myApp', []);
    app.controller('myCtrl', function($scope) {
        $scope.firstname = "";
        $scope.lastname = "";
        $scope.faculty = "Materialovo technologicka fakulta";
    });
</script>

<!-- Formular -->

<h2>Vloz hodnotu:</h2>
<div ng-app="myApp" ng-controller="myCtrl">
<form action="vloz.php" method="post" autocomplete="on">
    <label for="meno">Meno:</label> <input id="fname" ng-model="firstname" type="text" name="meno" required autofocus placeholder="Samuel"><br>
    <label for="priezvisko">Priezvisko:</label> <input id="lname" ng-model="lastname" type="text" name="priezvisko" required autofocus placeholder="Domin"><br><br>
    <label for="fakulta">Zvol si fakultu</label>

    <select ng-model="faculty" name="fakulta">
        <option label="MTF">Materialovo technologicka fakulta</option>
        <option label="FCHPT">Fakulta chcemicko potravinarskej technologie</option>
        <option label="FIIT">Fakulta informatiky a informacnych technologii</option>
        <option label="FEI">Fakulta elektrotechniky</option>
        <option label="SjF">Strojnicka fakulta</option>
        <option label="SvF">Stavebna fakulta</option>
    </select><br>

    <div class="g-recaptcha" data-sitekey="6Lc1Ov0ZAAAAAIa37gGbzbyvsuJORUR8U59d-6Hv"></div>
    <input type="submit" value="Vlozit"></br>
    <input type="hidden" name="vlozit" value="ano">

</form>
    <p><strong>Vkladas udaje:</strong> {{firstname}} {{lastname}} {{faculty}}<p>
</div>

<?php
//vkladanie udajov do DB
if ($_POST["vlozit"]=="ano")
{
    // Ak v html formulari je vlozit a je naplnene hodnotou ano idem vlozit data do DB
    $meno = $_POST["meno"]; // do premennej $meno = $_POST["meno"];
    $priezvisko = $_POST["priezvisko"];
    $fakulta =$_POST["fakulta"];
    $id = 0;

    $query = "INSERT INTO Student (id,meno,priezvisko,fakulta) VALUES (?,?,?,?)";
    // SQL prikaz na vkladanie hodnot do troch stlpcov
    $stmt = mysqli_stmt_init($conn);
    //pripravim miesto pre prikaz DB
    mysqli_stmt_prepare($stmt, $query);
    //do pamate pripravenej zadam SQL prikaz nekompletny lebo parametre
    mysqli_stmt_bind_param($stmt, 'isss', $id, $meno, $priezvisko, $fakulta);
    //mysqli_stmt_bind_param($stmt, "is", $id, $meno);
    // pripnem parametre na znaky otazniku. ? bude nahradeny premennou
    mysqli_stmt_execute($stmt); // samotne vykonanie prikazu v DB
    mysqli_stmt_close($stmt);  // a zrusenie pamatovej alokiacie a v pripade uspechu sa potvrdi zaznam v DB
}


//echo "<br> vitaj:", $_POST["meno"] ," ", $_POST["priezvisko"]," ",$_POST["fakulta"];
mysqli_close($conn);
?>



</body>
</html>
