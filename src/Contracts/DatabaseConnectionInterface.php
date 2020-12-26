<?php
namespace Src\Contracts;


interface DatabaseConnectionInterface
{
    public function getConnection();

    public function connect();
}