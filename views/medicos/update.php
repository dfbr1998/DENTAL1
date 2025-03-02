<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Medicos */

$this->title = 'Update Medicos: ' . $model->id_medico;
$this->params['breadcrumbs'][] = ['label' => 'Medicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_medico, 'url' => ['view', 'id' => $model->id_medico]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="medicos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
