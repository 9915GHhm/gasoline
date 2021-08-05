<?php
date_default_timezone_set("America/Caracas");
error_reporting(E_ERROR | E_PARSE);

class Matriculas
{
    private $da;
    private $dEnd;
    private $dStar = '06/03/2021';
    private $know;
    private $pattern = "/([-|\/|.])/";
    private $Placas  = ['5 y 6', '7 y 8', '9 y 0', '1 y 2', '3 y 4'];

    public function __construct()
    {

        $t        = time();
        $this->da = date('d/m/Y', $t);

    }

    public function today($end = null)
    {

        if (!is_null($end)) {

            if (self::check($end) == true) {
                $this->dEnd = $end;
            } else {
                return false;
            }

        } else {

            $this->dEnd = $this->da;

        }

        $ce  = preg_split($this->pattern, $this->dEnd);
        $en  = $ce[2] . "/" . $ce[1] . "/" . $ce[0]; // para hacerlo corresponder a que fecha le corresponde dichas placas por medio del resultado de la variable "$N".
        $cs  = preg_split($this->pattern, $this->dStar);
        $ini = $cs[2] . "/" . $cs[1] . "/" . $cs[0];

        $fef = strtotime($en) - $fei = strtotime($ini);
        $U   = intval($fef / 60 / 60 / 24, $fei / 60 / 60 / 24) % 5; // Cálcula el intervalo
        $N   = ($U < 0) ? $U + 5 : $U;

        $dateTime = strtotime($en);
        $day      = date("d/m/Y l", $dateTime); // Para obtener el nombre del día de la semana.
        $nameDay  = substr($day, 11);

        if ($nameDay == 'Sunday') {
            $seeDay = 'domingo';
        } elseif ($nameDay == 'Monday') {
            $seeDay = 'lunes';
        } elseif ($nameDay == 'Tuesday') {
            $seeDay = 'martes';
        } elseif ($nameDay == 'Wednesday') {
            $seeDay = 'miércoles';
        } elseif ($nameDay == 'Thursday') {
            $seeDay = 'jueves';
        } elseif ($nameDay == 'Friday') {
            $seeDay = 'viernes';
        } elseif ($nameDay == 'Saturday') {
            $seeDay = 'sábado';
        } else {
            $seeDay = 'Error!!!';
        }

        if (is_null($end)) {$this->know = $N;} // "$this->know" to el valor de "$N" para ser utilizado en la función "placas()".
        return [$seeDay, $this->dEnd, $this->Placas[$N]];

    }

    public function check($checkDate)
    {

        $che   = preg_split($this->pattern, $checkDate);
        $check = (checkdate($che[1], $che[0], $che[2])) ? true : false;
        return $check;

    }

    public function checkPlac($num)
    {
        if (!is_numeric($num)) {
            $checkPlac = false;
        } else {
            $checkPlac = (strlen($num) < 2) ? true : false;
        }
        return $checkPlac;
    }

