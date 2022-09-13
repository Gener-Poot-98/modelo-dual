<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Ingenieria $model */

$this->title = 'Create Ingenieria';
$this->params['breadcrumbs'][] = ['label' => 'Ingenierias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingenieria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
