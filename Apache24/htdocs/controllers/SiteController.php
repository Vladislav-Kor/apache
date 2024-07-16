<?php

namespace app\controllers;

use app\models\Db;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            // 'captcha' => [
            //     'class' => 'yii\captcha\CaptchaAction',
            //     'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            // ],
            // 'page' => [
            //     'class' => 'yii\web\ViewAction',
            // ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $madal = new Db();
        $res = $madal->result($this);
        return $this->render('index', ['value'=>$res]);
    }
}
