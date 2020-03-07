<?php
return [
    'registration/([0-9]+)' => 'registration/test/$1',
    'registration/([a-z]+)' => 'registration/$1',
    'registration' => 'registration/index',
    'sign_in' => 'signIn/index',
    'checkUserExist' => 'registration/checkUser',
    '' => 'index/index'
];