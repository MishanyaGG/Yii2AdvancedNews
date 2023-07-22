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

$this->title = 'En';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="news-index">
    <?php foreach ($users as $user) { ?>
        <?= GoogleTranslate::trans($user['surname'],'en','ru') ?>
        <?= GoogleTranslate::trans($user['name'],'en','ru') ?>
        <?= GoogleTranslate::trans($user['patronymic'],'en','ru') ?>
        <?php
            $user_information = \app\models\Users::findOne($user['id']);
            $user_information = $user_information->getUserInformations()->asArray()->all();
            ?>
        <?php foreach ($user_information as $information) { ?>

                <?php if (!$information['information_in_ru'] == null ) { ?>
                    <p><strong>Английский:</strong>  <?= GoogleTranslate::trans($information['information_in_en'],'en','ru') ?></p>
                <?php } else { ?>
                    <p><strong>Информация отсутствует</strong></p>
                <?php } ?>
            <?php } ?>
        <hr>
    <?php } ?>
</div>