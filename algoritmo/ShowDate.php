<?php
require_once "Gasoline.php";

if (!empty($_POST['fecha']) && is_string($_POST['fecha'])) {

    $fecha = $_POST['fecha'];
    $cal   = new Matriculas();
    $show  = $cal->today($_POST['fecha']);

    if ($show == false) {

        echo json_encode($show);

    } else {

        echo json_encode($show, JSON_FORCE_OBJECT, JSON_UNESCAPED_UNICODE);

    }

}
