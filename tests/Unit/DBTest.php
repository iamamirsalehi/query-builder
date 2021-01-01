<?php

use PhpParser\Node\Expr\FuncCall;
use Src\QueryBuilder\DB;
use Src\Utilities\Helper;
use PHPUnit\Framework\TestCase;
use Src\Databases\Connections\PDODatabaseConnection;

class DBTest extends TestCase
{
    public function testIfDBConstructorGetPDODatabaseConnection()
    {
        $database_connection = new PDODatabaseConnection($this->getConfig());

        $db = new DB($database_connection->connect());

        $this->assertIsObject($db);
    }

    private function getConfig()
    {
        return Helper::getConfig('database', 'mysql');
    }
}