<?php
$todos = [
    [
        'text' => 'PHP',
        'done' => false
    ],
    [
        'text' => 'JavaScript',
        'done' => false
    ],
    [
        'text' => 'HTML',
        'done' => true
    ],
    [
        'text' => 'CSS',
        'done' => true
    ]
];
// recuperare il parametro dal $_POST
$new_todo = $_POST['todo'] ?? '';
$response = [
    'success' => true,
];
// var_dump($response);
if ($new_todo) {
    // pushare il todo nei todos
    $todos[] = [
        'text' => $new_todo['text'],
        'done' => false
    ];
    
    // Mettere il todos alla risposta
    $response['result'] = $todos;

} else {
    $response['success'] = false;
    $response['message'] = 'Todo params is required!';
}

header('Content-Type: application/json');
echo json_encode($response);