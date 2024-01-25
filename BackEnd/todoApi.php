<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

$todoList = array(
    array(
        'id' => 1,
        'title' => 'Catturare Pikachu',
        'description' => 'Trova Pikachu e catturalo con una Poké Ball.',
        'fatto' => false
    ),
    array(
        'id' => 2,
        'title' => 'Sconfiggere il Team Rocket',
        'description' => 'Affronta il Team Rocket e sconfiggili per proteggere la città.',
        'fatto' => true
    ),
    array(
        'id' => 3,
        'title' => 'Evolvere il tuo Pokémon',
        'description' => 'Porta il tuo Pokémon in una Palestra per farlo evolvere e potenziarlo.',
        'fatto' => false
    )
);

echo json_encode($todoList);
