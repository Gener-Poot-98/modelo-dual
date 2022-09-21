<?php

use common\models\ProyectoDocente;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\grid\ActionColumn;


/** @var yii\web\View $this */
/** @var backend\models\search\ProyectoDocenteSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this -> registerCss("
.text-dark {
    color: white !important;
}

.btn-danger {
    color: #fff;
    background-color:green;
    border-color: #dc3545;
}

");
$this->title = 'Proyecto Docentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyecto-docente-index">

    <h1><?= Html::encode($this->title) ?></h1>

<?php Pjax::begin();?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
        <?= GridView::widget([
        'dataProvider'=> $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            
            ['class' => 'kartik\grid\SerialColumn'],
            //'id',
            [
                'attribute' => 'proyectoNombre', 
                'label' =>  Yii::t('app', 'Proyecto'),
                'value' => 'proyecto.nombre' ,
                'group' => true, 
            ], 
            [
                'attribute' => 'docenteNombre', 
                'value' => 'docente.nombre' ,
                'label' =>  Yii::t('app', 'Docente'),
            ],

            ['class' => ActionColumn::className(),
            'urlCreator' => function ($action, ProyectoDocente $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id, 'proyecto_id' => $model->proyecto_id, 'docente_id' => $model->docente_id]);
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
            'before'=>Html::a(Yii::t('app', 'Create ProyectoDocente'), ['create'], ['class' => 'btn btn-danger']),
            'after'=>Html::a('<i class="fas fa-redo"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
            'footer'=>false
        ],

        ]); ?>


</div>
