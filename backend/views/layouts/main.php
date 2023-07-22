<?php

/** @var yii\web\View $this */
/** @var string $content */

use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

?>

<?php $this->beginPage() ?>
<!doctype html>
<html lang="en">
<head>

    <?php $this->head() ?>
    <title><?= Html::encode($this->title) ?></title>
</head>
<body>
<?php $this->beginBody() ?>

<div class="container">
    <div class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <span class="fs-4">Новости</span>
      </a>

        <?php
        NavBar::begin();

        if (Yii::$app->user->isGuest){

            echo Nav::widget([
                    'options'=>['class'=>'navbar-nav'],
                    'items' => [
                            ['label'=>'Для администратора','url'=>['/admin/login'],
                                'options'=>[
                                    'class'=>'btn btn-primary'
                                ]
                            ]
                    ]
            ]);
            NavBar::end();

        } else {
            echo Nav::widget([
                    'options'=>['class'=>'navbar-nav','style'=>'color: white'],
                    'items'=>[
                            ['label'=>'Добавить новость','url'=>['/news/create'],
                            'options'=>[
                                    'class'=>'btn btn-success',
                                    'style'=>'color: white;margin-right: 10px; padding: 0'
                                ]
                            ],
                            Html::a('Профиль',['admin/view','id'=>Yii::$app->user->identity->id],['class'=>'btn btn-info']),
                    ]
            ]);
            NavBar::end();
        }
    ?>
    </div>

    <?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>