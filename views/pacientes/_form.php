<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pacientes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pacientes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nom_ape_paciente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion_paciente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edad_paciente')->textInput() ?>

    <?= $form->field($model, 'telefono_paciente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo_paciente')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
