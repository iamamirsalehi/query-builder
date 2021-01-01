<?php

namespace Tests\Unit;


use Src\Utilities\Helper;
use PHPUnit\Framework\TestCase;
use Src\Exceptions\WrongConfigDataException;
use Src\Databases\Connections\PDODatabaseConnection;

class PDODatabaseConnectionTest extends TestCase
{
    public function testIfGetConnectionReturnPDOObject()
    {
        $database_config = $this->getConfig();

        $pdoDatabaseConnection = new PDODatabaseConnection($database_config);

        $pdoConnection = $pdoDatabaseConnection->connect()->getConnection();


        $this->assertIsObject($pdoConnection);
        $this->assertEquals($pdoConnection['DB_HOST'], $database_config['DB_HOST']);
        $this->assertEquals($pdoConnection['DB_NAME'], $database_config['DB_NAME']);
        $this->assertEquals($pdoConnection['DB_USER'], $database_config['DB_USER']);
        $this->assertEquals($pdoConnection['DB_PASS'], $database_config['DB_PASS']);
    }

    private function getConfig()
    {
        return Helper::getConfig('database', 'mysql');
    }
}