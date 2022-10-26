<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Ajuste $model */

$this->title = 'Create Ajuste';
$this->params['breadcrumbs'][] = ['label' => 'Ajustes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ajuste-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
