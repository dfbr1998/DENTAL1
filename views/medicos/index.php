<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\EpecialidadSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MedicosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Medicos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medicos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ingresar Medicos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <img class="is-rounded" src="/DENTAL1/images/bannerdoctor.jpg" alt="Italian Trulli">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_medico',
            'nom_ape_medico',
            'telefono_medico',
            'universidad_medico',
            'iddato_especialidad',
            'sueldo_base',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
