<?php
// Henter config filen
require_once("inc/config.php");

// Tjekker hvis "opret" har fået en værdi (Knappen er blevet trykket på)
if(isset($_POST["opret"])){
    // Henter de forskellige værdier fra input felterne
    $brugernavn = strip_tags(htmlspecialchars(strtolower($_POST["brugernavn"])));
    $kodeord    = password_hash(strip_tags(htmlspecialchars($_POST["kodeord"])), PASSWORD_DEFAULT);
    $fornavn    = strip_tags(htmlspecialchars($_POST["fornavn"]));
    $efternavn  = strip_tags(htmlspecialchars($_POST["efternavn"]));
    $email      = strip_tags(htmlspecialchars(strtolower($_POST["email"])));
    $telefon    = strip_tags(htmlspecialchars($_POST["telefon"]));

    // Kalder på funktionen opretBruger
    opretBruger($link, $brugernavn, $kodeord, $fornavn, $efternavn, $email, $telefon);
}
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <title>Flow 1 - Login - Opret Konto</title>
    <link href="css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
        <?php
        // Tjekker hvis en global værdi ved navn opretFejl er sat
            if(isset($GLOBALS["opretFejl"])){
                // Udskriver fejlbeskeden
                echo '<div class="fejlBesked">' . $GLOBALS["opretFejl"] . '</div>';
            } elseif(isset($GLOBALS["opretBesked"])){
                echo '<div class="opretBesked">' . $GLOBALS["opretBesked"] . '</div>';
            }
        ?>
        <input class="loginField" type="text" name="brugernavn" placeholder="Brugernavn.." autofocus required>
        <input class="loginField" type="password" name="kodeord" placeholder="Kodeord.." required>
        <input class="loginField" type="text" name="fornavn" placeholder="Fornavn.." required>
        <input class="loginField" type="text" name="efternavn" placeholder="Efternavn.." required>
        <input class="loginField" type="email" name="email" placeholder="E-Mail Adresse.." required>
        <input class="loginField" type="tel" name="telefon" placeholder="Telefon Nummer.." required>
        <input class="loginButton" type="submit" name="opret" value="Opret Konto">
    </form>
    <div class="tilbage">
        <a href="index.php">&laquo; Tilbage</a>
    </div>
</div>
</body>
</html>