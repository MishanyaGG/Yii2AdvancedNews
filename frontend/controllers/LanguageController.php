<?php

namespace frontend\controllers;

use app\models\UserInformation;
use app\models\Users;

class LanguageController extends \yii\web\Controller
{
    public function actionRu(){
        $users = Users::find()->asArray()->all();
        return $this->render('ru',[
            'users'=>Users::find()->asArray()->all(),
            'user_information'=>UserInformation::find()->asArray()->all()
        ]);
    }

    public function actionSp(){
        $users = Users::find()->asArray()->all();
        return $this->render('sp',[
            'users'=>Users::find()->asArray()->all(),
            'user_information'=>UserInformation::find()->asArray()->all()
        ]);
    }

    public function actionEn(){
        $users = Users::find()->asArray()->all();
        return $this->render('en',[
            'users'=>Users::find()->asArray()->all(),
            'user_information'=>UserInformation::find()->asArray()->all()
        ]);
    }

    public function actionDe(){
        $users = Users::find()->asArray()->all();
        return $this->render('de',[
            'users'=>Users::find()->asArray()->all(),
            'user_information'=>UserInformation::find()->asArray()->all()
        ]);
    }

}
