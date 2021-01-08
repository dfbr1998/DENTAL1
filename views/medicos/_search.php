<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MedicosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="medicos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_medico') ?>

    <?= $form->field($model, 'nom_ape_medico') ?>

    <?= $form->field($model, 'telefono_medico') ?>

    <?= $form->field($model, 'universidad_medico') ?>

    <?= $form->field($model, 'iddato_especialidad') ?>

    <?php // echo $form->field($model, 'sueldo_base') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
