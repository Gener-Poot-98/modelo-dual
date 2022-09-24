<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/** @var yii\web\View $this */
/** @var common\models\Preregistro $model */
/** @var yii\widgets\ActiveForm $form */

$this->registerCss("

    
    .preregistro-form{
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-flow: column wrap;
        border-radius: 5px;
        padding:20px;
        
    }

    #w0{

        width: 65%;
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

    .btn-primary {
        color: #fff;
        background-color: #03459a !important;
        border-color: #cb0c9f;
    }
    
    ");

?>

<?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success">
            <?= Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('warning')): ?>
        <div class="alert alert-warning">
            <?= Yii::$app->session->getFlash('warning'); ?>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger">
            <?= Yii::$app->session->getFlash('error'); ?>
        </div>
    <?php endif; ?>

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
        <?= Html::submitButton('Guardar', ['class' => 'btn bg-gradient-info btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>