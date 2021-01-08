<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Honorarios */

$this->title = 'Update Honorarios: ' . $model->id_honorarios;
$this->params['breadcrumbs'][] = ['label' => 'Honorarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_honorarios, 'url' => ['view', 'id' => $model->id_honorarios]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="honorarios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
