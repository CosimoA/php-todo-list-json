<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: http://localhost:5173');
header('Access-Control-Allow-Headers: X-Requested-With');
// header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

$todoList = [
    [
        'id' => 1,
        'title' => 'Catturare Pikachu',
        'description' => 'Trova Pikachu e catturalo con una Poké Ball.',
        'fatto' => false
    ],
    [
        'id' => 2,
        'title' => 'Sconfiggere il Team Rocket',
        'description' => 'Affronta il Team Rocket e sconfiggili per proteggere la città.',
        'fatto' => true
    ],
    [
        'id' => 3,
        'title' => 'Evolvere il tuo Pokémon',
        'description' => 'Porta il tuo Pokémon in una Palestra per farlo evolvere e potenziarlo.',
        'fatto' => false
    ]


];

$todoListJson = json_encode($todoList);

echo $todoListJson;
