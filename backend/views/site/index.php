<?php

use yii\helpers\Url;
use yii\helpers\Html;

/** @var yii\web\View $this */


$this->title = 'My Yii Application';
?>

<head>
    <link rel="stylesheet" href="web/css/index.css">
</head>
<form class="forma">
    <div class="site-index">
        <h2 class="text-primary text-gradient mb-0">Administra las diferentes secciones</h2>
        <br>

        <div class="form">

            <div class="row">

                <div class="col-md-6">
                    <h2>Proyectos</h2>
                    <img src=<?php echo Url::to('@web/archivos/proyecto.jpg', true); ?> ALT="imagen de referencia de proyectos">
                    <p>
                        <?php
                        if (!Yii::$app->user->isGuest) {
                            echo Html::a('Administrar', ['proyecto/index'], ['class' => 'btn btn-outline-primary']);
                        }
                        ?>
                    </p>
                </div>

                <div class="col-md-6">
                    <h2>Pre-Registros</h2>
                    <img src=<?php echo Url::to('@web/archivos/preregistro.png', true); ?> ALT="Imagen de referencia de preregistros">
                    <p>
                        <?php
                        if (!Yii::$app->user->isGuest) {
                            echo Html::a('Administrar', ['preregistro/index'], ['class' => 'btn btn-outline-primary']);
                        }
                        ?>
                    </p>
                </div>


            </div>
        </div>
</form>
</div>
</div>

</div>