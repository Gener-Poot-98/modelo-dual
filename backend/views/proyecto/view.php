<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use common\models\Asignatura;
use yii\helpers\Url;
use yii\grid\ActionColumn;

/** @var yii\web\View $this */
/** @var common\models\Proyecto $model */
$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="proyecto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            //'plan_estudios_id',
            [ 'label' => 'PlanEstudios', 'value' => function ($searchModel) 
            { 
                return $searchModel->planEstudios->nombre; 
            } ],

            [ 'label' => 'Departamento', 'value' => function ($searchModel) 
            { 
                return $searchModel->departamento->nombre; 
            } ],
            //'asesor_interno_id',
            [ 'label' => 'AsesorInterno', 'value' => function ($searchModel) 
            { 
                return $searchModel->asesorInterno->nombre; 
            } ],
            //'departamento_id',
            [ 'label' => 'Ingenieria', 'value' => function ($searchModel) 
            { 
                return $searchModel->ingenieria->nombre; 
            } ],
            //'ingenieria_id',
            [ 'label' => 'PerfilEstudiante', 'value' => function ($searchModel) 
            { 
                return $searchModel->perfilEstudiante->nombre; 
            } ],
            //'perfil_estudiante_id',
            [ 'label' => 'Empresa', 'value' => function ($searchModel) 
            { 
                return $searchModel->empresa->nombre; 
            } ],
            //'empresa_id',
            [ 'label' => 'AsesorExterno', 'value' => function ($searchModel) 
            { 
                return $searchModel->asesorExterno->nombre; 
            } ],
            //'asesor_externo_id',
            //'periodo_id',
            [ 'label' => 'Periodo', 'value' => function ($searchModel) 
            { 
                return $searchModel->periodo->nombre; 
            } ],
            'horas_totales',
            [ 'label' => 'EstadoProyecto', 'value' => function ($searchModel) 
            { 
                return $searchModel->estadoProyecto->nombre; 
            } ],
            'created_at',
            'updated_at',
            'descripcion',
        ],
    ]) ?>
    
<h2>Asignaturas</h2>
<p>
    <?= Html::a('Asignar/Quitar Asignatura', ['proyecto-asignatura/update', 'proyecto_id' => $model->id], ['class' => 'btn btn-success']) ?>
</p>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'clave',
            'nombre',
            'creditos',
            'competencia_disciplinar:ntext',
            //'docente_id',
            ['label' => 'Docente','attribute' => 'docenteNombre', 'filter' => $searchModel->getDocenteList() ],
            'horas_dedicadas',
            'periodo_desarrollo',
            'periodo_acreditacion',
            //'semestre_id',

            
        ],
    ]); ?>

</div>



