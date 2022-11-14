<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Preregistro $model */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Preregistros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="preregistro-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    if($model->estado_registro_id == 4)
    {
        echo '<div class="alert alert-success">Este alumno ya fue aprobado</div>';
    } else
    {?>

    <p>
        <?= Html::a('Actualizar estado', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php
    }
    ?>

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
                    return Html::a(basename($model->kardex), ['file', 'filename' => $model -> kardex]);
                }
            ],
            //'constancia_ingles',
            [
                'attribute' => 'constancia_ingles',
                'format' => 'html',
                'value' => function($model)
                {
                    return Html::a(basename($model->constancia_ingles), ['file', 'filename' => $model -> constancia_ingles]);
                }
            ],
            //'constancia_creditos_complementarios',
            [
                'attribute' => 'constancia_creditos_complementarios',
                'format' => 'html',
                'value' => function($model)
                {
                    return Html::a(basename($model->constancia_creditos_complementarios), ['file', 'filename' => $model -> constancia_creditos_complementarios]);
                }
            ],
            //'constancia_servicio_social',
            [
                'attribute' => 'cv',
                'format' => 'html',
                'value' => function($model)
                {
                    return Html::a(basename($model->cv), ['file', 'filename' => $model -> cv]);
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
