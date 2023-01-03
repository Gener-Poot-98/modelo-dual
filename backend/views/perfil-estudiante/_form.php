<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\PerfilEstudiante $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="perfil-estudiante-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'matricula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ingenieria_id')->textInput() ?>

    <?= $form->field($model, 'genero_id')->textInput() ?>

    <?= $form->field($model, 'especialidad_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
