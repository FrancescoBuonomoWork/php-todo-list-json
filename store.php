<?php
// recuperare il parametro dal $_POST
$new_todo = $_POST['todo'] ?? '';
// echo $new_todo;
var_dump($new_todo);
if($new_todo){
    // $new_todo_text = [$new_todo['text']];
    // var_dump($new_todo_text);
    $todos[] = [
        [
            'text' => $new_todo['text'],
            'done' => false
        ],
    ];
    var_dump($todos);

    
}