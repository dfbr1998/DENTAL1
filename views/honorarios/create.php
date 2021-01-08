<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Honorarios */

$this->title = 'Create Honorarios';
$this->params['breadcrumbs'][] = ['label' => 'Honorarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="honorarios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
