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
                        <!-- Card -->
                        <div class="card">

                            <!-- Card image -->
                            <div class="view overlay">
                                <img class="card-img-top" src=<?php echo Url::to('@web/archivos/proyect.jpg', true); ?> alt="Card image cap">
                                <a href="#!">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>

                            <!-- Card content -->
                            <div class="card-body">

                                <!-- Title -->
                                <h4 class="card-title">Proyectos</h4>
                                <!-- Text -->
                                <p style="text-align:justify;" class="card-text">Administra los diferentes proyectos que contiene el sistema de
                                    Educación Dual.
                                </p>
                                <!-- Button -->
                                <p style="text-align:center;">
                                    <?php
                                    if (!Yii::$app->user->isGuest) {
                                        echo Html::a('Administrar', ['proyecto/index'], ['class' => 'btn btn-outline-primary']);
                                    }
                                    ?>
                                </p>

                            </div>

                        </div>
                        <!-- Card -->
                    </div>

                    <div class="col-md-4">
                        <!-- Card -->
                        <div class="card">

                            <!-- Card image -->
                            <div class="view overlay">
                                <img class="card-img-top" src=<?php echo Url::to('@web/archivos/Registro.png', true); ?> alt="Card image cap">
                                <a href="#!">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>

                            <!-- Card content -->
                            <div class="card-body">

                                <!-- Title -->
                                <h4 class="card-title">Pre-Registro</h4>
                                <!-- Text -->
                                <p style="text-align:justify;" class="card-text">Administra los estudiantes que han hecho su preregistro el sistema.
                                </p>
                                <!-- Button -->
                                <p style="text-align:center;">
                                    <?php
                                    if (!Yii::$app->user->isGuest) {
                                        echo Html::a('Administrar', ['preregistro/index'], ['class' => 'btn btn-outline-primary']);
                                    }
                                    ?>
                                </p>

                            </div>

                        </div>
                        <!-- Card -->
                    </div>

                    <div class="col-md-4">
                        <!-- Card -->
                        <div class="card">

                            <!-- Card image -->
                            <div class="view overlay">
                                <img class="card-img-top" src=<?php echo Url::to('@web/archivos/asignatur.png', true); ?> alt="Card image cap">
                                <a href="#!">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>

                            <!-- Card content -->
                            <div class="card-body">

                                <!-- Title -->
                                <h4 class="card-title">Asignaturas</h4>
                                <!-- Text -->
                                <p style="text-align:justify;" class="card-text">Administra las diferentes asignaturas que contiene el sistema de
                                    Educación Dual.
                                </p>
                                <!-- Button -->
                                <p style="text-align:center;">
                                    <?php
                                    if (!Yii::$app->user->isGuest) {
                                        echo Html::a('Administrar', ['asignatura/index'], ['class' => 'btn btn-outline-primary']);
                                    }
                                    ?>
                                </p>

                            </div>

                        </div>
                        <!-- Card -->
                    </div>

                    <div class="row justify-content-center" style="padding:20px;">
                        <div class="col-md-4">
                            <!-- Card -->
                            <div class="card">

                                <!-- Card image -->
                                <div class="view overlay">
                                    <img class="card-img-top" src=<?php echo Url::to('@web/archivos/expediente.png', true); ?> alt="Card image cap">
                                    <a href="#!">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>

                                <!-- Card content -->
                                <div class="card-body">

                                    <!-- Title -->
                                    <h4 class="card-title">Expediente</h4>
                                    <!-- Text -->
                                    <p style="text-align:justify;" class="card-text">Administra los expedientes de los alumnos duales.
                                    </p>
                                    <!-- Button -->
                                    <p style="text-align:center;">
                                        <?php
                                        if (!Yii::$app->user->isGuest) {
                                            echo Html::a('Administrar', ['expediente/index'], ['class' => 'btn btn-outline-primary']);
                                        }
                                        ?>
                                    </p>

                                </div>

                            </div>
                            <!-- Card -->
                        </div>

                        <div class="col-md-4">
                            <!-- Card -->
                            <div class="card">

                                <!-- Card image -->
                                <div class="view overlay">
                                    <img class="card-img-top" src=<?php echo Url::to('@web/archivos/doc.jpg', true); ?> alt="Card image cap">
                                    <a href="#!">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>

                                <!-- Card content -->
                                <div class="card-body">

                                    <!-- Title -->
                                    <h4 class="card-title">Documentos</h4>
                                    <!-- Text -->
                                    <p style="text-align:justify;" class="card-text">Administra los documentos que contiene el sistema de
                                        Educación Dual.
                                    </p>
                                    <!-- Button -->
                                    <p style="text-align:center;">
                                        <?php
                                        if (!Yii::$app->user->isGuest) {
                                            echo Html::a('Administrar', ['documento/index'], ['class' => 'btn btn-outline-primary']);
                                        }
                                        ?>
                                    </p>

                                </div>

                            </div>
                            <!-- Card -->
                        </div>
                    </div>
                </div>
            </div>
</form>