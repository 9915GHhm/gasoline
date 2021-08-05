<?php
require_once "Gasoline.php";

if (!isset($_REQUEST['fecha']) && !isset($_REQUEST['placa'])) {
    $cal  = new Matriculas();
    $show = $cal->today();

    $datos = ('
        <div class="alert alert-primary" role="alert">
            <h3>Para hoy <b class="clo">' . $show[0] . ', ' . $show[1] . '</b> les corresponden<br>
            a las placas que terminan en: <b class="clo"><span class="parpadea text">' . $show[2] . '</b>
            </h3>
        </div>
        ');

    echo json_encode($datos, JSON_FORCE_OBJECT, JSON_UNESCAPED_UNICODE);
}
