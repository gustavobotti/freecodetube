<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;

$this->beginContent('@frontend/views/layouts/base.php');
?>
<main class="d-flex"> <!-- original class: flex-shrink-0 -->
    <?php echo $this->render('_sidebar')?>

    <div class="content-wrapper p-3"> <!-- original class: container -->
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>
<?php $this->endContent(); ?>