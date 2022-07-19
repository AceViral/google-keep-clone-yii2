<?php

namespace app\controllers;

use app\models\LoginForm;

class UserController extends BaseActiveController
{
    public $modelClass = 'app\models\User';

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