<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Expediente $model */

$this->title = 'Expediente: ' . $model->perfilEstudiante->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes Duales', 'url' => ['perfil-estudiante/index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="expediente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if($model->estado_expediente_id == 1)
    { ?>

    <p>
        <?= Html::a('Cerrar expediente', ['update', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro que desea cerrar el expediente?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
    } else if ($model->estado_expediente_id == 2)
    { ?>
    
    <p>
        <?= Html::a('Reabrir expediente', ['reabrir', 'id' => $model->id], [
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => '¿Está seguro que desea volver a abrir el expediente?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
    } else if($model->estado_expediente_id == 3)
    { 

        echo '<div class="alert alert-success">Este expediente ha completado todo el proceso del Modelo Dual</div>';
    }

    ?>

    <?php if($model->estado_expediente_id == 1)
    {?>

    <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
                [ 'label' => 'Estado', 'value' => function ($searchModel) 
                { 
                    return $searchModel->estadoExpediente->nombre;
                } ],
                'created_at:datetime',
                //'fecha_cierre:datetime',
                //'motivo_cierre_id',
                //'estado_expediente_id',
                'updated_at:datetime',
            ],
        ]) ?>

    <?php
    } else if ($model->estado_expediente_id == 2 || $model->estado_expediente_id == 3)
    { ?>

    <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
                    [ 'label' => 'Estado', 'value' => function ($searchModel) 
                    { 
                        return $searchModel->estadoExpediente->nombre;
                    } ],
                    'created_at:datetime',
                    'fecha_cierre:datetime',
                    //'motivo_cierre_id',
                    [ 'label' => 'Motivo de cierre', 'value' => function ($searchModel) 
                    { 
                        return $searchModel->motivoCierre->nombre;
                    } ],
                    //'estado_expediente_id',
                    'updated_at:datetime',
                ],
            ]) ?>

    <?php
    }
    ?>

<h2>Documentos Entregados</h2>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        //'documento_id'
        [ 'label' => 'Documento', 'value' => function ($searchModel) 
            { 
                return $searchModel->documento->nombre; 
            } ],
        //'expediente_id',
        [
            'attribute' => 'ruta',
            'format' => 'html',
            'value' => function($model)
            {
                return Html::a(basename($model->ruta), ['file', 'filename' => $model -> ruta]);
            }
        ],
        'created_at:datetime',
        'updated_at:datetime',
        //'comentario:ntext',
        ['class' => 'yii\grid\ActionColumn', 'controller' => 'documento-expediente', 'template'=>'{view}'],
    ],
]); ?>

</div>
