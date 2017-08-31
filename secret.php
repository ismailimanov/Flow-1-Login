<?php
// Henter config filen
require_once("inc/config.php");

// Tjekker hvis man ikke er logget ind (Hvis sessionen loggetInd ikke er sat)
if(!isset($_SESSION["loggetInd"])){
    // Sender en videre til forsiden igen, så man kan logge ind
    header("Location: index.php");
} else {
    // Henter bruger informationer og antal af brugere som er logget ind (Med værdien 1 på onlineStatus)
    $hentInfo = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM bruger WHERE id='{$_SESSION["brugerID"]}'"));
    $onlineBrugere = mysqli_num_rows(mysqli_query($link, "SELECT * FROM bruger WHERE onlineStatus='1'"));
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <title>Flow 1 - Login - Secret</title>
    <link href="css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <b>Hej <?=$hentInfo["fornavn"]?> <?=$hentInfo["efternavn"]?></b><br>
    <br>
    Dette er kun en side, som kun kan blive set af folk som er logget ind.
    <a href="logud.php"><div class="logudKnap">Log Ud</div></a>
    <hr><br>
    <b>Online brugere (<?=$onlineBrugere?>):</b><br>
    <?php
    // Henter informationer om de brugere som er logget ind (Med værdien 1 på onlineStatus)
        $hentOnlineBrugere = mysqli_query($link, "SELECT * FROM bruger WHERE onlineStatus='1'");

        // Starter en while løkke, for at hente hver række
        while($hOB = mysqli_fetch_array($hentOnlineBrugere)){
            // Udskriver de forskellige navne og email adresser, på de online brugere
            echo "- {$hOB["fornavn"]} {$hOB["efternavn"]} ({$hOB["email"]})";
        }
    ?>
</div>
</body>
</html>
<?php
}
?>