<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\widgets\DatePicker;

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
                    widget(DatePicker::className(),[
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                        'layout' => '{picker}{input}{remove}',
                        'pluginOptions' => [
                            'autoclose' => true,
                            'todayHighlight' => true,
                            'todayBtn' => true,
                            'format' => 'yyyy-mm-dd',
                        ]
                ]) ?>
        </div>

        <div class="col-md-6">
            <?php echo $form->field($model,'fecha_cierre')->
                        widget(DatePicker::className(),[
                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                            'layout' => '{picker}{input}{remove}',
                            'pluginOptions' => [
                                'autoclose' => true,
                                'todayHighlight' => true,
                                'todayBtn' => true,
                                'format' => 'yyyy-mm-dd',
                            ]
                ]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
