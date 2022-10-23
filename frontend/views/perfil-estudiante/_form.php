<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\PerfilEstudiante $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="perfil-estudiante-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="col-md-6">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'matricula')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'ingenieria_id')->dropDownList($model->ingenieriaLista, ['prompt' => 'Por favor Seleccione Uno' ]);?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'genero_id')->dropDownList($model->generoLista, ['prompt' => 'Por favor Seleccione Uno' ]);?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'especialidad_id')->dropDownList($model->especialidadLista, ['prompt' => 'Por favor Seleccione Uno' ]);?>
        </div>
        
    </div>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
