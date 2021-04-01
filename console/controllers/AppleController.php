<?php

namespace console\controllers;

use Yii;
use yii\helpers\Console;

class AppleController extends \yii\console\Controller
{

    function actionRandom()
    {
        echo 'Random digit is ' . mt_rand();

        return 0;
    }

}
