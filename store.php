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
// echo $new_todo;
$response = [
    'success' => true,
  ];
// var_dump($response);
// var_dump($new_todo);
if($new_todo){
    // $new_todo_text = [$new_todo['text']];
    // var_dump($new_todo_text);
    $todos[] = [
            'text' => $new_todo['text'],
            'done' => false
    ];
    // var_dump($todos);
    // pushare il todo nei todos 

    
}else {
    $response['success'] = false;
    $response['message'] = 'Todo params is required!';
  }