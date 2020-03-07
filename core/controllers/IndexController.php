<?php


namespace App\controllers;

use App\Controller;
use App\models\User;

class IndexController extends Controller
{
    public function actionIndex()
    {
        session_start();
        //$_SESSION['time'] = date("H:i:s");
        if (!isset($_SESSION['time'])) {
            $_SESSION['time'] = date("H:i:s");
        }
        echo $_SESSION['time'];
        /*$i = 0;
        if (array_key_exists($i,$_SESSION)){
           $lastKey = array_key_last($_SESSION);
           $kiki = 2;
           $_SESSION[$kiki] = "AnotherOneKrug";
        } else {
            $_SESSION[$i] = "krug2";
        }*/


        $users = new User();
        $usersArray = $users->selectAll();
        $this->render('index', [
            'test' => $usersArray
        ]);
    }
}