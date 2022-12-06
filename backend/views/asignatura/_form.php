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

    <?php $form = ActiveForm::begin();
    $dataMes = [
        "ENE" => "ENERO",
        "FEB" => "FEBRERO",
        "MAR" => "MARZO",
        "ABR" => "ABRIL",
        "MAY" => "MAYO",
        "JUN" => "JUNIO",
        "JUL" => "JULIO",
        "AGO" => "AGOSTO",
        "SEP" => "SEPTIEMBRE",
        "OCT" => "OCTUBRE",
        "NOV" => "NOVIEMBRE",
        "DIC" => "DICIEMBRE"

    ];

    $dataAnio = [
        "2022" => "2022",
        "2023" => "2023",
        "2024" => "2024",
        "2025" => "2025",
        "2026" => "2026",
        "2027" => "2027",
        "2028" => "2028",
        "2029" => "2029",
        "2030" => "2030"
    ];
    ?>

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
            <?= $form->field($model, 'docente_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Docente::find()->all(), 'id', 'nombre'),
                'theme' => Select2::THEME_BOOTSTRAP,
                'size' => Select2::LARGE,
                'options' => ['placeholder' => Yii::t('app', 'Selecionar docente')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'ingenieria_id')->widget(Select2::classname(), [
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

        <h5>Periodo de Desarrollo</h5>

            <div class="row">
                <div class="col">

                    <?=
                    $form->field($model, 'mes_inicio')->widget(Select2::classname(), [
                        'data' => $dataMes,
                        'theme' => Select2::THEME_BOOTSTRAP,
                        'size' => Select2::LARGE,
                        'options' => ['placeholder' => Yii::t('app', 'Selecionar mes')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="col">
                    <?=
                    $form->field($model, 'anio_inicio')->widget(Select2::classname(), [
                        'data' => $dataAnio,
                        'theme' => Select2::THEME_BOOTSTRAP,
                        'size' => Select2::LARGE,
                        'options' => ['placeholder' => Yii::t('app', 'Selecionar año')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

            </div>
        </div>
        <div class="col-md-6">
        <h5>Periodo de Acreditación</h5>

            <div class="row">

                <div class="col-sm-6">
                    <?=
                    $form->field($model, 'mes_final')->widget(Select2::classname(), [
                        'data' => $dataMes,
                        'theme' => Select2::THEME_BOOTSTRAP,
                        'size' => Select2::LARGE,
                        'options' => ['placeholder' => Yii::t('app', 'Selecionar mes')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="col-sm-6">
                    <?=
                    $form->field($model, 'anio_final')->widget(Select2::classname(), [
                        'data' => $dataAnio,
                        'theme' => Select2::THEME_BOOTSTRAP,
                        'size' => Select2::LARGE,
                        'options' => ['placeholder' => Yii::t('app', 'Selecionar año')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>            
    </div>
            <div class="form-group">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-success btn-lg btn-block']) ?>
            </div>

            <?php ActiveForm::end(); ?>
</div>
    
