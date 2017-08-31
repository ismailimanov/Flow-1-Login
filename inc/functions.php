<?php
// Oprettet funktionen opretBruger
function opretBruger($link, $brugernavn, $kodeord, $fornavn, $efternavn, $email, $telefon)
{
    // Henter informationer på en bruger med den indtastede brugernavn eller email
    $tjekBrugernavn = mysqli_query($link, "SELECT * FROM bruger WHERE brugernavn='{$brugernavn}'");
    $tjekEmail      = mysqli_query($link, "SELECT * FROM bruger WHERE email='{$email}'");

    // Tjekker hvis der er en match allerede
    if (mysqli_num_rows($tjekBrugernavn) >= 1) {
        // Opretter en global variable ved navn opretFejl, med fejlbeskedens værdi.
        $GLOBALS["opretFejl"] = "Brugernavnet er optaget.";
    } elseif(mysqli_num_rows($tjekEmail) >= 1) {
        $GLOBALS["opretFejl"] = "E-mail adressen er allerede i brug.";
    } else {
        $GLOBALS["opretBesked"] = "Din bruger er nu oprettet!";
        // Opretter brugeren. Sender de forskellige værdier ind til databasen.
        mysqli_query($link, "INSERT INTO bruger (brugernavn, kodeord, fornavn, efternavn, email, telefon) VALUES ('{$brugernavn}', '{$kodeord}', '{$fornavn}', '{$efternavn}', '{$email}', '{$telefon}')");
    }
}

function login($link, $brugernavn, $kodeord){
    // Henter informationer på en bruger med den indtastede brugernavn
    $tjekBruger = mysqli_query($link, "SELECT * FROM bruger WHERE brugernavn='{$brugernavn}'");
    // Tjekker hvis der er en direkte match
    if(mysqli_num_rows($tjekBruger) == 1){
        // Henter informationerne ned på brugeren med det indtastede brugernavn, og laver en array
        $hentBrugerInfo = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM bruger WHERE brugernavn='{$brugernavn}'"));
        // Tjekker hvis den indtastede kodeord matcher med den hash som brugerens adgangskode allerede har fra databasen.
        if(password_verify($kodeord, $hentBrugerInfo["kodeord"])){
            // Opdater online status
            mysqli_query($link, "UPDATE bruger SET onlineStatus='1' WHERE brugernavn='{$brugernavn}'");
            // Opret session
            $_SESSION["loggetInd"] = 1;
            $_SESSION["brugerID"] = $hentBrugerInfo["id"];
            // Sender videre til secret siden.
            header("Location: secret.php");
        } else {
            $GLOBALS["loginFejl"] = "Forkert kodeord.";
        }
    } else {
        $GLOBALS["loginFejl"] = "Brugeren findes ikke.";
    }
}