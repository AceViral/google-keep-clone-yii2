<?php

namespace app\controllers;

use app\models\LoginForm;
use yii\filters\Cors;

class UserController extends BaseActiveController
{
    public $modelClass = 'app\models\User';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        unset($behaviors['authenticator']);

        //  Добавляем первоначально CORS!
        $behaviors['corsFilter'] = [
            'class' => Cors::class,
        ];

        //  Теперь авторизацию.
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
            'except' => ['options'],
        ];

        return $behaviors;
    }

    public function actionLogin() {
        $model = new LoginForm();
        $model->setAttributes($this->post);
        if ($model->login()) {
            return [
                'code' => 200,
                'message' => 'Success',
                'data' => [
                    'access_token' => $model->user->access_token
                ]
            ];
        }
        return [
            'code' => 500,
            'message' => $model->errors
        ];
    }
   

}