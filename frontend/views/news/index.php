<?php

use common\models\News;
use yii\widgets\ListView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <?php if (!Yii::$app->user->isGuest) { ?>
        <p>
            <?= Html::a('Create News', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php } ?>


    <!-- Новости -->
<?= ListView::widget([
        // Данные
        'dataProvider'=>$dataProvider,
        // Место вывода значений
        'itemView'=>'list/_newsList',
        // Родительский тэг
        'options'=>[
                'tag'=>'div',
                'class'=>'row g-4 py-5'
        ],
        // Тэг для каждого элемента
        'itemOptions'=>[
                'tag'=>'div',
                'class'=>'feature col'
        ],
        'summary'=>''
]) ?>
</div>
<script>
    // var fragment = document.getElementById('convertedInformation');
    //
    // var information = document.getElementById('information');
    //
    // information.innerHTML = information.innerText;
</script>