<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\widgets\Typeahead;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Proyecto $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="proyecto-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="col-md-6">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'plan_estudios_id')->dropDownList($model->getPlanEstudiosList(), ['prompt' => 'Seleccione el plan de estudio']) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'departamento_id')->dropDownList($model->getDepartamentoList(), ['prompt' => 'Seleccione el departamento']) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'asesor_interno_id')->dropDownList($model->getAsesorInternoList(), ['prompt' => 'Seleccione el asesor interno']) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'ingenieria_id')->dropDownList($model->getIngenieriasList(), ['prompt' => 'Seleccione la Ingeniería']) ?>
        </div>

        <div class="col-md-6">

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
        </div>

        <div class="col-md-6">
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
        </div>

        <div class="col-md-6">
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
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'periodo_id')->textInput() ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'horas_totales')->textInput() ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'estado_proyecto_id')->dropDownList($model->getEstadoProyectosList(), ['prompt' => 'Seleccione el estado del proyecto']) ?>
        </div>
    </div>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>