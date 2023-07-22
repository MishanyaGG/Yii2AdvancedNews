<?php

namespace frontend\controllers;

use app\models\UserInformation;
use app\models\Users;

class LanguageController extends \yii\web\Controller
{
    /**
     * Страница на Русском
     * @return string
     */
    public function actionRu(){
        return $this->render('ru',[
            'users'=>Users::find()->asArray()->all(),
            'user_information'=>UserInformation::find()->asArray()->all()
        ]);
    }

    /**
     * Страница на Испанском
     * @return string
     */
    public function actionSp(){
        return $this->render('sp',[
            'users'=>Users::find()->asArray()->all(),
            'user_information'=>UserInformation::find()->asArray()->all()
        ]);
    }

    /**
     * Страница на Английском
     * @return string
     */
    public function actionEn(){
        return $this->render('en',[
            'users'=>Users::find()->asArray()->all(),
            'user_information'=>UserInformation::find()->asArray()->all()
        ]);
    }

    /**
     * Страница на Немецком
     * @return string
     */
    public function actionDe(){
        return $this->render('de',[
            'users'=>Users::find()->asArray()->all(),
            'user_information'=>UserInformation::find()->asArray()->all()
        ]);
    }

}
