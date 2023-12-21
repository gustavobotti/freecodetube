<div id="header">
    <?php

    use yii\bootstrap5\Html;
    use yii\bootstrap5\Nav;
    use yii\bootstrap5\NavBar;
    use yii\helpers\Url;

    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md shadow-sm',
        ],
    ]);

    $menuItems = [];

    if (Yii::$app->user->isGuest) { //returns true if user not authorized
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    } else {
        $menuItems[] = [
            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['class' => 'btn logout text-decoration-none', 'data-method' => 'post'],
            'options' => ['class' => 'd-flex'],
        ];
    }
    ?>
    <form action="<?php echo Url::to(['/video/search']) ?>" class="form-inline my-2 my-lg-0 d-flex" style="margin-left: 20px">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" name="keyword" value="<?php echo Yii::$app->request->get('keyword') ?>">
        <button class="btn btn-outline-dark my-2 my-sm-0" style="margin-left: 8px" type="submit">Search</button>
    </form>
    <?php

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto mb-2 mb-md-0', 'style' => 'justify-content: flex-end;'],
        'items' => $menuItems,
    ]);

    NavBar::end();
    ?>
</div>
