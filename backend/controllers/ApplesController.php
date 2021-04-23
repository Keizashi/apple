<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use common\models\Apple;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * Apples controller
 */
class ApplesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'bite', 'fall'],
                        'allow' => true,
                        'roles' => ['@'],

                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'create' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Displays apples list
     *
     * @return string
     */
    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Apple::find(),
            'pagination' => [
                'pageSize' => 40,
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates apple
     *
     * @return string
     */
    function actionCreate()
    {
        $apple = new Apple();
        $apple->save();
        Yii::$app->session->setFlash('success', "Яблоко создано");
        return $this->redirect(['index']);
    }

    /**
     * Fall apple
     *
     * @return string
     */
    function actionFall($id)
    {
        $apple = Apple::find()
            ->where(['id' => $id])
            ->one();

        try {
            $apple->fall();
        } catch (\RuntimeException $e) {
            Yii::$app->session->setFlash('error', "Яблоко уже на земле");
        }

        $apple->save();
        return $this->redirect(['index']);

    }

    /**
     * Biteoff apple
     *
     * @return string
     */
    function actionBite($id)
    {
        $apple = Apple::find()
            ->where(['id' => $id])
            ->one();

        try {
            $apple->eat($piece = 25);
        } catch (\RuntimeException $e) {
            Yii::$app->session->setFlash('error', "Недопустимое действие");
        }

        $apple->save();
        return $this->redirect(['index']);
    }
}

