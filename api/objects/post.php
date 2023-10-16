<?php

class Post
{
    private $conn;
    private $table_name = "posts";

    // свойства объекта
    public $id;
    public $text;
    public $ID_user;


    // конструктор для соединения с базой данных
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // метод для получения товаров
function read()
{
    // выбираем все записи
    $query = "SELECT * FROM posts";

    // подготовка запроса
    $stmt = $this->conn->prepare($query);

    // выполняем запрос
    $stmt->execute();
    return $stmt;
}
// метод для создания товаров
function create()
{
    // запрос для вставки (создания) записей
    $query = "INSERT INTO " . $this->table_name . " (text, ID_user) VALUES (?, ?)";

    // подготовка запроса
    $stmt = $this->conn->prepare($query);
    // выполняем запрос
    if ($stmt->execute([$this->text, $this->ID_user])) {
        return true;
    }
    return false;
}
// метод для получения конкретного товара по ID
function readOne(){
    // запрос для чтения одной записи (товара)
    $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
            
    // подготовка запроса
    $stmt = $this->conn->prepare($query);

    // выполняем запрос
    $stmt->execute([$this->id]);

    // получаем извлеченную строку
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // установим значения свойств объекта
    $this->text = $row["text"];
    $this->ID_user = $row["ID_user"];
}
function update()
{
    // запрос для обновления записи (товара)
    $query = "UPDATE " . $this->table_name . " SET text=?, ID_user=? WHERE  id=?";

    // подготовка запроса
    $stmt = $this->conn->prepare($query);
    // выполняем запрос
    if ($stmt->execute([$this->text, $this->ID_user, $this->id])) {
        return true;
    }
    return false;
}
function delete()
{
    // запрос для удаления записи (товара)
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

    // подготовка запроса
    $stmt = $this->conn->prepare($query);

    // выполняем запрос
    if ($stmt->execute([$this->id])) {
        return true;
    }
    return false;
}
}