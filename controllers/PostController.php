<?php

namespace app\controllers;

use yii\rest\ActiveController;

class PostController extends ActiveController
{
    public $modelClass = 'app\models\Post';

    public function behaviors()
    {
        // remove rateLimiter which requires an authenticated user to work
        $behaviors = parent::behaviors();
        unset($behaviors['rateLimiter']);
        return $behaviors;
    }

    public function actionHello()
    {
		$dummy = 1234;
        return 'Hello !'.$dummy;
    }
}