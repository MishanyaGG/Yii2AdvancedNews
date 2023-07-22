<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Users $model */

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-create">

    <div class="alert alert-danger">
        Такой логин существует
    </div>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_loginForm', [
        'model' => $model,
    ]) ?>

</div>
