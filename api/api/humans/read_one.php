<?php
// необходимые HTTP-заголовки
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json");

// подключение файла для соединения с базой и файл с объектом
include_once "../../config/database.php";
include_once "../../objects/human.php";

// получаем соединение с базой данных
$database = new Database();
$db = $database->getConnection();

// подготовка объекта
$human = new Human($db);

// установим свойство ID записи для чтения
$human->id = isset($_GET["id"]) ? $_GET["id"] : die();

// получим детали товара
$human->readOne();

if ($human->name != null) {

    // создание массива
    $human_arr = array(
        "id" =>  $human->id,
        "name" => $human->name,
        "surname" => $human->surname
    );

    // код ответа - 200 OK
    http_response_code(200);

    // вывод в формате json
    echo json_encode($human_arr);
} else {
    // код ответа - 404 Не найдено
    http_response_code(404);

    echo json_encode(array("message" => "Не существует"), JSON_UNESCAPED_UNICODE);
}