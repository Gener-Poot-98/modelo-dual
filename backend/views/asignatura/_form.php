<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Asignatura $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="asignatura-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clave')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'creditos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'competencia_disciplinar')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'docente_id')->textInput() ?>

    <?= $form->field($model, 'horas_dedicadas')->textInput() ?>

    <?= $form->field($model, 'periodo_desarrollo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'periodo_acreditacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'semestre_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
