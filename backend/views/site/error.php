<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception*/

use yii\helpers\Html;
use yii\helpers\Url;


$this->title = $name;
?>
<div class="site-error">

    <!--<h1><?= Html::encode($this->title) ?></h1> -->

    <img style="width:30%;" src=<?php echo Url::to('@web/archivos/error403.png', true); ?> ALT="Imagen de referencia de documento">

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        El error anterior ocurrió mientras el servidor web procesaba su solicitud.
    </p>
    <p>
        Póngase en contacto con nosotros si cree que se trata de un error del servidor. Gracias.
    </p>

</div>
