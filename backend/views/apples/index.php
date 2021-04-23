<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\data\ActiveDataProvider $dataProvider */

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'color',
        'appearance_timestamp',
        'fall_timestamp',
        'amount',
        ['header' => 'Действия',
            'class' => 'yii\grid\ActionColumn',
            'template' => '{fall_action} {eat_action}',
            'buttons' => [
                'fall_action' => function ($url) {
                    return Html::a('Уронить', $url, [
                        'class' => 'btn btn-primary',
                        'data-confirm' => Yii::t('yii', 'Уверены, что хотите уронить яблоко?'),
                        'data-method' => 'post',
                    ]);
                },
                'eat_action' => function ($url) {
                    return Html::a('Откусить', $url, [
                        'class' => 'btn btn-primary',
                        'data-confirm' => Yii::t('yii', 'Уверены, что хотите откусить яблоко?'),
                        'data-method' => 'post',
                    ]);
                }
            ], 'urlCreator' => function ($action, $apple) {
            if ($action === 'eat_action') {
                $url = Url::to(['bite', 'id' => $apple->id]);
                return $url;
            } elseif ($action === 'fall_action') {
                $url = Url::to(['fall', 'id' => $apple->id]);
                return $url;
            }
        }
        ],
    ],
]);

echo Html::a('Создать', Url::to(['apples/create']), ['class' => 'btn btn-primary', 'data-method' => 'POST']);
