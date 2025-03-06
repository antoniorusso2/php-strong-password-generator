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

function generatePassword(array $rules): string
{
    // $password = initializePassword($characters_lists); //inizializzazione password
    // var_dump($rules);
    $lowercase = range('a', 'z');
    $uppercase = range('A', 'Z');
    $numbers = range(0, 9);
    $symbols = ['!', '@', '#', '$', '%', '&', '*'];

    $password_characters = [];
    if ($rules['uppercase']) {
        $password_characters[] = $uppercase;
    }

    if ($rules['lowercase']) {
        $password_characters[] = $lowercase;
    }

    if ($rules['numbers']) {
        $password_characters[] = $numbers;
    }

    if ($rules['symbols']) {
        $password_characters[] = $symbols;
    }


    $characters_lists = $password_characters;

    $password = [];

    while (count($password) < $rules['length']) {
        //genero un numero casuale tra 0 e 2 per prendere l'array di caratteri corrispondente tramite index
        $random_list_index = random_int(0, count($characters_lists) - 1); // array_index

        //array di caratteri casuale tra lettere simboli e numeri
        $characters = &$characters_lists[$random_list_index]; //array di caratteri

        //random index per il singolo carattere
        $random_character_index = random_int(0, count($characters) - 1);

        //elemento casuale dall'array di caratteri
        $random_character = &$characters[$random_character_index];

        //se il carattere non è gia presente nella password lo vado ad aggiungere
        if (!in_array($random_character, $password)) {
            $password[] = $random_character;
        }
    }

    //mischio i caratteri in array
    // var_dump($password);
    shuffle($password);

    //ritorno la password sotto forma di stringa
    return implode($password);
}
