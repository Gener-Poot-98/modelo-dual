<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Expediente $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="expediente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'motivo_cierre_id')->dropDownList($model->getMotivoCierreList(), ['prompt' => 'Seleccione el motivo']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
