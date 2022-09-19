<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Typeahead;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Proyecto $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="proyecto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'departamento_id')->textInput() ?>

    <?= $form->field($model, 'ingenieria_id')->textInput() ?>

    <?php
    echo $form->field($model, 'nombreEstudiante')->widget(Typeahead::classname(), [
        'options' => ['placeholder' => 'Nombre del estudiante ...'],
        'pluginOptions' => ['highlight' => true],
        'dataset' => [
            [
                'datumTokenizer' =>
                "Bloodhound.tokenizers.obj.whitespace('value')",
                'display' => 'value',
                'remote' => [
                    'url' => Url::to(['proyecto/nombre-list']), 
                        '?q=%QUERY',
                    'wildcard' => '%QUERY'
                ]
            ]
        ]
    ]);
    ?>

    <?= $form->field($model, 'empresa_id')->textInput() ?>

    <?= $form->field($model, 'asesor_externo_id')->textInput() ?>

    <?= $form->field($model, 'estado_proyecto_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


