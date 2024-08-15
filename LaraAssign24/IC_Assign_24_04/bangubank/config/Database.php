<?php

namespace Config;

class Database
{
    protected $connection;

    public function __construct()
    {
        Config::load();

        $this->connection = new \mysqli(
            Config::get('DB_HOST'),
            Config::get('DB_USERNAME'),
            Config::get('DB_PASSWORD'),
            Config::get('DB_DATABASE'),
            Config::get('DB_PORT')
        );

        if ($this->connection->connect_error) {
            throw new \Exception('Database connection failed: ' . $this->connection->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function closeConnection()
    {
        $this->connection->close();
    }
}
