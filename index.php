<?php
require_once("./functions.php");
session_start();
// session_destroy();
//1. CREAZIONE DELLA PASSWORD
//- impostare un array con un alfabeto
//- array con numeri da 0 a 9
//- array con simboli
$lowercase = range('a', 'z');
$uppercase = range('A', 'Z');
$numbers = range(0, 9);
$symbols = ['!', '@', '#', '$', '%', '&', '*'];

$length = isset($_POST['length']) ? $_POST['length'] : 8;

$password_rules = [
    "length" =>  (int)$length,
    "uppercase" =>  true,
    "lowercase" =>  true,
    "numbers" =>  true,
    "symbols" =>  true
];

$password_characters = [
    $lowercase,
    $uppercase,
    $numbers,
    $symbols
];

if (isset($_POST['length']) && $_POST['length'] != '') {
    $password = generatePassword($password_rules, $password_characters);
    $_SESSION['password'] = &$password;
    // var_dump(isset($_POST['length']));
    header('Location: ./result.php');
    exit();
} else {
    print('Selezionare un numero da 8 a 32');
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
                    <form class="col-12 form" method="post">
                        <label for="length">Inserisci la lunghezza desiderata per la password</label>
                        <input type="number" name="length" id="length" min="8" max="32">

                        <button class="btn" type="submit">Crea Password</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>

</html>