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

    <select class="form-control" onchange="onchangeSelectLanguage(this)" id="select_language">
        <option selected>Русский</option>
        <option>Испанский</option>
        <option>Английский</option>
        <option>Немецкий</option>
    </select>

    <h2 align="center">Краткая информация о пользователе</h2>

    <div id="ru"><?= $user_information[0]['information_in_ru'] ?></div>
    <div id="sp"><?= $user_information[0]['information_in_sp'] ?></div>
    <div id="en"><?= $user_information[0]['information_in_en'] ?></div>
    <div id="de"><?= $user_information[0]['information_in_de'] ?></div>

</div>

<script>
    var select_language = document.getElementById('select_language');

    var div_ru = document.getElementById('ru');
    var div_sp = document.getElementById('sp');
    var div_en = document.getElementById('en');
    var div_de = document.getElementById('de');

    div_en.style.display = 'none';
    div_sp.style.display = 'none';
    div_de.style.display = 'none';

    function onchangeSelectLanguage(el){
        var text = el.options[el.selectedIndex].text;

        if (text == 'Английский'){
            div_en.style.display = '';
            div_sp.style.display = 'none';
            div_de.style.display = 'none';
            div_ru.style.display = 'none';
        }

        if (text == 'Русский'){
            div_en.style.display = 'none';
            div_sp.style.display = 'none';
            div_de.style.display = 'none';
            div_ru.style.display = '';
        }

        if (text == 'Немецкий'){
            div_en.style.display = 'none';
            div_sp.style.display = 'none';
            div_de.style.display = '';
            div_ru.style.display = 'none';
        }

        if (text == 'Испанский'){
            div_en.style.display = 'none';
            div_sp.style.display = '';
            div_de.style.display = 'none';
            div_ru.style.display = 'none';
        }

    }
</script>
