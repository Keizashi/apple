<?php

namespace console\controllers;

use common\models\Apple;
use yii\console\Controller;

class AppleController extends Controller
{

    function actionRandom()
    {
        echo 'Random digit is ' . mt_rand();

        return 0;
    }


    function actionFill()
    {
        $apple = new Apple();
        $apple->save();

        echo "создано яблоко с цветом $apple->color с целостностью $apple->amount и его время появление $apple->appearance_timestamp";
    }

    function actionFall($id)
    {
        $apple = Apple::find()
            ->where(['id' => $id])
            ->one();

        $apple->fall();
        $apple->save();
    }

    function actionEat($id, $bite)
    {
        $apple = Apple::find()
            ->where(['id' => $id])
            ->one();

        $apple->eat($bite);
        $apple->save();
    }
}