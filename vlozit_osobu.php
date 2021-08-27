<html>
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
<div>
    <ul>
        <li><a href="index.php"><i class="fa fa-home fa-fw"></i></a></li>
        <li><a href="popis.php">POPIS PROJETKU</a></li>
        <li><a class="active" href="vloz.php">VKLADANIE</a></li>
        <li><a href="citaj.php">CITANIE/MAZANIE/UPRAVOVANIE</a></li>
        <li><a href="ine.php">INE PROJEKTY</a></li>
        <li><a href="contact.php">KONTAKT</a></li>
        <li><a href="https://github.com/samod1/semestralne_zadanie_INTE.git">ZDROJOVE KODY</a></li>
    </ul>
</div>

<!-- Reklama na uvod -->
<div id="reklama">
    <a href="https://wy.sk/?dealer=68733"><img src="images/banner_728x90.png" alt="banner"></a>
</div>


<?php
//pripojenie na DB
$conn = "";
include "config.php";

?>

<body>
<h1>Vlozenie osoby</h1>
<form action="vlozit_osobu.php" method="post" autocomplete="on">
    <label>Meno</label>
    <input name="name" type="text">

    <label>Priezvisko</label>
    <input name="surname" type="text">

    <?php
    $query = "SELECT officialTitle, kód FROM tbl_tituly_pred_menom";
    $result = mysqli_query($conn, $query);
    $pocetRiadkov = mysqli_num_rows($result);
    if (!$result) {
        echo "Error: Neda sa vykonat prikaz SQL: " . $query . ".<br>" . PHP_EOL;
        exit;
    }
    if ($pocetRiadkov == 0) {
        echo "Nemam co zobrazit";
    }
    ?>
    <br>
    <br>
    <label>titul pred menoom </label>
    <select name="titleBeforeName" id="university">
        <?php

        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <option value="<?php echo $row["kód"] ?>"><?php echo $row["officialTitle"] ?></option>

            <?php
        }
        ?>
    </select>

    <?php
    $query = "SELECT officialTitle, kód FROM Tituly_za_menom";
    $result = mysqli_query($conn, $query);
    $pocetRiadkov = mysqli_num_rows($result);
    if (!$result) {
        echo "Error: Neda sa vykonat prikaz SQL: " . $query . ".<br>" . PHP_EOL;
        exit;
    }
    if ($pocetRiadkov == 0) {
        echo "Nemam co zobrazit";
    }
    ?>
    <br>
    <br>
    <label>titul za menom </label>
    <select name="titleAfterName" id="university">

        <?php

        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <option value="<?php echo $row["kód"] ?>"><?php echo $row["officialTitle"] ?></option>
            <?php
        }
        ?>
    </select>
    <?php
    $query = "SELECT názov, kód FROM Fakulty WHERE `kód školy`=702000000";
    $result = mysqli_query($conn, $query);
    $pocetRiadkov = mysqli_num_rows($result);
    if (!$result) {
        echo "Error: Neda sa vykonat prikaz SQL: " . $query . ".<br>" . PHP_EOL;
        exit;
    }
    if ($pocetRiadkov == 0) {
        echo "Nemam co zobrazit";
    }
    ?>
    <br>
    <br>
    <label>Fakulta</label>
    <select name="faculty" id="university">


        <?php

        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <option value="<?php echo $row["kód"] ?>"><?php echo $row["názov"] ?></option>

            <?php
        }
        ?>
    </select>
    <input type="submit" value="Vlozit"><br>
    <input type="hidden" name="vlozit" value="ano">
</form>
</body>

<?php

//vkladanie udajov do DB
if ($_POST["vlozit"] == "ano") {
    $meno = $_POST["name"];
    $priezvisko = $_POST["surname"];
    $titleBeforeName = $_POST["titleBeforeName"];
    $titleAfterName = $_POST["titleAfterName"];
    $faculty = $_POST["faculty"];
    $id = 0;


    $query = "INSERT INTO tbl_student_new (id,meno,priezvisko,titulPredMenom,titulZaMenom,fakulta) VALUES (?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_bind_param($stmt, 'issiii', $id, $meno, $priezvisko, $titleBeforeName, $titleAfterName, $faculty);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:citaj.php");
}

mysqli_close($conn);
?>


</html>