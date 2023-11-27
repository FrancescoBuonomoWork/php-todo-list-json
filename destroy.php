<?php 

$id = $_POST['id'] ?? '';
// var_dump($id);

$response = [
    'success' => true,
];

 // leggere il contenuto del file json 
 $todos_string = file_get_contents('./todos.json');
 //decodicficare il file json per ottenere l array
 $todos = json_decode($todos_string, true);

//  codice per rimuove la todo
    $todoDel = array_slice($todos,intval($id),1);

    $response['result'] = $todos;
   // risalvare il file:
  // - codificare la stringa json dall'array di todos
  $todos_string = json_encode($todos);
  // - salvare il file con il nuovo contenuto
  file_put_contents('./todos.json', $todos_string);

header('Content-Type: application/json');
echo json_encode($response);