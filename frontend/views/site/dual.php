<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Quiero ser Dual';
?>

<div class="site-index">

<h1 style="text-align:center;" class="text-primary text-gradient mb-0">¡Forma parte del Modelo Dual!</h2>
<br><br>

<div class="row row-cols-1 row-cols-md-2">
    <div class="col mb-4">
        <!-- Card -->
        <div class="card">

        <!--Card image-->
        <div class="view overlay">
            <img class="card-img-top" src=<?php echo Url::to('@web/archivos/preregistro2.png', true); ?>
            alt="Card image cap">
            <a href="#!">
            <div class="mask rgba-white-slight"></div>
            </a>
        </div>

        <!--Card content-->
        <div class="card-body">

            <!--Title-->
            <h4 class="card-title">Pre-registrate al Modelo Dual</h4>
            <!--Text-->
            <p class="card-text">¿Te gustaría ser un alumno Dual? Pre-registrate ingresando los datos y documentos
            solicitados.</p>
            <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
            <p>
                <?php
                    if (Yii::$app->user->isGuest) {
                        echo Html::a('Pre-registrarme', ['preregistro/create'], ['class' => 'btn btn-outline-primary']);
                    }
                ?>
            </p>

        </div>

        </div>
        <!-- Card -->
    </div>
    <div class="col mb-4">
        <!-- Card -->
        <div class="card">

        <!--Card image-->
        <div class="view overlay">
            <img class="card-img-top" src=<?php echo Url::to('@web/archivos/consulta2.jpg', true); ?>
            alt="Card image cap">
            <a href="#!">
            <div class="mask rgba-white-slight"></div>
            </a>
        </div>

        <!--Card content-->
        <div class="card-body">

            <!--Title-->
            <h4 class="card-title">Consulta el estado de tu Pre-registro</h4>
            <!--Text-->
            <p class="card-text">¿Ya te Pre-registraste? Ahora puedes consultar el estado de tu Pre-registro
            con tu matricula escolar.</p>
            <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
            <p>
                <?php
                    if (Yii::$app->user->isGuest) {
                        echo Html::a('Consultar', ['preregistro/consulta'], ['class' => 'btn btn-outline-primary']);
                    }
                ?>
            </p>

        </div>

        </div>
    </div>
    </div>
</div>
