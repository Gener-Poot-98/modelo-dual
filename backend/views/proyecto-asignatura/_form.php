<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\ProyectoAsignatura $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="proyecto-asignatura-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'proyecto_id')->textInput() ?>

    <?= $form->field($model, 'asignatura_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
