<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
$this->beginContent('@backend/views/layouts/base.php');
?>

<main class="d-flex"> <!-- original class: flex-shrink-0 -->
    <div class="content-wrapper p-3"> <!-- original class: container -->
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<?php $this->endContent(); ?>