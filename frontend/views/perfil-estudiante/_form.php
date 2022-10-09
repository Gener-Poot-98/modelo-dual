<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\PerfilEstudiante $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="perfil-estudiante-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'matricula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ingenieria_id')->dropDownList($model->ingenieriaLista, ['prompt' => 'Por favor Seleccione Uno' ]);?>

    <?= $form->field($model, 'genero_id')->dropDownList($model->generoLista, ['prompt' => 'Por favor Seleccione Uno' ]);?>

    <?= $form->field($model, 'especialidad_id')->dropDownList($model->especialidadLista, ['prompt' => 'Por favor Seleccione Uno' ]);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