    public function placas($plas)
    {
        if (self::checkPlac($plas) == false) {
            return false;
        }

        self::today(); // Este código nos trae la varibale "$this->know" de la función "today()".

        if ($plas == 1 || $plas == 2) {
            $placs = 3;
        } elseif ($plas == 3 || $plas == 4) {
            $placs = 4;
        } elseif ($plas == 5 || $plas == 6) {
            $placs = 5;
        } elseif ($plas == 7 || $plas == 8) {
            $placs = 1;
        } else {
            $placs = 2;
        }

        $dateMo   = date("Y/m/d", $this->da); // Este código zetea la fecha que viene en la variable "$this->da" de la función "today()" para
        $dateModf = date_create($this->dateMo); // que esta sea creada y pueda utilizarse en el "switch".

        switch ($placs) {

            case ($this->know == 1 && $placs == 1):
                $date = $this->da;
                break;

            case ($this->know == 1 && $placs == 2):
                $dateM = date_modify($dateModf, "+1 days");
                $date  = date_format($dateM, "d/m/Y");
                break;

            case ($this->know == 1 && $placs == 3):
                $dateM = date_modify($dateModf, "+2 days");
                $date  = date_format($dateM, "d/m/Y");
                break;

            case ($this->know == 1 && $placs == 4):
                $dateM = date_modify($dateModf, "+3 days");
                $date  = date_format($dateM, "d/m/Y");
                break;

            case ($this->know == 1 && $placs == 5):
                $dateM = date_modify($dateModf, "+4 days");
                $date  = date_format($dateM, "d/m/Y");
                break;

            case ($this->know == 2 && $placs == 2):
                $date = $this->da;
                break;

            case ($this->know == 2 && $placs == 3):
                $dateM = date_modify($dateModf, "+1 days");
                $date  = date_format($dateM, "d/m/Y");
                break;

            case ($this->know == 2 && $placs == 4):
                $dateM = date_modify($dateModf, "+2 days");
                $date  = date_format($dateM, "d/m/Y");
                break;

            case ($this->know == 2 && $placs == 5):
                $dateM = date_modify($dateModf, "+3 days");
                $date  = date_format($dateM, "d/m/Y");
                break;

            case ($this->know == 2 && $placs == 1):
                $dateM = date_modify($dateModf, "+4 days");
                $date  = date_format($dateM, "d/m/Y");
                break;

            case ($this->know == 3 && $placs == 3):
                $date = $this->da;
                break;

            case ($this->know == 3 && $placs == 4):
                $dateM = date_modify($dateModf, "+1 days");
                $date  = date_format($dateM, "d/m/Y");
                break;

            case ($this->know == 3 && $placs == 5):
                $dateM = date_modify($dateModf, "+2 days");
                $date  = date_format($dateM, "d/m/Y");
                break;

            case ($this->know == 3 && $placs == 1):
                $dateM = date_modify($dateModf, "+3 days");
                $date  = date_format($dateM, "d/m/Y");
                break;

            case ($this->know == 3 && $placs == 2):
                $dateM = date_modify($dateModf, "+4 days");
                $date  = date_format($dateM, "d/m/Y");
                break;

            case ($this->know == 4 && $placs == 4):
                $date = $this->da;
                break;

            case ($this->know == 4 && $placs == 5):
                $dateM = date_modify($dateModf, "+1 days");
                $date  = date_format($dateM, "d/m/Y");
                break;

            case ($this->know == 4 && $placs == 1):
                $dateM = date_modify($dateModf, "+2 days");
                $date  = date_format($dateM, "d/m/Y");
                break;

            case ($this->know == 4 && $placs == 2):
                $dateM = date_modify($dateModf, "+3 days");
                $date  = date_format($dateM, "d/m/Y");
                break;

            case ($this->know == 4 && $placs == 3):
                $dateM = date_modify($dateModf, "+4 days");
                $date  = date_format($dateM, "d/m/Y");
                break;

            case ($this->know == 0 && $placs == 5):
                $date = $this->da;
                break;

            case ($this->know == 0 && $placs == 4):
                $dateM = date_modify($dateModf, "+4 days");
                $date  = date_format($dateM, "d/m/Y");
                break;

            case ($this->know == 0 && $placs == 3):
                $dateM = date_modify($dateModf, "+3 days");
                $date  = date_format($dateM, "d/m/Y");
                break;

            case ($this->know == 0 && $placs == 2):
                $dateM = date_modify($dateModf, "+2 days");
                $date  = date_format($dateM, "d/m/Y");
                break;

            case ($this->know == 0 && $placs == 1):
                $dateM = date_modify($dateModf, "+1 days");
                $date  = date_format($dateM, "d/m/Y");
                break;

            default:
                return 'Error!!!';
                break;
        }

        $result = $this->today($date);
        return $result; // ...y returna dicha fecha que se guarda en "$result" a la función "today()".
    }
}
