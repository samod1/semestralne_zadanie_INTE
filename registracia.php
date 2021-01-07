<?php
$conn = "";
require_once "config.php";


$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //overenie ci uz nexistuje uzivatel

    if (empty(trim($_POST["username"]))) {
        $username_err = "Zadaj prosím svoje prihlasovacie meno.";
    } else {

        $sql = "SELECT idUser FROM USER WHERE username = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                //vysledok ulozenia
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "<p style='color: red;'><b>Toto uzivatelske meno sa uz pouziva</b></p>";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Ups! Skús to neskôr prosím";
            }

            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Zadaj prosím heslo.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Heslo musí mať najmenej 6 znakov";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Prosím potvrď heslo";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO USER (username, password) VALUES (?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                header("location: prihlas_sa.php");
            } else {
                echo "Skuste to neskor prosim, vyskytla sa chyba";
            }

            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>

<html lang="sk-SK">
<head>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <meta charset="UTF-8">
    <title>Registruj sa</title>
    <meta name="author" content="Samuel Domin"
    <meta name="keyword" content="HTML, CSS, JavaScript, PHP">
    <meta name="description" content="Semestralny projekt INTE">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- IKONY -->

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
        <li><a class="nav" href="index.php"><i class="fa fa-home fa-fw"></i></a></li>
        <li><a class="nav" href="popis.php">POPIS PROJETKU</a></li>
        <li><a class="nav" href="vloz.php">VKLADANIE</a></li>
        <li><a class="nav" href="citaj.php">CITANIE/MAZANIE/UPRAVOVANIE</a></li>
        <li><a class="nav" href="popis.php">INE PROJEKTY</a></li>
        <li><a class="nav" href="contact.php">KONTAKT</a></li>
        <li><a class="nav" href="https://github.com/samod1/semestralne_zadanie_INTE.git">ZDROJOVE KODY</a></li>


    </ul>
    <div class="wrapper">
        <h2>Zaregistrujte sa</h2>
        <p>Vyplnte tento formular a poberajte vsetky vyhody tejto stranky</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Prihlasovacie meno</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Heslo</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Zopakuj heslo</label>
                <input type="password" name="confirm_password" class="form-control"
                       value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Registruj">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Máš už u nás účet? <a href="prihlas_sa.php">Prihlás sa</a>.</p>
        </form>
    </div>
</body>
</html>