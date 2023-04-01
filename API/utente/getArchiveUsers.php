<?php
require __DIR__ . '/../../COMMON/connect.php';
require __DIR__ . '/../../MODEL/utente.php';
header("Content-type: application/json; charset=UTF-8");

$db = new Database();
$conn = $db->connect();
$utente = new Utente($conn);
$result = $utente->getArchiveUsers();

if ($result != false) {
    $utenti = array();
    while ($row = $result->fetch_assoc())
    {
        $utenti[] = $row;
    }
    echo json_encode($utenti, JSON_PRETTY_PRINT);
} else {
    http_response_code(400);
    echo json_encode(["message" => "User not found"]);
}
?>