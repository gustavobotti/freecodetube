<?php
/** @var $dataProvider \yii\data\ActiveDataProvider */

$this->title = 'My Visited videos | '. Yii::$app->name;
?>
    <h1>Last visited</h1>
<?php echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_video_item',
    'layout' => '<div class="d-flex flex-wrap">{items}</div>{pager}',
    'itemOptions' => [
        'tag' => false
    ]
]) ?>