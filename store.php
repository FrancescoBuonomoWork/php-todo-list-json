<?php
// $todos = [
//     [
//         'text' => 'PHP',
//         'done' => false
//     ],
//     [
//         'text' => 'JavaScript',
//         'done' => false
//     ],
//     [
//         'text' => 'HTML',
//         'done' => true
//     ],
//     [
//         'text' => 'CSS',
//         'done' => true
//     ]
// ];
// recuperare il parametro dal $_POST
$new_todo = $_POST['todo'] ?? '';
$response = [
    'success' => true,
];
// var_dump($response);
if ($new_todo !== '') {
    // leggere il contenuto del file json 
    $todos_string = file_get_contents('./todos.json');
    //decodicficare il file json per ottenere l array
    $todos = json_decode($todos_string, true);
    // pushare il todo nei todos
    $todos[] = [
        'text' => $new_todo['text'],
        'done' => false
    ];
    
    // Mettere il todos alla risposta
    $response['result'] = $todos;

    // risalvare il file:
  // - codificare la stringa json dall'array di todos
  $todos_string = json_encode($todos);
  // - salvare il file con il nuovo contenuto
  file_put_contents('./todos.json', $todos_string);

} else {
    $response['success'] = false;
    $response['message'] = 'Todo params is required!';
}

header('Content-Type: application/json');
echo json_encode($response);