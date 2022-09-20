<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/** @var yii\web\View $this */
/** @var common\models\Preregistro $model */
/** @var yii\widgets\ActiveForm $form */

$this->registerCss("
    
    .preregistro-form{
        width: 90%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-flow: column wrap;
        border-radius: 5px;
        
    }
    label, .preregistro-form {
        font-size:18px;
        
    }

    .help-block{
        color: #fd5c70;
    }    
    
    .form-control {
        font-size:18px;
    }
    ");

?>

<div class="preregistro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'matricula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ingenieria_id')->dropDownList($model->getIngenieriasList(), ['prompt' => 'Seleccione su Ingeniería']) ?>

    <?= $form->field($model, 'archivoKardex')->widget(FileInput::classname(), [
        'options' => ['accept' => 'file/*'],
        'pluginOptions'=>['allowedFileExtensions'=>['pdf'],
                        'showUpload' => false]]) ?>

    <?= $form->field($model, 'archivoConstancia_ingles')->widget(FileInput::classname(), [
            'options' => ['accept' => 'file/*'],
            'pluginOptions'=>['allowedFileExtensions'=>['pdf'],
                            'showUpload' => false]]) ?>

    <?= $form->field($model, 'archivoConstancia_servicio_social')->widget(FileInput::classname(), [
                'options' => ['accept' => 'file/*'],
                'pluginOptions'=>['allowedFileExtensions'=>['pdf'],
                                'showUpload' => false]]) ?>

    <?= $form->field($model, 'archivoConstancia_creditos_complementarios')->widget(FileInput::classname(), [
                    'options' => ['accept' => 'file/*'],
                    'pluginOptions'=>['allowedFileExtensions'=>['pdf'],
                                    'showUpload' => false]]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-info btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
