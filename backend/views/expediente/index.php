<?php

use common\models\Expediente;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var backend\models\search\ExpedienteSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
$this -> registerCss("
.text-dark {
    color: white !important;
}

td.kv-group-even {
    background-color: #f0f1ff !important;
    font-size: 20px;
    text-align: justify;
    font-weight: bold; 
}

.btn-warning {
    color: white;
    background-color: #C0392B !important;
    border-color: #922B21;
}

.bg-info {
    background-color: #212F3C !important;
}

.border-info {
    border-color: black !important;
}

");

$this->title = 'Expedientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expediente-index">

<?php Pjax::begin();?>


<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?= GridView::widget([
    'dataProvider'=> $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        
        ['class' => 'kartik\grid\SerialColumn'],
            'id',
            'perfil_estudiante_id',
            'created_at',
            'updated_at',
            'fecha_cierre',

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Expediente $model, $key, $index, $column) {
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
        'before'=>Html::a(Yii::t('app', 'Crear Expediente'), ['create'], ['class' => 'btn btn-outline-success']),
        'after'=>Html::a('<i class="fas fa-redo"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
        'footer'=>false
    ],

    ]); ?>


</div>