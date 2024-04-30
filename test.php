<?php
// Gelen isteğin methodunu kontrol etme
$method = $_SERVER['REQUEST_METHOD'];

// Sadece POST isteklerini kabul etme
if ($method !== 'POST') {
    http_response_code(405);
    echo json_encode(array('message' => 'Method Not Allowed'));
    exit;
}

// Gelen isteğin içeriğinin JSON formatında olup olmadığını kontrol etme
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if ($contentType !== 'application/json') {
    http_response_code(400);
    echo json_encode(array('message' => 'Content Type Must Be JSON'));
    exit;
}

// Gelen JSON verisini alma
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, true);

// Eğer gelen JSON verisi boşsa veya geçerli değilse hata gönderme
if (empty($input)) {
    http_response_code(400);
    echo json_encode(array('message' => 'Invalid JSON Data'));
    exit;
}

// Gelen veriyi işleme
$responseData = array('message' => 'Received data successfully', 'data' => $input);

// Yanıtı JSON formatında gönderme
http_response_code(200);
header('Content-Type: application/json');
echo json_encode($responseData);
