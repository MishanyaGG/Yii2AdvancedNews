<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Users $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="users-form">

    <?= Html::beginForm(['update','id'=>$model->id]) ?>
    <div class="form-group">
        <label for="surname">Фамилия</label>
        <input class="form-control" id="surname" name="surname" type="text" value="<?= $model->surname ?>">
    </div>

    <div class="form-group">
        <label for="name">Имя</label>
        <input class="form-control" id="name" name="name" type="text" value="<?= $model->name ?>">
    </div>

    <div class="form-group">
        <label for="patronimyc">Отчество</label>
        <input class="form-control" id="patronimyc" name="patronimyc" type="text" value="<?= $model->patronymic ?>">
    </div>

    <div class="form-group">
        <label for="phone_number">Номер телефона</label>
        <input class="form-control" id="phone_number" name="phone_number" type="text" value="<?= $model->phone_number ?>">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" id="email" name="email" type="email" value="<?= $model->email ?>">
    </div>

    <div class="form-group">
        <label for="login">Логин</label>
        <input class="form-control" id="login" name="login" type="text" value="<?= $model->login ?>">
    </div>

    <div class="form-group">
        <label for="password">Пароль</label>
        <input class="form-control" id="password" name="password" type="text" value="<?= $model->password ?>">
    </div>

    <div class="form-group">

        <label for="user_information">Информация о пользователе</label>

        <?= \franciscomaya\sceditor\SCEditor::widget([
                'name'=>'user_information',
                'id'=>'user_information',
                'options' => [
                        'style'=>'width: 100%; height: 100%',
                    'rows'=>10
                ]
        ]) ?>

    </div>

    <?= Html::submitButton('Изменить',['class'=>'btn btn-success','style'=>'margin-top: 10px']) ?>
    <? Html::endForm() ?>

</div>
