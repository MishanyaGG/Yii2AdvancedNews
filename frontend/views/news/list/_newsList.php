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

        <?= Html::a('Подробнее',['news/view','id'=>$model->id],['class'=>'btn btn-primary']) ?>

        <?php if(!Yii::$app->user->isGuest) { ?>
            <?= Html::a('Изменить', ['news/update', 'id' => $model->id], ['class' => 'btn btn-secondary']) ?>
            <?= Html::beginForm(['news/delete','post']) ?>
                <input type="hidden" value="<?= $model->id?>" name="IdNews" >
                <?= Html::submitButton('Удалить',['class'=>'btn btn-danger','style'=>'margin-top: 10px']) ?>
            <?= Html::endForm() ?>
        <?php } ?>
    </div>

