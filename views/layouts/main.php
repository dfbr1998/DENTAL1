<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="icon" href="/images/logoDental.png">
<meta charset="utf-8">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   / <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head class="has-background-danger-light">
<body class="has-background-danger-light" >
<?php $this->beginBody() ?>

<div class="wrap has-background-grey-lighter">
    <?php
    NavBar::begin([
        'brandLabel' => 'Sistema Dental',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
	$navItem = [
            ['label' => 'Inicio', 'url' => ['/site/index']],
           /* ['label' => 'Datos CRUD', 'url' => ['/datos/index']],*/
           /* ['label' => 'Contacto', 'url' => ['/site/contact']],  aqui puedo poner agendar cita*/
			];
            if(Yii::$app->user->isGuest){ 
                array_push($navItem, ['label' => 'Login', 'url' => ['/site/login']], ['label' => 'Register', 'url' => ['/site/register']]);
            }else{
            
            array_push($navItem, ['label' => 'Pacientes', 'url' => ['/pacientes/index']]);
            array_push($navItem, ['label' => 'Especialidad', 'url' => ['/especialidad/index']]);
            array_push($navItem, ['label' => 'Medicos', 'url' => ['/medicos/index']]);
            array_push($navItem, ['label' => 'Procedimientos', 'url' => ['/procedimientos/index']]);
            array_push($navItem, ['label' => 'Comparativa', 'url' => ['/honorarios/index']]);
                array_push($navItem, '<li>'. Html::beginForm(['/site/logout'], 'post'). Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')',['class' => 'btn btn-link logout']).Html::endForm().'</li>');
			}

    echo Nav::widget([
        'options' => ['class' => 'navbar-end navbar-nav navbar-right'],
        'items' => $navItem
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer ">
    <div class="container">
        <p class="pull-left">&copy; Dental <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
