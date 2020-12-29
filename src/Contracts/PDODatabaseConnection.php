<?php

namespace Src\Contracts;

use PDO;
use PDOException;
use Src\Exceptions\PDOConnectionException;

class PDODatabaseConnection implements DatabaseConnectionInterface
{
    protected $config;
    protected $pdoConnection;

    public function __construct(array $config)
    {
        $this->config = $config;
        $this->connect();
    }

    public function connect()
    {
        try{
            $this->pdoConnection = new PDO("mysql:host={$this->config['DB_HOST']};dbname={$this->config['DB_NAME']}", 
            $this->config['DB_USER'], 
            $this->config['DB_PASS']);
        }catch(PDOException $e)
        {
            throw new PDOConnectionException($e->getMessage());
        }

        return $this;
    }

    public function getConnection()
    {
        return $this->getConnection;
    }
}