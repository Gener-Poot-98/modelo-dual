<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Expediente $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Expedientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="expediente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'perfil_estudiante_id',
            'created_at',
            'updated_at',
            'fecha_cierre',
            'estado_expediente_id',
        ],
    ]) ?>

<h2>Documentos Entregados</h2>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'documento_id',
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
        ['class' => 'yii\grid\ActionColumn', 'controller' => 'documento-expediente'],
    ],
]); ?>

</div>
