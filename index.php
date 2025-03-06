<?php
require_once("./functions.php");
session_start();
// session_destroy();
//1. CREAZIONE DELLA PASSWORD
//- impostare un array con un alfabeto
//- array con numeri da 0 a 9
//- array con simboli


$length = $_POST['length'] ?? '';


$password_rules = [
    "length" =>  (int)$length,
    "uppercase" =>  $_POST['uppercase'] ?? false,
    "lowercase" =>  $_POST['lowercase'] ?? false,
    "numbers" =>  $_POST['numbers'] ?? false,
    "symbols" =>  $_POST['symbols'] ?? false
];



if (isset($length) && $length != '') {
    $password = generatePassword($password_rules);
    $_SESSION['password'] = &$password;

    header('Location: ./result.php');
    exit();
} else {
    echo ('<div class="message">Selezionare un numero da 8 a 32</div>');
}

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
    <main class="main-content">

        <div class="col-12">
            <h1>
                Password generator
            </h1>
        </div>

        <section class="password-requirements">
            <div class="container">
                <div class="row">
                    <form class="col-12 form" action="./index.php" method="post">
                        <label for="length">Inserisci la lunghezza desiderata per la password</label>
                        <input type="number" name="length" value="8" id="length" min="8" max="32">

                        <label for="uppercase">Includi lettere maiuscole</label>
                        <input type="checkbox" name="uppercase" id="uppercase" checked>

                        <label for="lowercase">Includi lettere minuscole</label>
                        <input type="checkbox" name="lowercase" id="lowercase" checked>

                        <label for="numbers">Includi numeri</label>
                        <input type="checkbox" name="numbers" id="numbers" checked>

                        <label for="symbols">Includi simboli</label>
                        <input type="checkbox" name="symbols" id="symbols" checked>

                        <button class="btn" type="submit">Crea Password</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>

</html>