<?php

namespace console\controllers;

class AppleController extends \yii\console\Controller
{

    function actionRandom()
    {
        echo 'Random digit is ' . mt_rand();

        return 0;
    }

}
