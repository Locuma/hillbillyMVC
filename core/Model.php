<?php


namespace App;

use App\Db;
use PDO;
class Model
{
    public $table;

    public function __construct()
    {
        $dbConnect = Db::connect();
    }


}