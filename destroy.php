<?php
require_once __DIR__ .'/functions.php';

$id = $_POST['id'] ?? '';
// var_dump($id);

$response = [
    'success' => true,
];

$todos = loaderTasks();

//  codice per rimuove la todo
array_splice($todos, intval($id), 1,);

$response['result'] = $todos;

saverTasks($todos);

header('Content-Type: application/json');
echo json_encode($response);
