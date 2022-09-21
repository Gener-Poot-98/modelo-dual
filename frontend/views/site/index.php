<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Sistema-Dual';

use yii\helpers\Url;

$asset = frontend\assets\AppAsset::register($this);
$baseUrl = $asset->baseUrl;
?>

<?php if (Yii::$app->session->hasFlash('success')) : ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('warning')) : ?>
    <div class="alert alert-warning">
        <?= Yii::$app->session->getFlash('warning'); ?>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('error')) : ?>
    <div class="alert alert-danger">
        <?= Yii::$app->session->getFlash('error'); ?>
    </div>
<?php endif; ?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="row text-center my-sm-5 mt-5">
                <div class="col-lg-6 mx-auto">
                    <h2 class="text-primary text-gradient mb-0">Valoramos tu tiempo</h2>
                    <h2 class="">Al Instante</h2>
                    <p class="lead">Aprovecha el sistema de educación dual y trabaja con una empresa desde ahora!<br /> </p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="row mt-4">
                    <div class="col-md-6">

                        <div class="card move-on-hover">
                            <img class="w-100" src=<?php echo Url::to('@web/archivos/admin.png', true); ?> alt="">
                        </div>
                        <div class="mt-2 ms-2">
                            <a href="#">
                                <h6 class="mb-0">Ing en Administración</h6>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6 mt-md-0 mt-5">
                        <div class="card move-on-hover">
                            <img class="w-100" src=<?php echo Url::to('@web/archivos/industrial.png', true); ?> alt="">
                        </div>
                        <div class="mt-2 ms-2">
                            <a href="#">
                                <h6 class="mb-0">Ing Industrial</h6>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6 mt-md-0 mt-6">
                        <div class="card move-on-hover">
                            <img class="w-100" src=<?php echo Url::to('@web/archivos/sistemas.png', true); ?> alt="">
                        </div>
                        <div class="mt-2 ms-2">
                            <h6>
                                Ing en Sistemas Computacionales.
                        </div>
                        </h6>
                    </div>

                    <div class="col-md-6 mt-md-0 mt-6">
                        <div class="card move-on-hover">
                            <img class="w-100" src=<?php echo Url::to('@web/archivos/ambiental.png', true); ?> alt="">
                        </div>
                        <div class="mt-2 ms-2">
                            <h6>
                                Ing Ambiental.
                        </div>
                        </h6>
                    </div>

                    <div class="col-md-6 mt-md-0 mt-6">
                        <div class="card move-on-hover">
                            <img class="w-100" style="width:100%;;" src=<?php echo Url::to('@web/archivos/civil.jpg', true); ?> alt="">
                        </div>
                        <div class="mt-2 ms-2">
                            <h6>
                                Ing Civil
                            </h6>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-3 mx-auto mt-md-0 mt-5">
                <div class="position-sticky" style="top:100px !important">
                    <h4 class="">Sistema de Eduación Dual</h4>
                    <h6 class="text-secondary">Éstas son solo una pequeña prueba de alumnos trabajando en una empresa desde septimo semestre!</h6>
                </div>
            </div>
        </div>
</section>



<!-- -------   START PRE-FOOTER 2 - simple social line w/ title & 3 buttons    -------- -->
<div class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 ms-auto">
                <h4 class="mb-1">¡Gracias por tu apoyo!</h4>
                <p class="lead mb-0">Encontraras mas informacion en el Tecnologico Superior de Valladolid</p>
            </div>
            <div class="col-lg-5 me-lg-auto my-lg-auto text-lg-end mt-5">
                <a href="https://twitter.com" class="btn btn-info mb-0 me-2" target="_blank">
                    <i class="fab fa-twitter me-1"></i> Tweet
                </a>
                <a href="https://www.facebook.com/TecNMCampusValladolid" class="btn btn-primary mb-0 me-2" target="_blank">
                    <i class="fab fa-facebook-square me-1"></i> facebook
                </a>
            </div>
        </div>
    </div>
</div>