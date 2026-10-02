<?php
header('Content-Type: application/json');
$texts = [
    "",
];

$response = [
    'status' => 'success',
    'text' => $texts[array_rand($texts)]
];

echo json_encode($response);