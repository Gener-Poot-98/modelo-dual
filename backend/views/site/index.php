<?php

use yii\helpers\Url;
use yii\helpers\Html;

/** @var yii\web\View $this */

$this->registerCss("
body-content{
    padding: 25px;
}

.text-gradient.text-primary {
    background-image: linear-gradient(310deg, blue, black);
}

.text-gradient {
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    position: relative;
    z-index: 1;
}

.text-primary {
    color: #007bff;
}

.forma{
    background-color: rgba(255, 255, 255, 0.95);
    color: rgb(26, 24, 24);
    padding: 20px 0;
    border-radius: 10px;
    box-shadow: 0 0 6px 0 rgba(44, 141, 226, 0.8);
    justify-content: center;
    align-items: center;
}

.form{
    width: 100%;
    position: relative;
    justify-content: center;
    padding: 25px;

}

");
$this->title = 'Sistema Dual';
?>

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
                                <img class="card-img-top" src=<?php echo Url::to('@web/archivos/proyecto.jpg', true); ?> alt="Card image cap">
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
                                <img class="card-img-top" src=<?php echo Url::to('@web/archivos/asignaturas.jpg', true); ?> alt="Card image cap">
                                <a href="#!">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>

                            <!-- Card content -->
                            <div class="card-body">

                                <!-- Title -->
                                <h4 class="card-title">Ingenierías y Asignaturas</h4>
                                <!-- Text -->
                                <p style="text-align:justify;" class="card-text">Administra las Ingenierías y asignaturas del sistema de
                                    Educación Dual.
                                </p>
                                <!-- Button -->
                                <p style="text-align:center;">
                                    <?php
                                    if (!Yii::$app->user->isGuest) {
                                        echo Html::a('Administrar', ['ingenieria/index'], ['class' => 'btn btn-outline-primary']);
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
                                            echo Html::a('Administrar', ['perfil-estudiante/index'], ['class' => 'btn btn-outline-primary']);
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