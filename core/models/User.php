<?php


namespace App\models;
use App\Db;
use App\Model;
use PDO;

class User extends Model
{
    public $table = "user";

    public function selectAll ($whereCondition = "")
    {
        $dbConnect = Db::connect();
        $where = '';
        if (!empty($whereCondition)){
            $where = " WHERE {$whereCondition}";
        }
//        var_dump("SELECT * FROM {$this->table}{$where}");
        $query = $dbConnect->query("SELECT * FROM {$this->table}{$where}")->fetchAll(PDO::FETCH_ASSOC);
        return !empty($query) ? $query : null;
//        $loh = "SELECT * FROM {$this->table}{$where}";
//        return $loh;
    }

    public function findById($id)
    {
        $query = $this->selectAll("id = {$id}");
        return $query;
    }

    public function findByLogin($login)
    {
        $query = $this->selectAll("login = '{$login}'");
        return $query;
    }
}