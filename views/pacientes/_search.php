<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PacientesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pacientes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_paciente') ?>

    <?= $form->field($model, 'nom_ape_paciente') ?>

    <?= $form->field($model, 'direccion_paciente') ?>

    <?= $form->field($model, 'edad_paciente') ?>

    <?= $form->field($model, 'telefono_paciente') ?>

    <?php // echo $form->field($model, 'correo_paciente') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
