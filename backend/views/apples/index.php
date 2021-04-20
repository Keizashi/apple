<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\data\ActiveDataProvider $dataProvider */

echo GridView::widget([
    'dataProvider' => $dataProvider,

]);

echo Html::a('Создать', Url::to(['create']), ['class' => 'btn btn-primary', 'data-method' => 'POST']);


