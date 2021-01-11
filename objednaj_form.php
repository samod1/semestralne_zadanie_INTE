<form action="objednaj.php" method="post" autocomplete="off">

    <input type="hidden" name="id" value="<? echo $idp; ?>">

    <?php
    $query_obed = "SELECT idObed, nazov FROM Obed WHERE datum_obed='" . $datum . "'ORDER BY idObed ASC ";
    $result = mysqli_query($conn, $query_obed);
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <input type="radio" name="obed" id="<? echo $row["idObed"]; ?>" value="<? echo $row["idObed"] ?>">
        <label for="<? echo $row["idObed"] ?>"><?php echo $row["nazov"]; ?></label>
        <br>
        <?php
    }

    ?>
    <!--<input type="text" name="obed">-->
    <br>
    <input type="submit" value="Objednaj obed">
    <input type="reset">
    <input type="hidden" name="objednaj" value="ano">
</form>
