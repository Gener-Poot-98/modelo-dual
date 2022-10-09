<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\DocumentoExpediente $model */

$this->title = $model->documento_id;
$this->params['breadcrumbs'][] = ['label' => 'Documento Expedientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="documento-expediente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'documento_id' => $model->documento_id, 'expediente_id' => $model->expediente_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'documento_id' => $model->documento_id, 'expediente_id' => $model->expediente_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'documento_id',
            'expediente_id',
            'ruta',
            'created_at',
            'updated_at',
            'comentario:ntext',
        ],
    ]) ?>

</div>
