<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\PerfilEstudianteSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="perfil-estudiante-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'matricula') ?>

    <?= $form->field($model, 'ingenieria_id') ?>

    <?php // echo $form->field($model, 'genero_id') ?>

    <?php // echo $form->field($model, 'especialidad_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
