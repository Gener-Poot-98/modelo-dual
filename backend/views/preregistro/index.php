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
.btn-warning {
    color: #212529;
    background-color: red;
    border-color: #ffc107;
}

.text-dark {
    color: white !important;
}

.btn-danger {
    color: #fff;
    background-color:green;
    border-color: green;
}

");

$this->title = 'Preregistros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="preregistro-index">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'before'=>Html::a(Yii::t('app', 'Crear Preregistro'), ['create'], ['class' => 'btn btn-danger']),
            'after'=>Html::a('<i class="fas fa-redo"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
            'footer'=>false
        ],

        ]); ?>



</div>
