<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Ajuste $model */

$this->title = 'Update Ajuste: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ajustes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ajuste-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
