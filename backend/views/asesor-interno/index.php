<?php

use common\models\AsesorInterno;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var backend\models\search\AsesorInternoSearch $searchModel */
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

$this->title = 'Asesores Internos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asesor-interno-index">

<?php Pjax::begin();?>


<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?= GridView::widget([
    'dataProvider'=> $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        
        ['class' => 'kartik\grid\SerialColumn'],
        //'id',
        'nombre',
        [ 'label' => 'Ingenieria','attribute' => 'ingenieriaNombre', 'filter' => $searchModel->getIngenieriasList() ],

        
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, AsesorInterno $model, $key, $index, $column) {
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
        'before'=>Html::a(Yii::t('app', 'Crear Asesor Interno'), ['create'], ['class' => 'btn btn-outline-success']),
        'after'=>Html::a('<i class="fas fa-redo"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
        'footer'=>false
    ],

    ]); ?>

</div>
