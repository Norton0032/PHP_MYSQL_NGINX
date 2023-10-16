<?php

class Human
{
    // подключение к базе данных и таблице "products"
    private $conn;
    private $table_name = "users";

    // свойства объекта
    public $id;
    public $name;
    public $surname;


    // конструктор для соединения с базой данных
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // метод для получения товаров
function read()
{
    // выбираем все записи
    $query = "SELECT * FROM users";

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
    $query = "INSERT INTO " . $this->table_name . " (name, surname) VALUES (?, ?)";

    // подготовка запроса
    $stmt = $this->conn->prepare($query);
    // выполняем запрос
    if ($stmt->execute([$this->name, $this->surname])) {
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
    $this->name = $row["name"];
    $this->surname = $row["surname"];
}
function update()
{
    // запрос для обновления записи (товара)
    $query = "UPDATE " . $this->table_name . " SET name=?, surname=? WHERE  id=?";

    // подготовка запроса
    $stmt = $this->conn->prepare($query);
    // выполняем запрос
    if ($stmt->execute([$this->name, $this->surname, $this->id])) {
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
    if ($stmt->execute([$this->id])) {
        return true;
    }
   

}
}