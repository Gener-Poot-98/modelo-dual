<?php

use common\models\ProyectoAsignatura;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\ProyectoAsignaturaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Proyecto Asignaturas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyecto-asignatura-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Proyecto Asignatura', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'proyecto_id',
            'asignatura_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ProyectoAsignatura $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id, 'proyecto_id' => $model->proyecto_id, 'asignatura_id' => $model->asignatura_id]);
                 }
            ],
        ],
    ]); ?>


</div>
