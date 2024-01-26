<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: http://localhost:5173');
// header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');


// Ottenere i dati dal file JSON
$jsonTasks = file_get_contents("tasks.json");
$todoList = json_decode($jsonTasks, true);

// Stampa di debug
// var_dump($jsonTasks);
// var_dump($todoList);

// Restituisci il JSON come risposta
echo json_encode($todoList);




// $todoList = [
//     [
//         'id' => 1,
//         'title' => 'Catturare Pikachu',
//         'description' => 'Trova Pikachu e catturalo con una Poké Ball.',
//         'fatto' => false
//     ],
//     [
//         'id' => 2,
//         'title' => 'Sconfiggere il Team Rocket',
//         'description' => 'Affronta il Team Rocket e sconfiggili per proteggere la città.',
//         'fatto' => true
//     ],
//     [
//         'id' => 3,
//         'title' => 'Evolvere il tuo Pokémon',
//         'description' => 'Porta il tuo Pokémon in una Palestra per farlo evolvere e potenziarlo.',
//         'fatto' => false
//     ]
// ];

// $todoListJson = json_encode($todoList);

// echo $todoListJson;
