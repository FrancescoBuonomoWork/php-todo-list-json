<?php
require_once __DIR__ .'/functions.php';

$id = $_POST['id'] ?? null;
// var_dump($id);

$response = [
    'success' => true,
];
if($id !== null && is_numeric($id)) {

    $todos = loaderTasks();
    
    //  codice per rimuove la todo
    array_splice($todos, intval($id), 1);
    
    $response['result'] = $todos;
    
    saverTasks($todos);
} else {
    $response = [
        'success' => false,
        'message' => 'parametro id non valido o assente'
    ];
}

header('Content-Type: application/json');
echo json_encode($response);
