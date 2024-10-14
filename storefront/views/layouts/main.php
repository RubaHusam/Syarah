<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use storefront\assets\AppAsset;
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
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header class="navbar navbar-expand-md fixed-top bg-white shadow-sm">
        <div class="container-fluid d-flex align-items-center justify-content-between header-padding">
            <div class="d-flex align-items-center">
                <a href="/" class="d-flex align-items-center">
                    <img src="https://cdn-frontend-r2.syarah.com/prod/assets/images/logoN.svg" alt="Logo" height="40"
                        class="me-3" />
                </a>

                <?php

                $menuItems = [
                    ['label' => 'Home', 'url' => ['/car-listing/index']],
                    ['label' => 'Your Purchase', 'url' => ['/user-purchase/index']],
                ];

                if (Yii::$app->user->isGuest) {
                    $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                }

                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav flex-row'], // Align items horizontally beside the logo
                    'items' => $menuItems,
                ]);
                ?>
            </div>

            <!-- Login/Logout Button on the Right -->
            <div class="d-flex">
                <?php
                if (Yii::$app->user->isGuest) {
                    echo Html::a('Login', ['/site/login'], [
                        'class' => 'btn btn-link text-decoration-none'
                    ]);
                } else {
                    echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link text-decoration-none']
                        )
                        . Html::endForm();
                }
                ?>
            </div>
        </div>
    </header>


    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'options' => ['class' => 'custom-breadcrumbs'],
            ]) ?>

            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
        <div style="background-color: #f8f9fa; padding: 20px; font-family: Arial, sans-serif; margin-top: 50px">
            <div style="max-width: 800px; margin: 0 auto; line-height: 1.6;">
                <h3 style="color: #343a40; margin-bottom: 15px;">FAQs</h3>

                <div style="margin-bottom: 20px;">
                    <h4 style="color: #007bff; margin-bottom: 5px;">How to buy a car?</h4>
                    <p style="color: #6c757d; margin: 0;">
                        Initially, the car buying process takes place by paying a deposit. This down payment is
                        deducted from the total car price and refundable in case the purchase is not completed,
                        on the condition that the car reservation is not confirmed.
                    </p>
                </div>

                <div style="margin-bottom: 20px;">
                    <h4 style="color: #007bff; margin-bottom: 5px;">How to pay for the car?</h4>
                    <p style="color: #6c757d; margin: 0;">
                        You can pay the rest of the car's remaining amount after confirming the car’s reservation
                        with the competent sales employee. Use the Saudi SADAD service for a fast and easy transaction,
                        or make a bank transfer to the company's account at Riyad Bank. Our staff will help you
                        make the payment with ease.
                    </p>
                </div>

                <div>
                    <h4 style="color: #007bff; margin-bottom: 5px;">Is your site verified by the Ministry of Commerce?
                    </h4>
                    <p style="color: #6c757d; margin: 0;">
                        Yeah! This website is authenticated by the Ministry of Commerce and Investment and supported
                        by Elm Company, with Commercial Registry No. 1010538980.
                    </p>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer mt-auto py-3 bg-light text-muted">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <a href="/" class="d-flex align-items-center">
                    <img src="https://cdn-frontend-r2.syarah.com/prod/assets/images/logoN.svg" alt="Logo" height="40"
                        class="me-3" />
                </a>

                <?php

                $menuItems = [
                    ['label' => 'Home', 'url' => ['/car-listing/index']],
                    ['label' => 'Your Purchase', 'url' => ['/user-purchase/index']],
                ];

                if (Yii::$app->user->isGuest) {
                    $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                }

                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav flex-row w-20 justify-content-around'], // Distribute items evenly
                    'items' => $menuItems,
                ]);
                ?>
            </div>
        </div>
    </footer>



    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
