<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pacientes */

$this->title = 'Update Pacientes: ' . $model->id_paciente;
$this->params['breadcrumbs'][] = ['label' => 'Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_paciente, 'url' => ['view', 'id' => $model->id_paciente]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pacientes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
