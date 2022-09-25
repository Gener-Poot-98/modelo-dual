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

    <?= $form->field($model, 'departamento_id')->dropDownList($model->getDepartamentoList(), ['prompt' => 'Seleccione el departamento']) ?>

    <?= $form->field($model, 'ingenieria_id')->dropDownList($model->getIngenieriasList(), ['prompt' => 'Seleccione la Ingeniería']) ?>

    <?php
    echo $form->field($model, 'nombreEstudiante')->widget(Typeahead::classname(), [
        'options' => ['placeholder' => 'Ingresa el nombre del estudiante...'],
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

    <?php
    echo $form->field($model, 'nombreEmpresa')->widget(Typeahead::classname(), [
        'options' => ['placeholder' => 'Ingresa el nombre de la empresa...'],
        'pluginOptions' => ['highlight' => true],
        'dataset' => [
            [
                'datumTokenizer' =>
                "Bloodhound.tokenizers.obj.whitespace('value')",
                'display' => 'value',
                'remote' => [
                    'url' => Url::to(['proyecto/empresa-list']), 
                        '?q=%QUERY',
                    'wildcard' => '%QUERY'
                ]
            ]
        ]
    ]);
    ?>

    <?php
    echo $form->field($model, 'nombreAsesorExterno')->widget(Typeahead::classname(), [
        'options' => ['placeholder' => 'Ingresa el nombre del asesor externo...'],
        'pluginOptions' => ['highlight' => true],
        'dataset' => [
            [
                'datumTokenizer' =>
                "Bloodhound.tokenizers.obj.whitespace('value')",
                'display' => 'value',
                'remote' => [
                    'url' => Url::to(['proyecto/asesor-externo-list']), 
                        '?q=%QUERY',
                    'wildcard' => '%QUERY'
                ]
            ]
        ]
    ]);
    ?>

    <?= $form->field($model, 'estado_proyecto_id')->dropDownList($model->getEstadoProyectosList(), ['prompt' => 'Seleccione el estado del proyecto']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


