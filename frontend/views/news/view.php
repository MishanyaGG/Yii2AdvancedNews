<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var \common\models\News $model */

$this->title = $model->information;
?>
<div class="news-view">

    <?=ListView::widget([
            // Данные
        'dataProvider'=>$dataProvider,
        // Место вывода значений
        'itemView'=>'list/_viewList',
        // Родительский тэг
        'options'=>[
                'tag'=>'div',
                'style'=>'margin-left: 3%'
        ],
        'summary'=>''
    ]) ?>

</div>

<script>
    var fragment = document.getElementById('convertedInformation');

    var information = document.getElementById('information');

    information.innerHTML = information.innerText;
</script>
