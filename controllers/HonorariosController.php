<?php

namespace app\controllers;

use Yii;
use app\models\Honorarios;
use app\models\HonorariosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * HonorariosController implements the CRUD actions for Honorarios model.
 */

 
class HonorariosController extends Controller
{
         public $v1='';   
         


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
     * Lists all Honorarios models.
     * @return mixed
     */
            

    public function actionIndex()
    {

        $searchModel = new HonorariosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $post =Yii::$app->request->post('HonorariosSearch');
        $idDoc = $searchModel->id_procedimientos;


        $date1 = $searchModel->id_honorarios;
        $date2 = $searchModel->fecha_procedimiento;

        $datee1 = strtotime($date1);
        $datee2 = strtotime($date2);

        if($idDoc == '' && $datee1 == '' && $datee2 ==''){

        }else{
     


        if($datee1 > $datee2 || $datee1 == '' || $datee2 ==''){

            $this->v1 = 'ERROR: Fechas incorrectas';
            
            }else{
            if($idDoc == '' ){
                $idDoc = '9999999';
                if($idDoc == '9999999'){
                }else{
                 $sql = "SELECT nom_ape_medico AS nombres  FROM datos_medicos  WHERE id_medico= $idDoc;";
         

        $command = Yii::$app->db->createCommand($sql);

        $results = $command->queryAll();

        $nombre2 = $results[0]["nombres"];
                $this->v1 = "El Medico $nombre2 no tiene registros en ese periodo de tiempo";
                }
            }else{




            $sql = "SELECT datos_medicos.nom_ape_medico AS Nombres, procedimientos.fecha_procedim AS Fechas, dato_especialidad.nombre_especialidad AS esp, 
            count(*) AS fin FROM honorarios 
            INNER JOIN procedimientos ON honorarios.id_procedimientos =  procedimientos.id_procedimientos
            INNER JOIN datos_medicos ON procedimientos.id_medico = datos_medicos.id_medico
            INNER JOIN dato_especialidad ON datos_medicos.iddato_especialidad = dato_especialidad.iddato_especialidad
            WHERE procedimientos.fecha_procedim BETWEEN '$date1' AND '$date2' AND procedimientos.id_medico= $idDoc;";
         

            $command = Yii::$app->db->createCommand($sql);
            $results = $command->queryAll();

            $total = (int)$results[0]["fin"];
            $nombreDoc = $results[0]["Nombres"];
            $especialidad = $results[0]["esp"];

 if($nombreDoc == '' ){

                 $sql = "SELECT nom_ape_medico AS nombres  FROM datos_medicos  WHERE id_medico= $idDoc;";
         

        $command = Yii::$app->db->createCommand($sql);

        $results = $command->queryAll();

        $nombre2 = $results[0]["nombres"];
                $this->v1 = "El/La Medico/a $nombre2 no tiene registros en ese periodo de tiempo";
                }else{


            $this->v1 = "El/La Medico/a  $nombreDoc con especialidad $especialidad tuvo $total consulta/s en el periodo de tiempo del $date1 al $date2";
            }
            }
        }
        }

        
        

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'var1'=>$this->v1,
        ]);

      
   
    }

    /**
     * Displays a single Honorarios model.
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
     * Creates a new Honorarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
            
        $v1='CRACK';
        $v2='1000';

           return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'var1'=>$v1, 'var2'=>$v2,
            
        ]);
        Yii::$app->end();
    }

    /**
     * Updates an existing Honorarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_honorarios]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Honorarios model.
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
     * Finds the Honorarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Honorarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Honorarios::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
       	

    

}
