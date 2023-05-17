<?php

namespace app\controllers;

use Yii;
use app\classes\RestController;

class PostController extends RestController
{
    public $modelClass = 'app\models\Post';

    // public function behaviors()
    // {
    //     // remove rateLimiter which requires an authenticated user to work
    //     $behaviors = parent::behaviors();
    //     unset($behaviors['rateLimiter']);
    //     return $behaviors;
    // }

    public function actionHello()
    {
        return $this->behaviors();
        // return $this->id;
    }

    public function actionGo($key)
    {
        return Yii::getAlias($key);
    }
}