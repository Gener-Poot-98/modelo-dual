<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Ingenieria $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ingenieria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
