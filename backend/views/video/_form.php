<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Video $model */
/** @var yii\bootstrap5\ActiveForm $form */

\backend\assets\TagsInputAsset::register($this);
?>

<div class="video-form">

    <?php $form = ActiveForm::begin([
            'action' => ['update', 'video_id' => $model->video_id],
            'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <div class="row">
        <div class="col-sm-8">

            <?php echo $form->errorSummary($model) ?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            <div class="form-group">
                <label><?php echo $model->getAttribute('thumbnail') ?></label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
                    <label class="custom-file-label" for="thumbnail">Choose File</label>
                </div>
            </div>

            <?= $form->field($model, 'tags', [
                    'inputOptions' => ['data-role' => 'tagsinput']
                ]
            )->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">

            <div class="embed-responsive embed-responsive-16by9 mb-3" style="max-width: 720px">
                <video class="embed-responsive-item"
                       poster="<?php echo $model->getThumbnailLink() ?>"
                       src="<?php echo $model->getVideoLink() ?>"
                        controls style="max-width: 100%; height: auto;"></video>
            </div>

            <div class="mb-3">
                <div class="text-muted">Video Link</div>
                <a href="<?php echo $model->getVideoLink() ?>">
                    Open Video
                </a>
            </div>

            <div class="mb-3">
                <div>Video Name</div>
                <?php echo $model->video_name ?>
            </div>

            <?= $form->field($model, 'status')->dropDownList($model->getStatusLabels()) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
