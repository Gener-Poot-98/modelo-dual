<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\DocumentoExpediente $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="documento-expediente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'documento_id')->textInput() ?>

    <?= $form->field($model, 'expediente_id')->textInput() ?>

    <?= $form->field($model, 'ruta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'comentario')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
