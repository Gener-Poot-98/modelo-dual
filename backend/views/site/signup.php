<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Registro';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss("

label, .form-signup{
    font-size:20px;
}

.row1{
    width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-flow: column wrap;
        border-radius: 5px;
        padding:20px
}

");
?>


<div class="site-signup">
    <h1 style="text-align:center;"><?= Html::encode($this->title) ?></h1>

    <p style="text-align:center;">Por favor llene los siguientes campos para registrarse:</p>

    <div class="row1">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Registrarse', ['class' => 'btn bg-gradient-info btn-lg btn-block', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>