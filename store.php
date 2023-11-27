<?php
require_once __DIR__ .'/functions.php';
// recuperare il parametro dal $_POST
$new_todo = $_POST['todo'] ?? '';
$response = [
    'success' => true,
];
// var_dump($response);
if ($new_todo !== '') {
    $todos = loaderTasks();
    // pushare il todo nei todos
    $todos[] = [
        'text' => $new_todo['text'],
        'done' => false
    ];
    
    // Mettere il todos alla risposta
    $response['result'] = $todos;
    saverTasks($todos);

} else {
    $response['success'] = false;
    $response['message'] = 'Todo params is required!';
}

header('Content-Type: application/json');
echo json_encode($response);