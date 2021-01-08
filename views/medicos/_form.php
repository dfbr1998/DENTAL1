<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Especialidad
/* @var $this yii\web\View */
/* @var $model app\models\Medicos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="medicos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nom_ape_medico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono_medico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'universidad_medico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'iddato_especialidad')->dropDownList(
    ArrayHelper::map(Especialidad::find()->all(),'iddato_especialidad','nombre_especialidad'),
    ['prompt'=>'Escoger Especialidad']
    ) ?>

    <?= $form->field($model, 'sueldo_base')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
