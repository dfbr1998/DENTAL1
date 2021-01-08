<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Especialidad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="especialidad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_especialidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion_especialidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nivel_dificultad_especialidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anios_min_experiencia')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
