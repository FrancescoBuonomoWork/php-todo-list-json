<?php
require_once __DIR__ .'/functions.php';
// recuperare il parametro dal $_POST
$searchId = $_POST['id'] ?? '';
$searchId = intval($searchId);

$todos = loaderTasks();

// codice del toggle 
if ($searchId >= 0 && $searchId < count($todos)) {
    $todos[$searchId]['done'] = !$todos[$searchId]['done'];
}

$response = [ 
    'success' => true,
    'result' => $todos,
];
saverTasks($todos);

   
header('Content-Type: application/json');
echo json_encode($response);