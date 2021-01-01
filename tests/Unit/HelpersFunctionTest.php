<?php
namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Src\Utilities\Helper;

class HelpersFunctionTest extends TestCase
{
    public function testIfGetConfigMethodReturnsDatabaseConfig()
    {
        $config = Helper::getConfig('database', 'mysql');

        $this->assertNotNull($config);
        $this->assertIsArray($config);
        $this->assertEquals($config['DB_HOST'], 'localhost');
        $this->assertEquals($config['DB_NAME'], 'query-builder-test');
        $this->assertEquals($config['DB_USER'], 'root');
        $this->assertEquals($config['DB_PASS'], '');
    }

    public function testIfGetRealPathMethodReturnsARealPath()
    {
        $real_path = Helper::getRealPath('Configs', 'database');

        $this->assertNotNull($real_path);
        $this->assertIsString($real_path);
        $this->assertTrue(file_exists($real_path));
    }

    public function testIfCheckHasPHPSuffixOrAddItMethodReturnFileNameWithPHPSuffix()
    {
        $file_name = Helper::checkHasPHPSuffixOrAddIt('database.php');

        $this->assertNotNull($file_name);
        $this->assertIsString($file_name);
    }
}