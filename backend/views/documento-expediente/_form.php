<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\DocumentoExpediente $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="documento-expediente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'comentario')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
