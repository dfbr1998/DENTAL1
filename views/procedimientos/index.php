<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProcedimientosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Procedimientos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="procedimientos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ingresar Procedimientos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <img class="is-rounded" src="/DENTAL1/images/bannerproc.jpg" alt="Italian Trulli">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_procedimientos',
            'id_paciente',
            'detalle_procedim',
            'id_medico',
            'costo_procedim',
            'porcentaje_comi',
            'fecha_procedim',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
     

</div>
