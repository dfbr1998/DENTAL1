<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use app\models\Pacientes;
use app\models\Medicos;

/* @var $this yii\web\View */
/* @var $model app\models\Procedimientos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="procedimientos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_paciente')->dropDownList(
    ArrayHelper::map(Pacientes::find()->all(),'id_paciente','nom_ape_paciente'),
    ['prompt'=>'Escoger Paciente']
    ) ?>

    <?= $form->field($model, 'detalle_procedim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_medico')->dropDownList(
    ArrayHelper::map(Medicos::find()->all(),'id_medico','nom_ape_medico'),
    ['prompt'=>'Escoger Medico']
    ) ?>

    <?= $form->field($model, 'costo_procedim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'porcentaje_comi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_procedim',['inputOptions' => [
'autocomplete' => 'off']])->widget(DatePicker::className(),['clientOptions' => ['defaultDate' => 'today'],'dateFormat' => 'yyyy-MM-dd' ,
    'options'=>['style'=>'width:250px;', 'class'=>'form-control']]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
