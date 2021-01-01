<?php
namespace Src\QueryBuilder;

use Src\Databases\Connections\PDODatabaseConnection;

class DB 
{
    protected static $connnection;
    
    public function __construct(PDODatabaseConnection $connection)
    {
        self::$connnection = $connection->getConnection();
    }

    

}