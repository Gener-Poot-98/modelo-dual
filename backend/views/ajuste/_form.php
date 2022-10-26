<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Ajuste $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ajuste-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'num_semanas_semestre')->textInput() ?>

    <?= $form->field($model, 'inicio_preregistro')->textInput() ?>

    <?= $form->field($model, 'fin_preregistro')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
