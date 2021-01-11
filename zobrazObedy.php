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
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
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
        <li><a class="active" href="citaj.php">CITANIE/MAZANIE/UPRAVOVANIE</a></li>
        <li><a href="ine.php">INE PROJEKTY</a></li>
        <li><a href="contact.php">KONTAKT</a></li>
        <li><a href="https://github.com/samod1/semestralne_zadanie_INTE.git">ZDROJOVE KODY</a></li>
    </ul>
</div>
<?php
$conn = "";
include "config.php";

if ($_GET["id"] != "") {
    $idStudent = $_GET["id"];

    $queryMeno = "SELECT meno,priezvisko from Student where id=" . $idStudent;
    $resultMeno = mysqli_query($conn, $queryMeno);
    while ($rowMeno = mysqli_fetch_assoc($resultMeno)) {
        echo "<h3>Meno stravnika: " . $rowMeno["meno"] . " " . $rowMeno["priezvisko"] . "</h3>";
    }

    $query = "SELECT idObe FROM Objednavky  WHERE idStud=" . $_GET["id"];
    $result = mysqli_query($conn, $query);
    $pocetObj = mysqli_num_rows($result);


    if ($pocetObj == 0) {
        echo "Nemas aktualne objednane ziadne obedy";
        ?>
        <a style="color: black" href="objednaj.php?id=<?php echo $idStudent; ?>&objednaj=ano">Tu si ich mozes
            objednat</a>
        <?php
    } else {
        $query = "SELECT Obed.nazov, Obed.datum_obed, Obed.cena from Objednavky LEFT JOIN Obed on Obed.idObed=Objednavky.idObe WHERE idStud=" . $idStudent;
        $result = mysqli_query($conn, $query);
        ?>

        <table>
        <tr>
            <th>Datum</th>
            <th>Jedlo</th>
            <th>Cena</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><? echo $row["datum_obed"]; ?></td>
                <td><? echo $row["nazov"]; ?></td>
                <td><? echo $row["cena"];
                    $celkovaCena += $row["cena"]; ?></td>
            </tr>
            <?php
        }
        ?>

        <tr>
            <th colspan="1">Celkovo si na obedoch zaplatil</th>
            <td></td>
            <td><? echo $celkovaCena; ?></td>
        </tr>

        <?php
    }
    ?>

    </table>
    <?php

}

mysqli_close($conn);
?>

