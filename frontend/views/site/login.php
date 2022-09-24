<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss("

label, .login-form{
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
<div class="site-login">
    <h1 style="text-align:center;"><?= Html::encode($this->title) ?></h1>

    <p style="text-align:center;">Por favor llene los siguientes campos para iniciar sesión:</p>

    <div class="row1">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                    <br>
                    Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn bg-gradient-info btn-lg btn-block', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
