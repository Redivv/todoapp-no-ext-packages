<?php

$db = new PDO("mysql:dbname=todo", 'todo', 'admin');
$stmt = $db->prepare("SELECT name FROM tables WHERE user_id = ?");
$stmt->execute([
    $_SESSION['user_id']
]);

$jsonResponse = json_encode($stmt->fetchAll(PDO::FETCH_COLUMN));

http_response_code(200);
header('Content-type: application/json');
echo $jsonResponse;
exit;
