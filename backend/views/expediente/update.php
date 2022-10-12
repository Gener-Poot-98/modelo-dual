<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Expediente $model */

$this->title = 'Cerrar Expediente: ' . $model->perfilEstudiante->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Expedientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="expediente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
