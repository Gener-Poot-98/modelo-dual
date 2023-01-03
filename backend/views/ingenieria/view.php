<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Ingenieria $model */

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

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Ingenierias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ingenieria-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Ver especialidades', ['especialidad/index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'nombre',
        ],
    ]) ?>

    <br>

<?php Pjax::begin();?>


<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?= GridView::widget([
    'dataProvider'=> $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        
        ['class' => 'kartik\grid\SerialColumn'],
           //'id',
        'nombre',
        'clave',
        'creditos',
        //'competencia_disciplinar:ntext',
        ['label' => 'Semestre','attribute' => 'semestreNombre', 'filter' => $searchModel->getSemestresList() ],
        ['label' => 'Docente','attribute' => 'asesorInternoNombre', 'filter' => $searchModel->getAsesorInternoList() ],
           //'horas_dedicadas',
           //'periodo_desarrollo',
           //'periodo_acreditacion',
           //'semestre_id',

        [
            'class' => 'yii\grid\ActionColumn', 'controller' => 'asignatura'
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
        'heading'=>"Asignaturas de " . $this->title,
        'type'=>'info',
        'before'=>Html::a(Yii::t('app', 'Crear Asignatura'), ['asignatura/create'], ['class' => 'btn btn-outline-success']),
        'after'=>Html::a('<i class="fas fa-redo"></i> Reset Grid', ['asignatura/index'], ['class' => 'btn btn-info']),
        'footer'=>false
    ],

    ]); ?>

</div>
