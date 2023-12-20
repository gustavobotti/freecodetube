<?php
/**
* @var $model \common\models\Video */

?>

<div class="card" style="width: 18rem;">
    <div class="embed-responsive embed-responsive-16by9" style="max-width: 720px">
        <video class="embed-responsive-item"
               poster="<?php echo $model->getThumbnailLink() ?>"
               src="<?php echo $model->getVideoLink() ?>"
               style="max-width: 100%; height: auto;"></video>
    </div>
    <div class="card-body p-2">
        <h5 class="card-title m-0"><?php echo $model->title ?></h5>
        <p class="text-muted card-text m-0"><?php echo $model->createdBy->username ?></p>
        <p class="text-muted card-text m-0">140 views •
            <?php echo Yii::$app->formatter->asRelativeTime($model->created_at) ?></p>
    </div>
</div>
