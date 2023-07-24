<?php

use common\models\News;
use yii\widgets\ListView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use Stichoza\GoogleTranslate\GoogleTranslate;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = $language;
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="news-index">
    <?php foreach ($users as $user) { ?>
        <?= GoogleTranslate::trans($user['surname'],$language,'ru') ?>
        <?= GoogleTranslate::trans($user['name'],$language,'ru') ?>
        <?= GoogleTranslate::trans($user['patronymic'],$language,'ru') ?>
        <?php
            $user_information = \app\models\Users::findOne($user['id']);
            $user_information = $user_information->getUserInformations()->asArray()->all();
            ?>
        <?php foreach ($user_information as $information) { ?>

                <?php try { ?>
                    <?php if (!$information['information_in_ru'] == null ) { ?>
                    <?= GoogleTranslate::trans($information['information_in_'.$language],$language,'ru') ?></p>
                <?php } else { ?>
                    <p><strong>Информация отсутствует</strong></p>
                <?php } ?>
            <?php } catch (Exception $exception){
                    ?> <h1><strong><?= GoogleTranslate::trans('Данный язык отсутствует в базе',$language,'ru') ?></strong></h1> <?php
            }?>
            <?php } ?>
        <hr>
    <?php } ?>
</div>