<?php

namespace Tests\Unit;


use Src\Utilities\Helper;
use PHPUnit\Framework\TestCase;
use Src\Exceptions\WrongConfigDataException;
use Src\Databases\Connections\PDODatabaseConnection;
use Src\Exceptions\PDOConnectionException;

class PDODatabaseConnectionTest extends TestCase
{
    public function testIfGetConnectionReturnPDOObject()
    {
        $database_config = $this->getConfig();

        $pdoDatabaseConnection = new PDODatabaseConnection($database_config);

        $pdoConnection = $pdoDatabaseConnection->connect()->getConnection();

        $this->assertNotNull($pdoConnection);
        $this->assertIsObject($pdoConnection);
    }

    public function testIfConnectionMethodDoesNotGetCorrectDatabaseConfigAndReturnsAnExceptionForIt()
    {
        $this->expectException(PDOConnectionException::class);

        $database_config = $this->getConfig();

        $database_config['DB_NAME'] = 'not-existed-database';

        $pdoDatabaseConnection = new PDODatabaseConnection($database_config);
    }

    private function getConfig()
    {
        return Helper::getConfig('database', 'mysql');
    }
}