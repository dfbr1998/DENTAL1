<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PacientesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pacientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pacientes-index ">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Agregar Pacientes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <img class=" is-rounded" src="/DENTAL1/images/bannerpaciente.jpg" alt="Italian Trulli">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id_paciente',
            'nom_ape_paciente',
            'direccion_paciente',
            'edad_paciente',
            'telefono_paciente',
            'correo_paciente',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
        

</div>
