<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Controleer of het CSRF-token overeenkomt met wat is opgeslagen in de sessie
    if (!isset($_POST["csrf_token"]) || $_POST["csrf_token"] !== $_SESSION["csrf_token"]) {
        die("Ongeldige CSRF-token. Het formulier is niet toegestaan.");
    }

    // Verwerk het formulier en voeg het bericht toe aan het gastenboek
    // Voer hier je berichtverwerking uit

    // Verwijder het CSRF-token uit de sessie om te voorkomen dat het opnieuw wordt gebruikt
    unset($_SESSION["csrf_token"]);
}
?>
