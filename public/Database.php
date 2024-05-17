<?php
class Database
{
    private $connection;
    public function __construct()
    {
        $config = require "config.php";

        $this->connection = new PDO("mysql:host={$config['database']['host']};port={$config['database']['port']};dbname={$config['database']['dbname']};user={$config['database']['user']};password={$config['database']['password']}");
    }
    public function query($query)
    {
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement;
    }
}
