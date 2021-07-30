<?php
require_once "Gasoline.php";

error_reporting(E_ERROR | E_PARSE);

if (!isset($_REQUEST['fecha']) && !isset($_REQUEST['placa'])) {
    $cal  = new Matriculas();
    $show = $cal->today();

    echo json_encode($show, JSON_FORCE_OBJECT, JSON_UNESCAPED_UNICODE);

}
