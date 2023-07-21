<?php

namespace backend\controllers;

use common\models\LoginForm;
use common\models\User;
use Yii;

class AdminController extends \yii\web\Controller
{
    /**
     * Страница входа в аккаунт
     * @return string|\yii\web\Response
     */
    public function actionIndex()
    {
        // Проверка на гостя
        if (!Yii::$app->user->isGuest){
            return $this->goHome();
        }

        // Создаём экземпляр модели
        $model = new LoginForm();

        // Пробуем войти
        if($model->load(Yii::$app->request->post())&& $model->login()){
            return $this->goBack();
        }

        // Выводим представление и добавляем переменную для вывода в представлении
        return $this->render('login',[
            'model'=>$model
        ]);
    }

    /**
     * Выход из аккаунта
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        // Выход из аккаунта
        Yii::$app->user->logout();

        // Перенаправление на главную страницу (news/index)
        return $this->goHome();
    }
}
