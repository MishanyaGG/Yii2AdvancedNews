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
        $user_information = UserInformation::find()->all();
        if ($this->request->isPost){
            $post = $this->request->post();

            try {
                $user_information = Yii::$app->db->createCommand(
                "alter table user_information
                    add information_in_".$post['language']." text")
                    ->query();
            } catch (\Exception $exception){
                return $this->render('error',[
                    'language'=>Language::find()
                ]);
            }

                $user_information = UserInformation::find()->asArray()->all();

                foreach ($user_information as $information){
                    $users = UserInformation::findOne($information['id']);

                    if ($users->information_in_ru != null){

                        Yii::$app->db->createCommand(
                            "update user_information
                                set information_in_".$post['language']." = '".$tr->setSource('ru')->setTarget($post['language'])->translate($users->information_in_ru)."'
                                where id_user = ".$information['id_user']."; "
                        )->query();
                    }
                }

            return $this->redirect('../');
        }

        return $this->render('create',[
            'language'=>Language::find()
        ]);
    }

}
