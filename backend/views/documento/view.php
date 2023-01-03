<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Documento $model */

$this -> registerCss("
.table td, .table th {
    white-space: normal;
}
");
$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="documento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'descripcion:ntext',
            'fecha_inicio:date',
            'fecha_cierre:date',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
