<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Users;

/** @var yii\web\View $this */
/** @var app\models\Users $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$user_information = new Users();

$user_information = $user_information->findOne($model->id);

$user_information = $user_information->getUserInformations()->asArray()->all();
?>
<div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Выход', ['logout'], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы  уверены, что хотите выйти?',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'surname',
            'name',
            'patronymic',
            'phone_number',
            'email:email',
            'login',
            'password',
        ],
    ]) ?>

    <h2 align="center">Краткая информация о пользователе</h2>

    <div id="information"><?= $user_information[0]['information_in_ru'] ?></div>

</div>
