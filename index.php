<?php
// Henter config filen
require_once("inc/config.php");

// Tjekker hvis "login" har fået en værdi (Knappen er blevet trykket på)
if(isset($_POST["login"])){
    // Henter de forskellige værdier fra input felterne
    $brugernavn = strip_tags(htmlspecialchars(strtolower($_POST["brugernavn"])));
    $kodeord = $_POST["kodeord"];

    // Kalder på funktionen login
    login($link, $brugernavn, $kodeord);
}

// Tjekker hvis man allerede er logget ind (Hvis sessionen loggetInd har en værdi)
if(isset($_SESSION["loggetInd"])){
    // Sender en videre til secret siden
    header("Location: secret.php");
}
?>
<!DOCTYPE html>
<html lang="da">
    <head>
        <title>Flow 1 - Login</title>
        <link href="css/main.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
                <?php
                    if(isset($GLOBALS["loginFejl"])){
                        echo '<div class="fejlBesked">' . $GLOBALS["loginFejl"] . '</div>';
                    }
                ?>
                <input class="loginField" type="text" name="brugernavn" placeholder="Brugernavn.." autofocus required>
                <input class="loginField" type="password" name="kodeord" placeholder="Kodeord.." required>
                <input class="loginButton" type="submit" name="login" value="Log ind">
            </form>
            <div class="register">
                <a href="register.php">Opret Konto</a>
            </div>
        </div>
    </body>
</html>