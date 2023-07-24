<?php

namespace backend\controllers;

use app\models\Language;
use app\models\UserInformation;
use Yii;
use Stichoza\GoogleTranslate\GoogleTranslate;

class LanguageController extends \yii\web\Controller
{
    public function actionCreate()
    {
        $tr = new GoogleTranslate();
        if ($this->request->isPost){
            $post = $this->request->post();

           $user_information = Yii::$app->db->createCommand(
                "alter table user_information
                    add information_in_".$post['language']." text")
                    ->query();

                $user_information = UserInformation::find()->asArray()->all();

                foreach ($user_information as $information){
                    $users = UserInformation::findOne($information['id']);

                    if ($users->information_in_ru != null){
                        // Поле в бд
                        $string_field = 'information_in_'.$post['language'];

                        // Перевод текста
                        $translation = $tr->setSource('ru')->setTarget($post['language'])->translate($users->information_in_ru);

                        // Запись в экземпляр модели
                        $users->$string_field = $translation;

                        // Сохранение
                        $users->save();
                    }
                }

            return $this->redirect('../');
        }

        return $this->render('create',[
            'language'=>Language::find()
        ]);
    }

}
