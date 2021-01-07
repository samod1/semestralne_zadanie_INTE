<?php
if ($_GET["id"] != "" && $_GET["edituj"] == "ano") {
    $conn = "";
    include_once "config.php";

    $query = "select meno, priezvisko from Student where id=" . $_GET["id"];
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $idp = $_GET["id"];
        $menop = $row["meno"];
        $priezviskop = $row["priezvisko"];
        $fakultap = $row["fakulta"];

        echo $idp . " ";
        echo $menop;
        echo " " . $priezviskop;

    }
}

include "edit_form.php";

if ($_POST["uprav"] == "ano") {
    $id = $_GET["id"];
    $meno = $_GET["meno"];
    $priezvisko = $_GET["priezvisko"];

    echo "Aktualizovane info: " . $meno . " " . $priezvisko;

    $query = "UPDATE Student SET meno= '?', priezvisko='?' where id=?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_bind_param($stmt, 'ssi', $meno, $priezvisko, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);

?>