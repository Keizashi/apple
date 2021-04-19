<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\bootstrap\Button;


/** @var yii\data\ActiveDataProvider $dataProvider */

echo GridView::widget([
    'dataProvider' => $dataProvider,

]);

echo Html::a('Создать яблоко', ['/create'], ['class' => 'btn btn-primary']);
