<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Users;
use app\models\Language;

/** @var yii\web\View $this */
/** @var app\models\Users $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$language = Language::find()->all();

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

    <label for="select_language">Язык, на котором написана информация</label>
    <div style="display: flex">
            <select style="width: 30%" onchange="onchageSelectLanguage(this)" class="form-control"  id="select_language">
                <option disabled selected>Язык, на котором будет написана информация</option>
                <?php
                    foreach ($language as $lg) {
                        if(isset($user_information[0]['information_in_'.$lg['reduction']])){
                            ?>
                            <option value="<?=$lg['reduction'] ?>"><?= $lg['language'] ?></option> <?php
                        }
                    }
                    ?>
            </select>
        <?= Html::a('Добавить новый язык','../language/create',['class'=>'btn btn-success','style'=>'margin-left: 10px']) ?>
    </div>

    <h2 align="center">Краткая информация о пользователе</h2>



    <?php
    foreach ($language as $lg) {
        if(isset($user_information[0]['information_in_'.$lg['reduction']])){
            ?>
            <div style="display: none" id="<?= $lg['reduction'] ?>"><?= $user_information[0]['information_in_'.$lg['reduction']] ?></div>
            <?php
        }
    }
    ?>

</div>

<script>
    var selectLanguage = document.getElementById('select_language');
        languageChildern = selectLanguage.children;
        languageLen = languageChildern.length;

    var arr = [];

    for (var i = 1; i < languageLen; i++) {
        var val = languageChildern[i].value;
        arr = arr.concat(val);
    }

    function onchageSelectLanguage(el){



        for (var i = 0; i< arr.length; i++){

            var text = document.getElementById(arr[i]);

            text.style.display = 'none';

        }

        var text = el.options[el.selectedIndex].value;

        var div_language = document.getElementById(text);

        div_language.style.display = '';

   }


</script>
