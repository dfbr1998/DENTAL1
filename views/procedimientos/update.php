<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Procedimientos */

$this->title = 'Update Procedimientos: ' . $model->id_procedimientos;
$this->params['breadcrumbs'][] = ['label' => 'Procedimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_procedimientos, 'url' => ['view', 'id' => $model->id_procedimientos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="procedimientos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
