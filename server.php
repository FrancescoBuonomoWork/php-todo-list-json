<?php

// leggere il contenuto del file json 
$todos_string = file_get_contents('./todos.json');
//decodicficare il file json per ottenere l array
$todos = json_decode($todos_string, true);
 // risalvare il file:
  // - codificare la stringa json dall'array di todos
  $todos_string = json_encode($todos);
  // - salvare il file con il nuovo contenuto
  file_put_contents('./todos.json', $todos_string);
$response = [
    'success' => true,
    'result' => $todos
];

header('Content-Type: application/json');
// formatta in formato json 
echo json_encode($response);
