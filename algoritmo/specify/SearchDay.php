<?php
require_once 'Gasoline.php';
date_default_timezone_set('America/Caracas');
error_reporting(E_ERROR | E_PARSE);

class SearchDay extends Matriculas
{

    private $dEnd;
    private $dStar   = '06/03/2021';
    private $pattern = "/([-|\/|.])/";
    private $Placas  = ['5 y 6', '7 y 8', '9 y 0', '1 y 2', '3 y 4'];
    private $days    = ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'];

    public function __construct($end)
    {

        $this->dEnd = $end;

    }

    protected function searchDay()
    {

        $ce = preg_split($this->pattern, $this->dEnd);
        $en = $ce[2] . "/" . $ce[1] . "/" . $ce[0];

        $cs  = preg_split($this->pattern, $this->dStar);
        $ini = $cs[2] . "/" . $cs[1] . "/" . $cs[0];

        $fef = strtotime($en) - $fei = strtotime($ini);
        $U   = intval($fef / 60 / 60 / 24, $fei / 60 / 60 / 24) % 5; // Cálcula el intervalo
        $N   = ($U < 0) ? $U + 5 : $U;

        $date = $ce[0] . "/" . $ce[1] . "/" . $ce[2]; // Este es el formato definitivo de la fecha a mostrarse.

        $num    = $this->days[date('N', strtotime($en))];
        $seeDay = ($num !== null) ? $num : "domingo";

        if (is_null($end)) {$this->know = $N;}

        return [$seeDay, $date, $this->Placas[$N], $this->know];
    }
}
