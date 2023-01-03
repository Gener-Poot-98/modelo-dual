<?php

use common\models\Ingenieria;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;


/** @var yii\web\View $this */
/** @var common\models\AsesorInterno $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="asesor-interno-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?=  $form->field($model, 'ingenieria_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Ingenieria::find()->all(), 'id', 'nombre'),
                'theme' => Select2::THEME_BOOTSTRAP,
                'size' => Select2::LARGE,
                'options' => ['placeholder' => Yii::t('app', 'Selecciona una ingenieria')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
