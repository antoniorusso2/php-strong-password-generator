<?php

//1. CREAZIONE DELLA PASSWORD
//- impostare un array con un alfabeto
//- array con numeri da 0 a 9
//- array con simboli

$password_rules = [
    "length" =>  5,
    "uppercase" =>  1,
    "lowercase" =>  1,
    "numbers" =>  1,
    "symbols" =>  1
];

$lowercase = range('a', 'z'); //funzione range ritorna un array di valori compresi tra il primo parametro che indica il punto di inizio ed il parametro finale

$uppercase = range('A', 'Z');

//array che comprende lettere maiuscole e minuscole
$alphabet = array_merge($lowercase, $uppercase);

$numbers = range(0, 9);

$symbols = ['!', '@', '#', '$', '%', '&', '*'];

$password_characters = [
    &$alphabet,
    &$numbers,
    &$symbols
];

// var_dump($alphabet);

function generatePassword(array $rules, array $characters_lists): string
{
    $password = ''; //inizializzazione password

    while (strlen($password) < $rules["length"]) {
        //genero un numero casuale tra 0 e 2 per prendere l'array di caratteri corrispondente
        $random_index = random_int(0, 2); // array_index

        //array di caratteri casuale tra lettere simboli e numeri
        $random_characters_list = $characters_lists[$random_index];

        //elemento casuale dall'array di caratteri
        $random_character = $random_characters_list[random_int(0, count($random_characters_list) - 1)];

        //se il carattere non è gia presente in array lo vado ad aggiungere
        // if (!str_contains($random_character, $password)) {
        //     // $password .= $random_character;
        //     echo "\n $random_character is already in $password";
        // }

        $password .= $random_character;


        //controllo che sia presente almeno un carattere minuscolo uno maiuscolo, un numero ed un simbolo
    }

    return $password;
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
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    Password generator
                </h1>
            </div>
            <p>
                password:
                <?php echo "<br>" . generatePassword($password_rules, $password_characters) ?>
            </p>
        </div>
    </div>

</body>

</html>