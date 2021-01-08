<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Honorarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="honorarios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_procedimientos')->textInput() ?>

    <?= $form->field($model, 'porcentaje_hon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_honor_medico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_procedimiento')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
