<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: http://localhost:5173');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');

// Leggi i dati dalla richiesta POST
$data = file_get_contents("php://input");
$taskData = json_decode($data);

// Carica i dati attuali dal file JSON
$jsonTasks = file_get_contents("tasks.json");
$todoList = json_decode($jsonTasks, true);

// Trova il task corrispondente e rimuovilo dalla lista
foreach ($todoList as $key => $task) {
    if ($task['id'] == $taskData->id) {
        unset($todoList[$key]);
        break;
    }
}

// Aggiorna il file JSON con la nuova lista
file_put_contents("tasks.json", json_encode(array_values($todoList)));

// Restituisci la lista aggiornata come JSON
echo json_encode(array_values($todoList));
