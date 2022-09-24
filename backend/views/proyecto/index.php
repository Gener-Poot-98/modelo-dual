<?php

use common\models\Proyecto;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\widgets\Pjax;


/** @var yii\web\View $this */
/** @var backend\models\search\ProyectoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
$this -> registerCss("
.text-dark {
    color: white !important;
}

.btn-danger {
    color: #fff;
    background-color:green;
    border-color: green;
}

td.kv-group-even {
    background-color: #f0f1ff !important;
    font-size: 20px;
    text-align: justify;
    font-weight: bold; 
}
.bg-info {
    background-color: #212F3C !important;
}

.border-info {
    border-color: black !important;
}

");

$this->title = 'Proyectos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyecto-index">

    <?php Pjax::begin();?>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider'=> $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            
            ['class' => 'kartik\grid\SerialColumn'],
            'id',
            'nombre',
             //'departamento_id',
            ['label' => 'Departamento','attribute' => 'departamentoNombre', 'filter' => $searchModel->getDepartamentoList() ],

             //'ingenieria_id',
            [ 'label' => 'Ingenieria','attribute' => 'ingenieriaNombre', 'filter' => $searchModel->getIngenieriasList() ],
            'perfil_estudiante_id',
            //'empresa_id',
            //'asesor_externo_id',
            //'estado_proyecto_id',
            //'created_at',
            //'updated_at',

                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Proyecto $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            
        ],
        
        'pjax' => true,
        'responsive' => true,
        'hover' => true,
        'toggleDataOptions' => [
            'maxCount' => true,
            ],
        'toolbar' => [
            '{export}',
            '{toggleData}'
        ],
        
        'panel' => [
            'heading'=>$this->title,
            'type'=>'info',
            'before'=>Html::a(Yii::t('app', 'Crear Proyecto'), ['create'], ['class' => 'btn btn-danger']),
            'after'=>Html::a('<i class="fas fa-redo"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
            'footer'=>false
        ],

        ]); ?>


</div>
