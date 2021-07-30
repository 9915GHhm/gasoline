<?php
require_once "Gasoline.php";

error_reporting(E_ERROR | E_PARSE);

if (!is_null($_REQUEST['placa'])) {

    $placa = $_REQUEST['placa'];
    $cal   = new Matriculas();
    $show  = $cal->placas($placa);

    if ($show == false) {

        echo json_encode($show);

    } else {

        echo json_encode($show, JSON_FORCE_OBJECT, JSON_UNESCAPED_UNICODE);

    }

}
