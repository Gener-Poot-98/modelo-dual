<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Proyecto $model */

$this->title = 'Create Proyecto';
$this->params['breadcrumbs'][] = ['label' => 'Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyecto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
