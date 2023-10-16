<?php
// необходимые HTTP-заголовки
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json");

// подключение файла для соединения с базой и файл с объектом
include_once "../../config/database.php";
include_once "../../objects/post.php";

// получаем соединение с базой данных
$database = new Database();
$db = $database->getConnection();

// подготовка объекта
$post = new post($db);

// установим свойство ID записи для чтения
$post->id = isset($_GET["id"]) ? $_GET["id"] : die();

// получим детали товара
$post->readOne();

if ($post->text != null) {

    // создание массива
    $post_arr = array(
        "id" =>  $post->id,
        "text" => $post->text,
        "ID_user" => $post->ID_user
    );

    // код ответа - 200 OK
    http_response_code(200);

    // вывод в формате json
    echo json_encode($post_arr);
} else {
    // код ответа - 404 Не найдено
    http_response_code(404);

    echo json_encode(array("message" => "Не существует"), JSON_UNESCAPED_UNICODE);
}