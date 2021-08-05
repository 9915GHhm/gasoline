<?php
require_once "Gasoline.php";

if (!empty($_REQUEST['fecha']) && is_string($_REQUEST['fecha'])) {

    $fecha = $_REQUEST['fecha'];
    $cal   = new Matriculas();
    $show  = $cal->today($fecha);

    if ($show == false) {

        $error = ('
           <div class="atencion" role="alert">
                <article>
                <h3><strong>La fecha se introdujo de forma incorrecta, <br>debe utilizar el formato dd/mm/YYYY</strong></h3>
                <article>
            </div>
         ');

        $datos = [$show, $error];

        echo json_encode($datos, JSON_FORCE_OBJECT, JSON_UNESCAPED_UNICODE);

    } else {

        $date = ('
            <h2>Consultando fecha: <b class="consult"><span class="parpadea text">' . $fecha . '</b></h2>
            <div class="alert alert-primary" role="alert">
                <h3>El <b class="clo">' . $show[0] . ', ' . $show[1] . '</b> les corresponden<br>
                a las placas que terminan en: <b class="clo"><span class="parpadea text">' . $show[2] . '</b></h3>
            </div>
            ');

        echo json_encode($date, JSON_FORCE_OBJECT, JSON_UNESCAPED_UNICODE);
    }
}
