<?php

use PhpParser\Node\Expr\FuncCall;
use Src\QueryBuilder\DB;
use Src\Utilities\Helper;
use PHPUnit\Framework\TestCase;
use Src\Databases\Connections\PDODatabaseConnection;

class DBTest extends TestCase
{

    public function testIfTableMethodSetTableName()
    {
        DB::table('mytable');

        $this->assertEquals(DB::getTableName(), 'mytable');
    }
    
    public function testIfGetInstanceReturnAnIntanceOfTheCLass()
    {
        $this->assertIsObject(DB::getInstance());
    }

    public function testIfAllMethodReturnAllData()
    {
        $this->assertIsArray(DB::table('mytable')->all());
    }

    public function testIfItCanInsertData()
    {
        $data = [
            'name' => 'amir'
        ];

        $inserted_result = DB::table('mytable')->insert($data);

        $this->assertNotNull($inserted_result);
        $this->assertIsNumeric($inserted_result);
    }

    private function getConfig()
    {
        return Helper::getConfig('database', 'mysql');
    }
}