<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\News;

$this->title = $model->header;

$modelCategories = new News();

$modelCategories = News::findOne($model->id);
?>

    <h1><?= Html::encode($model->header) ?></h1>
    <p>Дата подачи <?= Html::encode($model->date) ?></p>
    <p><?= Html::encode($model->information) ?></p>
