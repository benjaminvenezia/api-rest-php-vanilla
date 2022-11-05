<?php

class Database 
{
    public function __construct(
        private string $host,
        private string $name,
        private string $user,
        private string $password,
    ) {
        //private allocate automatically (see constructor promotion)
    }

    public function getConnection(): PDO
    {
        $dsn = "mysql:host={$this->host}; dbname={$this->name};charset=utf8";

        return new PDO($dsn, $this->user, $this->password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_STRINGIFY_FETCHES => false
        ]);
    }
}