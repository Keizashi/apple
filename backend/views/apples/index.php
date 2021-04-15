<?php

use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use common\models\Apple;

$dataProvider = new ActiveDataProvider([
    'query' => Apple::find(),
    'pagination' => [
        'pageSize' => 30,
    ],
]);
echo GridView::widget([
    'dataProvider' => $dataProvider,

]);