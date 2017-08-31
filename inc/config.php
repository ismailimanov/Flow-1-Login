<?php
// Starter session på den første linje der bliver indlæst på siden.
session_start();

// Tilslutter til databasen
$link = mysqli_connect("localhost","root","","login");

// Tjekker hvis der er fejl i forbindelsen
if (mysqli_connect_errno()){
    // Udskriver fejlen, hvis der er en
    echo "Kunne ikke tilslutte til databasen. " . mysqli_connect_error();
}

// Inkludere functions filen
include("functions.php");
?>