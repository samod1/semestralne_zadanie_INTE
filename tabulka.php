<head>
    <title>Citaj</title>
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

<?php
$conn = "";
include "config.php";
?>


<?php
$query = "SELECT Student.id ,Student.meno, Student.priezvisko,Student.fakulta FROM Student order by id ASC ";  //uspodiadaj ASC od najmensieho po najvacsi
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
        <th>Meno</th>
        <th>Priezvisko</th>
        <th>Fakulta</th>
        <th colspan="4">Akcia</th>
    </tr>

    <?

    while ($row = mysqli_fetch_assoc($result)) {

        ?>
        <tr>

            <td><?php echo $row["meno"] ?></td>
            <td><?php echo $row["priezvisko"] ?></td>
            <td><?php echo $row["fakulta"] ?></td>
            <td><a onclick="return confirm('Naozaj chces vymazat tohto uzivatela');" id="odstranit"
                   href="citaj.php?id=<?php echo $row["id"]; ?>&zmazat=ano"><b>Zmazat</b></a></td>
            <td><a id="edituj" href="edituj.php?id=<?php echo $row["id"]; ?>&edituj=ano"><b>Edituj</b></a></td>
            <td><a id="objednajObed" href="objednaj.php?id=<?php echo $row["id"]; ?>&objednaj=ano"><b>Objednaj si
                        obed</b></a></td>
            <td><a style="color: black" id="zobrazObedy" href="zobrazObedy.php?id=<? echo $row["id"]; ?>"><b>Zobraz
                        obedy</b></a></td>
        </tr>

        <?php
    }

    mysqli_close($conn);
    ?>
</table>
</body>
</html>


