<?php

use yii\helpers\Url;
use yii\helpers\Html;

/** @var yii\web\View $this */


$this->title = 'Sistema Dual';
?>

<head>
    <link rel="stylesheet" href="web/css/index.css">
</head>
<form class="forma">
    <div class="site-index">
        <h1 style="text-align:center;" class="text-primary text-gradient mb-0">Administra las diferentes secciones</h2>
            <br>

            <div class="form">

                <div class="row">

                    <div class="col-md-4">
                        <h2 style="text-align:center;">Proyectos</h2>
                        <img src=<?php echo Url::to('@web/archivos/proyecto.jpg', true); ?> ALT="imagen de referencia de proyectos">
                        <p style="text-align:center;">
                            <?php
                            if (!Yii::$app->user->isGuest) {
                                echo Html::a('Administrar', ['proyecto/index'], ['class' => 'btn btn-outline-primary']);
                            }
                            ?>
                        </p>
                    </div>

                    <div class="col-md-4" style="padding:10px;">
                        <h2 style="text-align:center;"> Pre-Registros</h2>
                        <img src=<?php echo Url::to('@web/archivos/preregistro.png', true); ?> ALT="Imagen de referencia de preregistros">
                        <p style="text-align:center;">
                            <?php
                            if (!Yii::$app->user->isGuest) {
                                echo Html::a('Administrar', ['preregistro/index'], ['class' => 'btn btn-outline-primary']);
                            }
                            ?>
                        </p>
                    </div>

                    <div class="col-md-4">
                        <h2 style="text-align:center;"> Asignaturas</h2>
                        <img src=<?php echo Url::to('@web/archivos/asignatura.png', true); ?> ALT="Imagen de referencia de asignaturas">
                        <p style="text-align:center;">
                            <?php
                            if (!Yii::$app->user->isGuest) {
                                echo Html::a('Administrar', ['asignatura/index'], ['class' => 'btn btn-outline-primary']);
                            }
                            ?>
                        </p>
                    </div>

                    <div class="row justify-content-center" style="padding:10px;">
                        <div class="col-md-4">
                            <h2 style="text-align:center;">Expedientes</h2>
                            <img src=<?php echo Url::to('@web/archivos/expedientes.png', true); ?> ALT="Imagen de referencia de expediente ">
                            <p style="text-align:center;">
                                <?php
                                if (!Yii::$app->user->isGuest) {
                                    echo Html::a('Administrar', ['perfil-estudiante/index'], ['class' => 'btn btn-outline-primary']);
                                }
                                ?>
                            </p>
                        </div>

                        <div class="col-md-4 ">
                            <h2 style="text-align:center;">Documentos</h2>
                            <img src=<?php echo Url::to('@web/archivos/documento.jpg', true); ?> ALT="Imagen de referencia de documento">
                            <p style="text-align:center;">
                                <?php
                                if (!Yii::$app->user->isGuest) {
                                    echo Html::a('Administrar', ['documento/index'], ['class' => 'btn btn-outline-primary']);
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
</form>
