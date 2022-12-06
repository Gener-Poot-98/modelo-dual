<?php

use common\models\AsesorExterno;
use common\models\Empresa;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

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
            <?php $ingenieriaList=ArrayHelper::map(common\models\Ingenieria::find()->all(), 'id', 'nombre' ); ?> 
            <?= $form->field($model, 'ingenieria_id')->dropDownList($ingenieriaList, ['prompt' => 'Seleccione la Ingeniería', 'id'=>'nombre']); ?>
        </div>

        <div class="col-md-6">

            <?php
            echo $form->field($model, 'perfil_estudiante_id')->widget(DepDrop::classname(), [
                'type' => DepDrop::TYPE_SELECT2,
                'options'=>['id'=>'perfil_estudiante_id'],
                'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                'pluginOptions'=>[
                'depends'=>['nombre'], // the id for cat attribute
                'placeholder'=>'Seleccione un estudiante',
                'url'=>  \yii\helpers\Url::to(['proyecto/estudiantes-list']),
                'initialize' => $model->isNewRecord ? false : true,
                ]
                ]);
            ?>
        </div>

        <div class="col-md-6">
        <?php
            echo $form->field($model, 'asesor_interno_id')->widget(DepDrop::classname(), [
                'type' => DepDrop::TYPE_SELECT2,
                'options'=>['id'=>'asesor_interno_id'],
                'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                'pluginOptions'=>[
                'depends'=>['nombre'], // the id for cat attribute
                'placeholder'=>'Seleccione un asesor',
                'url'=>  \yii\helpers\Url::to(['proyecto/asesores-internos-list']),
                'initialize' => $model->isNewRecord ? false : true,
                ]
                ]);
            ?>
        </div>
        
        <div class="col-md-6">
        <?=  $form->field($model, 'asesor_externo_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(AsesorExterno::find()->all(), 'id', 'nombre'),
                'theme' => Select2::THEME_BOOTSTRAP,
                'size' => Select2::MEDIUM,
                'options' => ['placeholder' => Yii::t('app', 'Seleccionar asesor externo')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-md-6">
            <?=  $form->field($model, 'empresa_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Empresa::find()->all(), 'id', 'nombre'),
                'theme' => Select2::THEME_BOOTSTRAP,
                'size' => Select2::MEDIUM,
                'options' => ['placeholder' => Yii::t('app', 'Selecionar empresa')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>


        <div class="col-md-6">
        <?= $form->field($model, 'periodo_id')->dropDownList($model->getPeriodoList(), ['prompt' => 'Seleccione un periodo']) ?>

        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'estado_proyecto_id')->dropDownList($model->getEstadoProyectosList(), ['prompt' => 'Seleccione el estado del proyecto']) ?>
        </div>
    </div>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>