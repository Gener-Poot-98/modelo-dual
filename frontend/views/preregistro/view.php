<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Preregistro $model */

$this->title = $model->matricula;
$this->params['breadcrumbs'][] = ['label' => 'Preregistros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="preregistro-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar información', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar Pre-registro', ['delete', 'id' => $model->id], [
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
            //'id',
            'nombre',
            'matricula',
            'email:email',
            //'ingenieria_id',
            [ 'label' => 'Ingenieria', 'value' => function ($searchModel) 
            { 
                return $searchModel->ingenieria->nombre; 
            } ],
            //'kardex',
            [
                'attribute' => 'kardex',
                'format' => 'html',
                'value' => function($model)
                {
                    return Html::a(basename($model->kardex), ['download', 'filename' => $model -> kardex]);
                }
            ],
            //'constancia_ingles',
            [
                'attribute' => 'constancia_ingles',
                'format' => 'html',
                'value' => function($model)
                {
                    return Html::a(basename($model->constancia_ingles), ['download', 'filename' => $model -> constancia_ingles]);
                }
            ],
            //'constancia_creditos_complementarios',
            [
                'attribute' => 'constancia_creditos_complementarios',
                'format' => 'html',
                'value' => function($model)
                {
                    return Html::a(basename($model->constancia_creditos_complementarios), ['download', 'filename' => $model -> constancia_creditos_complementarios]);
                }
            ],
            //'cv',
            [
                'attribute' => 'cv',
                'format' => 'html',
                'value' => function($model)
                {
                    return Html::a(basename($model->cv), ['download', 'filename' => $model -> cv]);
                }
            ],
            //'estado_registro_id',
            [ 'label' => 'Estado', 'value' => function ($searchModel) 
            { 
                return $searchModel->estadoRegistro->nombre; 
            } ],
            'created_at:datetime',
            'updated_at:datetime',
            'comentario:ntext',
        ],
    ]) ?>

</div>
