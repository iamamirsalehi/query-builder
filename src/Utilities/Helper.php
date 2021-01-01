<?php

namespace Src\Utilities;

use Src\Exceptions\ConfigDoesNotExist;
use Src\Exceptions\FileNotFoundException;

class Helper
{
    public static function getConfig(string $file_name, string $key): array
    {
        $filePath = self::getRealPath('Configs', $file_name);

        if (!file_exists($filePath))
            throw new FileNotFoundException('Config file not found!');

        $database_configs = include($filePath);

        if (!array_key_exists($key, $database_configs))
            throw new ConfigDoesNotExist('Database config does not exist');

        return $database_configs[$key];
    }

    public static function getRealPath(string $directory, string $file_name): string
    {
        return realpath(dirname(__DIR__) . '/' . $directory . '/' . self::checkHasPHPSuffixOrAddIt($file_name));
    }

    public static function checkHasPHPSuffixOrAddIt(string $file_name) :string
    {
        if(strstr($file_name, strpos($file_name, '.') + 1) == 'php')
            return $file_name;
        else
            return $file_name . '.php';
    }
}