<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EspecialidadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Especialidades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="especialidad-index ">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ingresar Especialidad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <img class="is-rounded" src="/DENTAL1/images/innerbanner.jpg" alt="Italian Trulli">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'iddato_especialidad',
            'nombre_especialidad',
            'descripcion_especialidad',
            'nivel_dificultad_especialidad',
            'anios_min_experiencia',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
