<?php

/**
 * @var $model \common\models\Video
 */

use yii\helpers\Url;

?>

<div class="row">
    <div class="col-sm-8">
        <div class="embed-responsive embed-responsive-16by9" style="max-width: 1220px">
            <video class="embed-responsive-item"
                   poster="<?php echo $model->getThumbnailLink() ?>"
                   src="<?php echo $model->getVideoLink() ?>"
                   style="width: 100%; height: 100%;" controls></video>
        </div>
        <h6 class="mt-2"><?php echo $model->title ?></h6>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <?php echo $model->getViews()->count() ?> views • <?php echo Yii::$app->formatter->asDate($model->created_at) ?>
            </div>
            <div>
                <?php \yii\widgets\Pjax::begin() ?>
                    <?php echo $this->render('_like_buttons', [
                            'model' => $model
                ]) ?>
                <?php \yii\widgets\Pjax::end() ?>
            </div>
        </div>
    </div>
    <div class="col-sm-4">

    </div>
</div>
