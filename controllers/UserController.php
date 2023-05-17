<?php

namespace app\controllers;
use Yii;
use yii\rest\Controller;
use yii\filters\auth\HttpBearerAuth;
use app\models\User;

class UserController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
        ];
        return $behaviors;
    }

    public function actionNew()
    {
        $user = new User();
        $user->name = 'Rest New';
        $user->type = 100;
        $user->created_at = date("Y-m-d H:i:s");
        return $user->save();
    
    }

    public function actionGet()
    {
        return Yii::$app->user->id;
    }

}
