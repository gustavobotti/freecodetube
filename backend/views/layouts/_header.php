<div id="header" style="padding-bottom: 55px">
    <?php

    use yii\bootstrap5\Html;
    use yii\bootstrap5\Nav;
    use yii\bootstrap5\NavBar;

    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md shadow-sm fixed-top',
        ],
    ]);

    $menuItems = [];

    if (Yii::$app->user->isGuest) { //returns true if user not authorized
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
        $menuItems[] = ['label' => 'Create', 'url' => ['/site/index']];
    } else {
        $menuItems[] = [
            'label' => 'Create',
            'url' => ['/site/index'],
        ];

        $menuItems[] = [
            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['class' => 'btn logout text-decoration-none'],
            'options' => ['class' => 'd-flex'],
        ];
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto mb-2 mb-md-0', 'style' => 'justify-content: flex-end;'],
        'items' => $menuItems,
    ]);

    NavBar::end();
    ?>
</div>
