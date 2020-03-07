<?php


namespace App;
use PDO;

class Db
{

    public static function connect ()
    {
        $dbSettingsPath = __DIR__ . "/config/db_connect_params.php";
        $dbConnectSettings = include $dbSettingsPath;


        $dbConnect = new PDO("mysql:host={$dbConnectSettings['host']};dbname={$dbConnectSettings['dbName']}",
        $dbConnectSettings['login'], $dbConnectSettings['password'] );

        return $dbConnect;
    }
}