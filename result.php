<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>result</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    La tua nuova password:
                </h1>
                <div class="password">
                    <?php

                    echo $_SESSION["password"] ?>
                </div>
                <div class="go-to-homepage">
                    <a class="btn" href="./index.php">Torna alla home page</a>
                </div>
            </div>

        </div>
    </div>

</body>

</html>