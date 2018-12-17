<?php
class Database
{
    public $host = "localhost";
    public $port = "8888";
    public $db = "blog_api";
    public $username = "root";
    public $password = "root";
    public $connection;

    public function connect()
    {
        try {
            $this->connection = new PDO('mysql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->db, $this->username, $this->password);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection Failed: " . $e->getMessage();
        }
        return $this->connection;
    }
}
