<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Src\Contracts\PDODatabaseConnection;
use Src\Exceptions\WrongConfigDataException;

class PDODatabaseConnectionTest extends TestCase
{
    public function testIfConstructorGetArrayConfigData()
    {
//        $this->expectException(WrongConfigDataException::class);
//
//        $pdoDatabaseConnection = new PDODatabaseConnection();
    }

    private function getConfig()
    {

    }
}