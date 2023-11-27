<?php
// recuperare il parametro dal $_POST
$id = $_POST['id'] ?? '';
$id = intval($id);
$response = [
    'success' => true,
];
// leggere il contenuto del file json 
$todos_string = file_get_contents('./todos.json');
//decodicficare il file json per ottenere l array
$todos = json_decode($todos_string, true);

// codice del toggle 
foreach ($todos as $key => $value) {
    if($key == 'done'|| $id === $i){
        
    }
}
// for($i=0;$i < count($todos);$i++) {
//     if($i === $id){
//         if($todos['done']=== false){
//           return  $todos['done'] = true;
//         } else{
//          return  $todos['done'] = false;
//         }
//     }
// }


$response = [ 
    'result' => $todos,
];
// if ($currentTodo['done'] === false) {
//     $currentTodo['done'] = true;
// } else {
//     $currentTodo['done'] = false;
// }
// risalvare il file:
// - codificare la stringa json dall'array di todos
$todos_string = json_encode($todos);
// - salvare il file con il nuovo contenuto
file_put_contents('./todos.json', $todos_string);

   



header('Content-Type: application/json');
echo json_encode($response);