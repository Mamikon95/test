<?php

/*Класс для работы с PDO*/

class Db {
    private $host = 'localhost';
    private $username = 'root';
    private $database = 'test3';
    private $password = '';

    /*
     * Объект класса подключения
     * */
    protected $connection;

    /*
     * Конструктор
     * */
    public function __construct() {
        try {
            $this->connection = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->username, $this->password);
        } catch (Exception $e) {
            print_r($e->getMessage());
            exit;
        }
    }

    /**
     * Получаем все комментарии
     * @return array
     */
    public function getAllComments() {
        $sth = $this->connection->prepare("SELECT * FROM comments");
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Создаем новый комментарий
     * @param $name
     * @param $email
     * @param $comment
     * @return boolean
     */
    public function insertCommentData($name, $email,$comment) {
        return $this->connection->exec("INSERT INTO comments (name, email, comment) VALUES ('$name', '$email','$comment')");
    }

    /**
     * Получаем последний комментарий
     * @return array
     */
    public function getLastComment() {
        $sth = $this->connection->prepare("SELECT * FROM comments ORDER BY id DESC LIMIT 1");
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}