<div>
    <a href="<?php echo \yii\helpers\Url::to(['view','slug'=>$model->slug]) ?>">
        <h3><?php echo \yii\bootstrap\Html::encode($model->title) ?></h3>
    </a>
    <div>
        <?php echo \yii\helpers\StringHelper::truncateWords(\yii\bootstrap\Html::encode($model->body),40) ?>
    </div>
</div>