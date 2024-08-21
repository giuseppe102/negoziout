<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera l'email inviata dal form e la sanitizza
    $user_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Verifica che l'indirizzo email sia valido
    if (filter_var($user_email, FILTER_VALIDATE_EMAIL)) {

        // Invia una email di conferma o benvenuto all'utente
        $subject = "Grazie per esserti iscritto!";
        $message = "Ciao!\n\nGrazie per esserti iscritto al nostro servizio. Presto riceverai aggiornamenti da noi.\n\nCordiali saluti,\nIl Team";
        $headers = "From: tuoindirizzo@example.com";

        if (mail($user_email, $subject, $message, $headers)) {
            echo "Email di conferma inviata con successo!";
        } else {
            echo "Si è verificato un errore nell'invio dell'email di conferma.";
        }

        // (Opzionale) Invia una email di notifica a te stesso
        $admin_email = "tuoindirizzo@example.com";
        $admin_subject = "Nuova iscrizione alla newsletter";
        $admin_message = "Un nuovo utente si è iscritto con l'indirizzo email: " . $user_email;
        mail($admin_email, $admin_subject, $admin_message, $headers);

    } else {
        echo "Indirizzo email non valido.";
    }
}
?>
