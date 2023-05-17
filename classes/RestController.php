<?php 

namespace app\classes;

use yii\rest\ActiveController;
use yii\filters\auth\HttpBearerAuth;

class RestController extends ActiveController
{
    public function behaviors()
    {
        // remove rateLimiter which requires an authenticated user to work
        $behaviors = parent::behaviors();
        unset($behaviors['rateLimiter']);
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
        ];
        return $behaviors;
    }
}