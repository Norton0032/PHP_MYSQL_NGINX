<?php
$url = 'http://api_server:80/api/posts/update.php';
$headers = ['Content-Type: application/json']; // заголовки нашего запроса
$post_data = [ // поля нашего запроса
    'id' => $_POST['id'],
    'text' => $_POST['text'],
    'ID_user' => $_POST['ID_user']
];
$data_json = json_encode($post_data); // переводим поля в формат JSON
$curl = curl_init();
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_VERBOSE, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_json);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
$result = curl_exec($curl); // результат POST запроса 
header('Location: ../../index.php');
