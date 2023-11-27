<?php
// recuperare il parametro dal $_POST
$currentTodo = $_POST['currentTodo'] ?? null;



if ($currentTodo['done'] === false) {
    $currentTodo['done'] === true;
} else {
    $currentTodo['done'] === false;
}

$response= [ 
    'success' => true,
    'result' => $currentTodo,
];
   



header('Content-Type: application/json');
echo json_encode($response);