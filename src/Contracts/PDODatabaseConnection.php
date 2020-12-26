<?php

namespace Src\Contracts;

class PDODatabaseConnection implements DatabaseConnectionInterface
{
    protected $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function getConnection()
    {

    }

    public function connect()
    {
        // TODO: Implement connect() method.
    }
}