<?php

namespace app\controllers;

use Yii;
use app\models\Procedimientos;
use app\models\ProcedimientosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * ProcedimientosController implements the CRUD actions for Procedimientos model.
 */
class ProcedimientosController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
        'access'=> [
                'class'=>AccessControl::classname(),
                'only'=>[],
                'rules'=>[
                    [
                        'allow'=>true,
                        'roles'=>['@']
                        ],
                    ]
                ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Procedimientos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProcedimientosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Procedimientos model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Procedimientos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Procedimientos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

        $post =Yii::$app->request->post('Procedimientos');
        $idprocedim = $model->id_procedimientos;
        $datee = $post['fecha_procedim'];
        $costo = $post['costo_procedim'];
        $porcentaje = $post['porcentaje_comi'];
        $total = $costo * $porcentaje;
        
        $connection = new yii\db\Connection([
        'dsn' => 'mysql:host=localhost;dbname=crudyii',
        'username' => 'admin',
        'password' => 'root',
        'charset' => 'utf8',
]);
        $connection->open();

        $command = $connection->createCommand('INSERT INTO honorarios 
        (id_procedimientos, porcentaje_hon, total_honor_medico, fecha_procedimiento)
	    VALUES (:idprocedim, :porcent, :valor, :date)');
        $command->bindValue(':idprocedim',$idprocedim);
        $command->bindValue(':valor',$total);
        $command->bindValue(':date',$datee);
        $command->bindValue(':porcent',$porcentaje);
        $post = $command->query();


            return $this->redirect(['view', 'id' => $model->id_procedimientos]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Procedimientos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_procedimientos]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Procedimientos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Procedimientos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Procedimientos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Procedimientos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
