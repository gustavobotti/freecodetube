<?php

/** @var \yii\web\View $this */
/** @var string $content */

use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap h-100 d-flex flex-column"> <!-- original class: none -->
    <div class="wrap h-100 d-flex flex-column"> <!-- original class: none -->

    <?php echo $this->render('_header')?>
    <?php echo $content ?>

    </div>
</div>

<!--<footer class="footer mt-auto py-3 text-muted">-->
<!--    <div class="container">-->
<!--        <p class="float-start">&copy; --><?php //= Html::encode(Yii::$app->name) ?><!-- --><?php //= date('Y') ?><!--</p>-->
<!--        <p class="float-end">--><?php //= Yii::powered() ?><!--</p>-->
<!--    </div>-->
<!--</footer>-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
