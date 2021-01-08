<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Medicos;
use yii\jui\DatePicker;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\HonorariosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="honorarios-form">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_procedimientos')->dropDownList( //medico
    ArrayHelper::map(Medicos::find()->all(),'id_medico','nom_ape_medico'),
    ['prompt'=>'Escoger Medico']
    ) ?>

        <?= $form->field($model, 'id_honorarios',['inputOptions' => [ //fecha inicio
'autocomplete' => 'off']])->widget(DatePicker::className(),['clientOptions' => ['defaultDate' => 'today'],'dateFormat' => 'yyyy-MM-dd' ,
    'options'=>['style'=>'width:250px;', 'class'=>'form-control']]) ?>


        <?= $form->field($model, 'fecha_procedimiento',['inputOptions' => [ //fecha fin
'autocomplete' => 'off']])->widget(DatePicker::className(),['clientOptions' => ['defaultDate' => 'today'],'dateFormat' => 'yyyy-MM-dd' ,
    'options'=>['style'=>'width:250px;', 'class'=>'form-control']]) ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar',['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
   
</div>
