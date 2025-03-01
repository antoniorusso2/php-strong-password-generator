<?php

function initializePassword(array $arrays): array
{
    foreach ($arrays as $array) {
        //recupero l'ultimo index
        $last_index = count($array) - 1;
        //aggiungo un carattere casuale per ogni elemento dell'array alla password che alla fine verrà mescolata
        $password[] = $array[random_int(0, $last_index)];
    }

    return $password;
}

//1. CREAZIONE DELLA PASSWORD
//- impostare un array con un alfabeto
//- array con numeri da 0 a 9
//- array con simboli
$lowercase = range('a', 'z');
$uppercase = range('A', 'Z');
$numbers = range(0, 9);

$password_rules = [
    "length" =>  $_GET['length'] ?? 8,
    "uppercase" =>  1,
    "lowercase" =>  1,
    "numbers" =>  1,
    "symbols" =>  1
];

$symbols = ['!', '@', '#', '$', '%', '&', '*'];

$password_characters = [
    $lowercase,
    $uppercase,
    $numbers,
    $symbols
];

$password = initializePassword($password_characters); //inizializzazione password
// var_dump($alphabet);

function generatePassword(array $rules, array &$characters_lists): string
{
    global $password;

    while (count($password) < $rules['length']) {

        //genero un numero casuale tra 0 e 2 per prendere l'array di caratteri corrispondente tramite index
        $random_list_index = random_int(0, count($characters_lists) - 1); // array_index

        //array di caratteri casuale tra lettere simboli e numeri
        $characters = &$characters_lists[$random_list_index]; //array di caratteri

        //random index per il singolo carattere
        $random_character_index = random_int(0, count($characters) - 1);

        //elemento casuale dall'array di caratteri
        $random_character = &$characters[$random_character_index];

        // var_dump("char:", $random_character, "\n",  !str_contains($password, $random_character));

        //se il carattere non è gia presente nella password lo vado ad aggiungere
        if (!in_array($random_character, $password)) {
            $password[] = $random_character;
        }
    }

    //mischio i caratteri in array
    shuffle($password);

    //ritorno la password sotto forma di stringa
    return implode($password);
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
                    <form class="col-12 form" action="">
                        <label for="length">Inserisci la lunghezza desiderata per la password</label>
                        <input type="number" name="length" id="length" value="8" min="8" max="32">

                        <button type="submit">Crea</button>
                    </form>
                    <p>
                        password:
                        <?php

                        echo "<br>" . generatePassword($password_rules, $password_characters);
                        ?>
                    </p>
                </div>
            </div>
        </section>
    </main>
</body>

</html>