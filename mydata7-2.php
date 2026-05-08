<?php
header("Content-Type: application/json");

$users = [
    1 => ["id" => 1, "name" => "avinash", "email" => "avinash03@gmail.com"],
    2 => ["id" => 2, "name" => "manoj", "email" => "manoj@gmail.com"],
    3 => ["id" => 3, "name" => "khushal", "email" => "khushal303@gmail.com"]
];

$request = $_SERVER['REQUEST_URI'];

$parts = explode("/", $request);

$id = null;
foreach ($parts as $key => $value) {
    if ($value == "user") {
        $id = $parts[$key + 1] ?? null;
        break;
    }
}

if ($id && isset($users[$id])) {
    echo json_encode($users[$id]);
} else {
    echo json_encode([
        "error" => "User not found"
    ]);
}
?>