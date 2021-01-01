<?php
namespace Src\QueryBuilder;

use PDO;
use Src\Utilities\Helper;
use Src\Databases\Connections\PDODatabaseConnection;

class DB 
{
    protected static $instance = null;

    protected static $table;

    protected static $connection = null;

    public static function table(string $table)
    {
        self::$table = $table;

        self::getConnection();

        return self::getInstance();
    }

    public static function all()
    {
        $sql = 'SELECT * FROM ' . self::$table;

        $stmt  = self::$connection->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getTableName()
    {
        return self::$table;
    }

    public static function getInstance()
    {
        if(self::$instance === null)
            self::$instance = new self;

        return self::$instance;
    }

    public static function getConnection()
    {
        if(self::$connection === null)
        {
            $pdoConnection = new PDODatabaseConnection(self::getConfig());

            self::$connection = $pdoConnection->connect()->getConnection();
        }
    }

    private static function getConfig()
    {
        return Helper::getConfig('database', 'mysql');
    }
}