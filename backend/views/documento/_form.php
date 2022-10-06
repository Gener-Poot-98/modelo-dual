<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;

/** @var yii\web\View $this */
/** @var common\models\Documento $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="documento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <div class="row">
        <div class="col-md-6">
            <?php echo $form->field($model,'fecha_inicio')->
                    widget(DateTimePicker::className(),[
                        'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
                        'layout' => '{picker}{input}{remove}',
                        'pluginOptions' => [
                            'showMeridian' => true,
                            'autoclose' => true,
                            'todayBtn' => true
                        ]
                ]) ?>
        </div>

        <div class="col-md-6">
            <?php echo $form->field($model,'fecha_cierre')->
                        widget(DateTimePicker::className(),[
                            'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
                            'layout' => '{picker}{input}{remove}',
                            'pluginOptions' => [
                                'showMeridian' => true,
                                'autoclose' => true,
                                'todayBtn' => true
                            ]
                ]) ?>
        </div>
    </div>

    <?= $form->field($model, 'estado_documento_id')->dropDownList($model->estadoDocumentoNombreList, ['prompt' => 'Por favor Seleccione Uno' ]);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
