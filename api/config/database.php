<?php
class Database
{
    // укажите свои учетные данные базы данных
    private $host = "db";
    private $db_name = "my_bd";
    private $username = "user";
    private $password = "password";
    public $conn;

    // получаем соединение с БД
    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        } catch (PDOException $exception) {
            echo "Ошибка подключения: " . $exception->getMessage();
        }

        return $this->conn;
    }
}