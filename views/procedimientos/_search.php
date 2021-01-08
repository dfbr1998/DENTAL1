<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProcedimientosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="procedimientos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_procedimientos') ?>

    <?= $form->field($model, 'id_paciente') ?>

    <?= $form->field($model, 'detalle_procedim') ?>

    <?= $form->field($model, 'id_medico') ?>

    <?= $form->field($model, 'costo_procedim') ?>

    <?php // echo $form->field($model, 'porcentaje_comi') ?>

    <?php // echo $form->field($model, 'fecha_procedim') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
