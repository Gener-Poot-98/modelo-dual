<?php

use common\models\Preregistro;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var backend\models\search\PreregistroSearch $searchModel */
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

$this->title = 'Preregistros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="preregistro-index">

<?php Pjax::begin();?>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider'=> $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            
            ['class' => 'kartik\grid\SerialColumn'],
            'id',
            'nombre',
            'matricula',
            'email:email',
            //'ingenieria_id',
            [ 'label' => 'Ingenieria','attribute' => 'ingenieriaNombre', 'filter' => $searchModel->getIngenieriasList() ],
            //'kardex',
            //'constancia_ingles',
            //'constancia_servicio_social',
            //'constancia_creditos_complementarios',
            //'created_at',
            //'updated_at',
            //'estado_registro_id',
            [ 'label' => 'Estado','attribute' => 'estadoRegistroNombre', 'filter' => $searchModel->getEstadoRegistroNombreList() ],
            //'comentario:ntext',
            

                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Preregistro $model, $key, $index, $column) {
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
            'before'=>Html::a(Yii::t('app', 'Crear Preregistro'), ['create'], ['class' => 'btn btn-outline-success']),
            'after'=>Html::a('<i class="fas fa-redo"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
            'footer'=>false
        ],

        ]); ?>



</div>
