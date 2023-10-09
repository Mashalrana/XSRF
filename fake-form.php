<!DOCTYPE html>
<html>
<head>
    <title>Leaky-Guestbook</title>
    <style>
        body {
            width: 100%;
        }

        .body-container {
            background-color: aliceblue;
            width: 200px;
            height: 100%;
            margin-left: auto;
            margin-right: auto;
            padding-left: 100px;
            padding-right: 100px;
        }

        .heading {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="body-container">
    <h1 class="heading">Gastenboek 'De lekkage'</h1>
    <form method="POST" action="guestbook.php">
        Email: <input id="email" type="email" name="email"><br/>
        <input type="hidden" name="color" value="red">
        Bericht: <textarea id="bericht" name="text" minlength="4"></textarea><br/>
        
        <?php
        session_start();

        // Genereer een willekeurige CSRF-token als deze nog niet is ingesteld in de sessie
        if (!isset($_SESSION["csrf_token"])) {
            $_SESSION["csrf_token"] = bin2hex(random_bytes(32)); // Genereer een 32-byte token
        }
        ?>

        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION["csrf_token"]; ?>">

        <input type="submit" value="Verstuur">
    </form>
    <hr/>
</div>
</body>
</html>
