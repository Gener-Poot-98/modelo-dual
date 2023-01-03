<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\PerfilEstudiante $model */

$this->title = 'Update Perfil Estudiante: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Perfil Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perfil-estudiante-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
