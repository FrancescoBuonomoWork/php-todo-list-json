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

$response = [
    'success' => true,
    'result' => $todos
];

header('Content-Type: application/json');
echo json_encode($response);
