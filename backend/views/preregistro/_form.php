<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Preregistro $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="preregistro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'matricula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ingenieria_id')->textInput() ?>

    <?= $form->field($model, 'kardex')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'constancia_ingles')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'constancia_servicio_social')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'constancia_creditos_complementarios')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'estado_registro_id')->textInput() ?>

    <?= $form->field($model, 'comentario')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
