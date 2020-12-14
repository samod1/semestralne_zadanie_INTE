<html>
	<body>Editacia prvku<br>
	

	<?php 	 
	
if ($_GET["id"]!="" && $_GET["edituj"]=="ano") // poslany id nesmie byt prazdne a edituj musi byt ano
 {
	 // pripojenie na databazu
	 include "config.php"; //ze nacita subor a vykona co je v nom
	 
	 $link=mysqli_connect($db_server,$db_user,$db_password,$db_meno,$db_port); //pripojenie na DB
	 if (!$link) { // ! $link zneguje false vyroby z neho true - ak sa db nepodarilo nepripojila
        echo "Error: Neda sa pripojit na MySQL DB server.<br>".PHP_EOL; // PHP_EOL je konstanta na koniec riadku
        exit;	// exit - ukonci vykonavanie PHP programu
	 } else {
		echo "Pripojenie na DB je ok<br>";
	 }

	 //TODO Editovaci formular upravit na to aby fungoval php
    //vypis
	$query = "SELECT id ,meno, id_titul FROM ucitel WHERE id=".$_GET["id"];  //vypisem jeden konkretny zaznam
	// WHERE podmienka mi urcit podla coho je vyber stlpec id= odoslanu parametru metodou GET (id)
	$result = mysqli_query($link, $query); // mysqli_query - vykona prikaz
	if (!$result) { // ! $result zneguje false vyroby z neho true - ak sa db nepodarilo vykonat prikaz
        echo "Error: Neda sa vykonat prikazSQL: ".$query.".<br>".PHP_EOL; // PHP_EOL je konstanta na koniec riadku
        exit;	// exit - ukonci vykonavanie PHP programu
	 }
	 
	 //echo "Vypis cez asociativne pole<br>";
	 while ($row = mysqli_fetch_assoc($result))  // pokial budu existovat riadky v DB tak sa bude opakovat akcia medzi zatvrokami
	 {
        //printf ("%s (%s)</br>\n", $row["id"], $row["meno"]); // id a meno su mena z tabulky s mysql databazy
        //echo "ID: ".$row["id"]." Meno: ".$row["meno"]."";
   			$query_titul = "SELECT id_titul, meno_titul FROM titul";  //vypisem jeden konkretny zaznam
			$result_titul = mysqli_query($link, $query_titul); // mysqli_query - vykona prikaz     
        ?>
	
    <form action="formular.php" method="POST">
		<table width="500px" border="1" align="center">
		<tr><td rowspan="<?php echo mysqli_num_rows($result_titul)+1;?>"><input type="hidden" name="id" value="<?php echo $row["id"];?>">
		<input type="text" name="meno" value="<?php echo $row["meno"];?>"></td></tr>
		
		<?php 
		    //vypis titulov
			$query_titul = "SELECT id_titul, meno_titul FROM titul";  //vypisem jeden konkretny zaznam
			$result_titul = mysqli_query($link, $query_titul); // mysqli_query - vykona prikaz
			while ($row_titul = mysqli_fetch_assoc($result_titul))  // pokial budu existovat riadky v DB tak sa bude opakovat akcia medzi zatvrokami
			{
		?>
		  <tr><td>
		  <input type="radio" name="id_titul" value="<?php echo $row_titul["id_titul"];?>"
		  <?php
			if ($row["id_titul"]==$row_titul["id_titul"]):
			 echo ' checked="checked" ';
			endif;
		  ?>
		  
		  <label for="male"><?php echo $row_titul["meno_titul"];?></label>
		  </td></tr>
		  
		<?php
			}
		?>
		
		<input type="hidden" name="ulozit" value="ano">
		<input type="submit" value="Uloz zmeny"></br>
	</form> 

        <?php
	 }
	 
	 mysqli_close($link); // odpojim sa od DB
 }
else
 {
	echo "Editacia nie je mozna!<br>";
 }
	?>

	</table>
	</body>
</html>
