<?php

use common\models\ProyectoDocente;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\ProyectoDocenteSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Proyecto Docentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyecto-docente-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Proyecto Docente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'proyecto_id',
            //'docente_id',
            ['label' => 'Docente','attribute' => 'docenteNombre', 'filter' => $searchModel->getDocenteList() ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ProyectoDocente $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id, 'proyecto_id' => $model->proyecto_id, 'docente_id' => $model->docente_id]);
                 }
            ],
        ],
    ]); ?>


</div>
