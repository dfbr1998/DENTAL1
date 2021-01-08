<?php 


use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HonorariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comparativa procedimientos medicos en rago de tiempo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="honorarios-index ">

    <h1><?= Html::encode($this->title) ?></h1>


     <?php /* GridView::widget([
        'dataProvider' => $dataProvider,
     //   'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id_honorarios',
           // 'id_procedimientos',
          //  'porcentaje_hon',
         //   'total_honor_medico',
            'fecha_procedimiento',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
     */?>
     
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
    <h3><?php echo $var1 ?> </h3>
    <img  src="/DENTAL1/images/bannerm.jpg" alt="Italian Trulli">

</div>
