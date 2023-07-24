<?php

namespace frontend\controllers;

use app\models\UserInformation;
use app\models\Users;

class LanguageController extends \yii\web\Controller
{

    public function actionResult($language){
        return $this->render('index',[
            'users'=>Users::find()->asArray()->all(),
            'users_information'=>UserInformation::find()->asArray()->all(),
            'language'=>$language
        ]);
    }
}
