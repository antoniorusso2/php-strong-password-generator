<?php

//1. CREAZIONE DELLA PASSWORD
//- impostare un array con un alfabeto
//- array con numeri da 0 a 9
//- array con simboli

$alphabet = range('a', 'z'); //funzione range ritorna un array di valori compresi tra il primo parametro che indica il punto di inizio ed il parametro finale
$numbers = range(0, 9);
$symbols = ['!', '@', '#', '$', '%', '&', '*'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password generator</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    Password generator
                </h1>
            </div>
        </div>
    </div>

</body>

</html>