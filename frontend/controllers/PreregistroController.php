<?php

namespace frontend\controllers;

use common\models\Preregistro;
use frontend\models\search\PreregistroSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;

/**
 * PreregistroController implements the CRUD actions for Preregistro model.
 */
class PreregistroController extends Controller
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

    /**
     * Lists all Preregistro models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PreregistroSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Preregistro model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Preregistro model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Preregistro();

        $this->subirArchivo($model);

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Preregistro model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Preregistro model.
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
     * Finds the Preregistro model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Preregistro the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = Preregistro::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function subirArchivo(Preregistro $model)
    {
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $model->archivoKardex = UploadedFile::getInstance($model,'archivoKardex');
                $model->archivoConstancia_ingles = UploadedFile::getInstance($model,'archivoConstancia_ingles');
                $model->archivoConstancia_servicio_social = UploadedFile::getInstance($model,'archivoConstancia_servicio_social');
                $model->archivoConstancia_creditos_complementarios = UploadedFile::getInstance($model,'archivoConstancia_creditos_complementarios');


                if($model->validate())
                {
                    if(($model->archivoKardex) && ($model->archivoConstancia_ingles) && ($model->archivoConstancia_servicio_social) && ($model->archivoConstancia_creditos_complementarios))
                    {
                        $rutaArchivoKardex = "uploads/kardex/".time()."_".$model->archivoKardex->basename.".".$model->archivoKardex->extension;
                        $rutaArchivoConstancia_ingles = "uploads/ingles/".time()."_".$model->archivoConstancia_ingles->basename.".".$model->archivoConstancia_ingles->extension;
                        $rutaArchivoConstancia_servicio_social = "uploads/servicio_social/".time()."_".$model->archivoConstancia_servicio_social->basename.".".$model->archivoConstancia_servicio_social->extension;
                        $rutaArchivoConstancia_creditos_complementarios = "uploads/creditos_complementarios/".time()."_".$model->archivoConstancia_creditos_complementarios->basename.".".$model->archivoConstancia_creditos_complementarios->extension;


                        if(($model->archivoKardex->saveAs($rutaArchivoKardex)) && ($model->archivoConstancia_ingles->saveAs($rutaArchivoConstancia_ingles)) && ($model->archivoConstancia_servicio_social->saveAs($rutaArchivoConstancia_servicio_social)) && ($model->archivoConstancia_creditos_complementarios->saveAs($rutaArchivoConstancia_creditos_complementarios)))
                        {
                            $model->kardex = $rutaArchivoKardex;
                            $model->constancia_ingles = $rutaArchivoConstancia_ingles;
                            $model->constancia_servicio_social = $rutaArchivoConstancia_servicio_social;
                            $model->constancia_creditos_complementarios = $rutaArchivoConstancia_creditos_complementarios;
                        }
                    }
                }

                if($model->save(false))
                {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
                
            }
        } else {
            $model->loadDefaultValues();
        }

    }

    public function actionDownload($filename)
    {
        $path = Yii::getAlias('@frontend') . '/web/' . $filename;
        if(file_exists($path))
        {
            return Yii::$app->response->sendFile($path);
        }
    }
}
