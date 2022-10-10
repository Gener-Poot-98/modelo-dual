<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\Asignatura;
use common\models\Proyecto;

/** @var yii\web\View $this */
/** @var common\models\ProyectoAsignatura $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="proyecto-asignatura-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'asignaturaArray')->widget(Select2::classname(), [

        'data' => ArrayHelper::map(Asignatura::find()->all(), 'id', 'nombre'),
        'theme' => Select2::THEME_BOOTSTRAP,
        'size' => Select2::LARGE,
        'options' => ['placeholder' => Yii::t('app', 'Select...')],
        'pluginOptions' => [
            'allowClear' => true,
            'multiple' => true,
        ],
        ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
