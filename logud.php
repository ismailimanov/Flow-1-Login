<?php
// Henter config filen
require_once("inc/config.php");

/// Tjekker hvis man ikke er logget ind endnu (Sessionen loggetInd ikke har en værdi)
if(!isset($_SESSION["loggetInd"])){
    // Sender en tilbage til forsiden, for at logge ind
    header("Location: index.php");
} else {
    // Ændre online status på databasen
    mysqli_query($link, "UPDATE bruger SET onlineStatus='0' WHERE id='{$_SESSION["brugerID"]}'");
    // Sletter alle sessioner
    session_destroy();
    // Sender videre til forsiden igen
    header("Location: index.php");
}