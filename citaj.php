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
<ul class="menu">
    <li><a href="index.php"><i class="fa fa-home fa-fw"></i></a></li>
    <li><a href="vloz.php">VKLADANIE</a></li>
    <li><a class="active" href="citaj.php">CITANIE/MAZANIE</a></li>
    <li><a href="contact.php">KONTAKT</a></li>
    <li><a href="https://www.google.com">ZDROJOVE KODY</a></li>


</ul>

<!-- Reklama na uvod -->
<div id="reklama">
    <a href="https://wy.sk/?dealer=68733"><img src="images/banner_728x90.png" alt="banner"></a>
</div>





<h2>Citaj vlozene hodnoty</h2>
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
/*
if(!$conn)
{
    echo "Neuspesne pripojenie".PHP_EOL;
    exit;
}
else
{
    echo "Konektivita s DB nadviazana";
}
*/
if ($_GET["zmazat"]=="ano" && $_GET["id"]!="") // && AND boolean operator = a zaroven plati
    // || booleans OR - alebo = plati podmienka cislo1 alebo cislo2, jedna alebo druha
{
    //$query = "DELETE FROM ucitel WHERE id=".$_GET["id"];  //delete command SQL kde id = odoslany parameter
    //$result = mysqli_query($link, $query); // mysqli_query - vykona prikaz

    /* to iste ale bezpecnejsie napisane */
    $id=$_GET["id"]; // do premennej $meno = $_POST["meno"];
    $query = "DELETE FROM Student WHERE id=?"; // toto je SQL prikaz pre vlozenie riadku do DB do dvoch stlpcov id a meno vkladam ?,?
    $stmt = mysqli_stmt_init($conn); //pripravim miesto pre prikaz DB
    mysqli_stmt_prepare($stmt, $query); //do pamate pripravenej zadam SQL prikaz nekompletny lebo parametre
    mysqli_stmt_bind_param($stmt, "i", $id); // pripnem parametre na znaky otazniku. ? bude nahradeny premennou
    mysqli_stmt_execute($stmt); // samotne vykonanie prikazu v DB
    mysqli_stmt_close($stmt);
}



//citanie
$query = "SELECT id, meno, priezvisko, fakulta FROM Student ORDER BY id ASC";  //uspodiadaj ASC od najmensieho po najvacsi
$result = mysqli_query($conn, $query); // mysqli_query - vykona prikaz
if (!$result)
{
    // ! $result zneguje false vyroby z neho true - ak sa db nepodarilo vykonat prikaz
    echo "Error: Neda sa vykonat prikazSQL: ".$query.".<br>".PHP_EOL; // PHP_EOL je konstanta na koniec riadku
    exit;   // exit - ukonci vykonavanie PHP programu
}

while ($row = mysqli_fetch_assoc($result))  // pokial budu existovat riadky v DB tak sa bude opakovat akcia medzi zatvrokami
{
    echo "<b>Meno:</b> ".$row["meno"].  "&nbsp; <b>Priezvisko:</b> " .$row["priezvisko"]."&nbsp; <b>Fakulta: </b>" .$row["fakulta"];
    ?>
    <a id="odstranit" href="citaj.php?id=<?php echo $row["id"];?>&zmazat=ano">Zmazat</a><br>
    <!--<a href="edituj.php?id=<?php echo $row["id"];?>&edituj=ano">Edituj</a><br>-->
    <?php
}
?>
</body>
</html>

<?php
?>