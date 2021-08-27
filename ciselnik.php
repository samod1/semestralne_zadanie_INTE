<?php
$conn = "";
include "config.php";

//TODO pridat tituly pred menom, za menom

$query = "SELECT meno, priezvisko, F.názov, KO.názov FROM tbl_student_new 
    INNER JOIN Fakulty F on tbl_student_new.fakulta = F.kód
    INNER JOIN Krajny_OSN KO on tbl_student_new.krajina = KO.kód";
$result = mysqli_query($conn, $query); // mysqli_query - vykona prikaz
$pocetRiadkov = mysqli_num_rows($result);
if (!$result) {
    echo "Error: Neda sa vykonat prikaz SQL: " . $query . ".<br>" . PHP_EOL;
    exit;
}
if ($pocetRiadkov == 0) {

    echo "Nemam co zobrazit";

}
?>

<table>
    <tr>
        <th>titul pred menom</th>
        <th>Meno</th>
        <th>Priezvisko</th>
        <th>titul za menom</th>
        <th>Fakulta</th>
        <th>Krajina</th>
    </tr>

    <?

    while ($row = mysqli_fetch_assoc($result)) {

        ?>
        <tr>

            <td><?php echo $row["titulPredMenom"] ?></td>
            <td><?php echo $row["meno"] ?></td>
            <td><?php echo $row["priezvisko"] ?></td>
            <td><?php echo $row["titulZaMenom"] ?></td>
            <td><?php echo $row["názov"] ?></td>
            <td><?php echo $row["názov"] ?></td>

        </tr>

        <?php
    }
    ?>
</table>
</body>
</html>