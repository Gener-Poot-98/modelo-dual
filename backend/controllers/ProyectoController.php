<?php

namespace backend\controllers;

use common\models\Proyecto;
use common\models\PerfilEstudiante;
use common\models\Empresa;
use common\models\AsesorExterno;
use backend\models\search\ProyectoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\search\AsignaturaSearch;
use yii\db\Query;
use yii\helpers\Json;
use Yii;


/**
 * ProyectoController implements the CRUD actions for Proyecto model.
 */
class ProyectoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actionEmpresaList($q = null) {
        $query = new Query;
        
        $query->select('nombre')
        ->from('empresa')
            ->where('nombre LIKE "%' . $q .'%"')
        ->orderBy('nombre');
        $command = $query->createCommand();
        $data = $command->queryAll();
        $out = [];
        foreach ($data as $d) {
            $out[] = ['value' => $d['nombre']];
        }
        echo Json::encode($out);
    }

    public function actionAsesorExternoList($q = null) {
        $query = new Query;
        
        $query->select('nombre')
        ->from('asesor_externo')
            ->where('nombre LIKE "%' . $q .'%"')
        ->orderBy('nombre');
        $command = $query->createCommand();
        $data = $command->queryAll();
        $out = [];
        foreach ($data as $d) {
            $out[] = ['value' => $d['nombre']];
        }
        echo Json::encode($out);
    }

    public function actionEstudiantesList() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];

        if ($parents != null) {
        $ingenieria_id = $parents[0];
        $out = \common\models\Proyecto::getEstudiantes($ingenieria_id);
        echo Json::encode(['output'=>$out, 'selected'=>'']);
        return;
        }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }
    /**
     * Lists all Proyecto models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProyectoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Proyecto model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new AsignaturaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams, $id);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Proyecto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {

        $model = new Proyecto();

        if ($model->load(Yii::$app->request->post())) {

            $empresa = Empresa::findByNombre($model->nombreEmpresa);
            $model->empresa_id = $empresa->id;

            $asesor_externo = AsesorExterno::findByNombre($model->nombreAsesorExterno);
            $model->asesor_externo_id = $asesor_externo->id;
        }

        if($model->load(Yii::$app->request->post()))
        {
            $data = (new \yii\db\Query())
                ->from('proyecto')
                ->where(['perfil_estudiante_id' => $model->perfil_estudiante_id])
                ->exists();

            if($data > 0)
            {
                Yii::$app->session->setFlash('error', 'El alumno ya tiene un proyecto asignado');
            }else{
                    if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    /**
     * Updates an existing Proyecto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {

            $empresa = Empresa::findByNombre($model->nombreEmpresa);
            $model->empresa_id = $empresa->id;

            $asesor_externo = AsesorExterno::findByNombre($model->nombreAsesorExterno);
            $model->asesor_externo_id = $asesor_externo->id;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Proyecto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Proyecto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Proyecto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Proyecto::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
