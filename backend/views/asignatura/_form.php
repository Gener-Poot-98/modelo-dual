<?php

use common\models\Docente;
use common\models\Ingenieria;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;



/** @var yii\web\View $this */
/** @var common\models\Asignatura $model */
/** @var yii\widgets\ActiveForm $form */


?>

<div class="asignatura-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="col-md-6">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'clave')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'creditos')->textInput(['maxlength' => true]) ?>
        </div>
        
        <div class="col-md-6">
            <?= $form->field($model, 'competencia_disciplinar')->textarea(['rows' => 3]) ?>
        </div>

        <div class="col-md-6">
        <?=  $form->field($model, 'docente_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Docente::find()->all(), 'id', 'nombre'),
                'theme' => Select2::THEME_BOOTSTRAP,
                'size' => Select2::MEDIUM,
                'options' => ['placeholder' => Yii::t('app', 'Selecionar docente')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-md-6">
        <?=  $form->field($model, 'ingenieria_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Ingenieria::find()->all(), 'id', 'nombre'),
                'theme' => Select2::THEME_BOOTSTRAP,
                'size' => Select2::LARGE,
                'options' => ['placeholder' => Yii::t('app', 'Selecionar ingeneria')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'periodo_desarrollo')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'periodo_acreditacion')->textInput(['maxlength' => true]) ?>
        </div>

    </div>
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>