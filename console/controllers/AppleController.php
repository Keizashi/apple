<?php

namespace console\controllers;

use common\models\Apple;

class AppleController extends \yii\console\Controller
{

    /** @var array набор цветов константа */
    const COLORS = ['red', 'yellow', 'green'];

    function actionRandom()
    {
        echo 'Random digit is ' . mt_rand();

        return 0;
    }


    function actionFill()
    {

        $apple = new Apple();
        $apple->appearance_timestamp = mt_rand();
        $apple->integrity = mt_rand(1, 100);
        $apple->color = self::COLORS[array_rand(self::COLORS, 1)];
        $apple->save();

        echo "создано яблоко с цветом $apple->color с целостностью $apple->integrity и его время появление $apple->appearance_timestamp";
    }
}
