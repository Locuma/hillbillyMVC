<?php


namespace App\controllers;


use App\Controller;
use App\models\User;

class RegistrationController extends Controller
{
    public function actionIndex()
    {
//        var_dump($_POST);
        $kek = new User();
        $keril = 'keril';
        $lol = $kek->findByLogin($keril);
        var_dump($lol[0]['email']);
        $this->render('registration',[
            'hui' => $lol[0]['email']
        ]);
    }

    public function actionSaveUser(){
        $query = new User();
        //var_dump($query->findByLogin('keril'));
        echo json_encode($query->selectAll());

    }

    public function actionCheckUser()
    {
//        $user = new User();
//        $userArray = $user->findByLogin($login);
//        var_dump($userArray);

        echo json_encode(true);
    }
}