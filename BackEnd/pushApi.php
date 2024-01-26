<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: http://localhost:5173');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');

// Leggi i dati dalla richiesta POST
$data = file_get_contents("php://input");
$newTaskData = json_decode($data);

// Carica i dati attuali dal file JSON
$jsonTasks = file_get_contents("tasks.json");
$todoList = json_decode($jsonTasks, true);

// Verifica che il campo "text" sia presente e non sia null
if (isset($newTaskData->text) && $newTaskData->text !== null) {
    $text = $newTaskData->text;

    // Aggiungi il nuovo task
    $newTask = [
        "id" => count($todoList) + 1,
        "title" => $text,
        "description" => "",
        "fatto" => false,
    ];

    $todoList[] = $newTask;

    // Aggiorna il file JSON con la nuova lista
    file_put_contents("tasks.json", json_encode($todoList));
}

// Restituisci la lista aggiornata come JSON
echo json_encode($todoList);
