<?php
    $dsn = 'mysql:dbname=metel_blogging;host=localhost';
    $username = 'root';
    $password = '';
    
    $con = new PDO($dsn, $username, $password);

    $discord_webhook = "https://discord.com/api/webhooks/";
?>
