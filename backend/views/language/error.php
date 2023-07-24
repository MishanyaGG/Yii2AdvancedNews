<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Users $model */

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        Данный язык уже добавлен
    </div>

    <?= Html::beginForm('','post') ?>
        <select class="form form-control" name="language">
            <?php foreach ($language->all() as $lg) { ?>
                <option value="<?= $lg['reduction'] ?>"><?= $lg['language'] ?></option>
            <?php } ?>
        </select>
    <?= Html::submitButton('Создать',['class'=>'btn btn-success','style'=>'margin-top: 10px']) ?>
    <?= Html::endForm() ?>

</div>
