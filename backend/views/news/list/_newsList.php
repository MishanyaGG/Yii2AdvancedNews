<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\News;
use franciscomaya\sceditor\SCEditor;

$modelCategories = new News();

$modelCategories = News::findOne($model->id);

?>
    <div class="feature col">
        <h3 class="fs-2"><?= Html::encode($model->header) ?></h3>
        <p>Дата подачи <?= Html::encode($model->date) ?></p>

        <div id="information" on="hi()" style="width: 50%"><?= Html::encode($model->information) ?></div>
        <?= Html::a('Подробнее',['news/view','id'=>$model->id],['class'=>'btn btn-primary']) ?>

        <?php if(!Yii::$app->user->isGuest) { ?>
            <?= Html::a('Изменить', ['news/update', 'id' => $model->id], ['class' => 'btn btn-secondary']) ?>
            <?= Html::a('Удалить', ['news/delete', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>
        <?php } ?>
    </div>

