<?php
require_once "Gasoline.php";

if (!is_null($_REQUEST['placa'])) {

    $placa = $_REQUEST['placa'];
    $cal   = new Matriculas();
    $show  = $cal->placas($placa);

    if ($show == false) {

        $error = ('
           <div class="atencion" role="alert">
                    <article>
                    <h3><strong>¡Sólo puede introducir números y<br>únicamente un(01) dígito!</strong></h3>
                    </article>
                </div>
         ');

        $datos = [$show, $error];

        echo json_encode($datos, JSON_FORCE_OBJECT, JSON_UNESCAPED_UNICODE);

    } else {

        $plac = ('
            <h2>Consultando placa Nro: <b class="consult"><span class="parpadea text">' . $placa . '</b></h2>
           <div class="alert alert-primary" role="alert">
                <h3>El <b class="clo">' . $show[0] . ', ' . $show[1] . '</b> les corresponden<br>
                a las placas que terminan en: <b class="clo"><span class="parpadea text">' . $show[2] . '</b></h3>
            ');

        echo json_encode($plac, JSON_FORCE_OBJECT, JSON_UNESCAPED_UNICODE);
    }
}
