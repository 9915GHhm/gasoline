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
    private $days    = ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'];

    public function __construct()
    {

        $t        = time(); // El contructor inicializa la fecha del momento actual.
        $this->da = date('d/m/Y', $t);

    }

    public function today($end = null)
    {

        if (!is_null($end)) {
            // Sí el parámetro "$end" no viene nula, este se le asigna a la variable "$this->dEnd"...

            //check($end);
            if (self::check($end) == true) {
                $this->dEnd = $end;
            } else {
                return false;
            }
            //$this->dEnd = (check($end)) ? $end : false;

        } else {
            // ...en caso contrario a "$this->dEnd" se le asigna el parámetro que viene del constructor en "$this->da".

            $this->dEnd = $this->da;

        }

        $ce = preg_split($this->pattern, $this->dEnd); // Este algorítmo es para seleccionar que posición le corresponde el arreglo "$placas"
        $en = $ce[2] . "/" . $ce[1] . "/" . $ce[0]; // para hacerlo corresponder a que fecha le corresponde dichas placas por medio del
        // resultado de la variable "$N".
        $cs  = preg_split($this->pattern, $this->dStar);
        $ini = $cs[2] . "/" . $cs[1] . "/" . $cs[0];

        $dS   = date_create($ini);
        $dE   = date_create($en);
        $diff = date_diff($dS, $dE);
        $U    = $diff->format("%R%a") % 5;
        $N    = ($U < 0) ? $U + 5 : $U;

        $num    = $this->days[date('N', strtotime($en))]; // Esto es para es para unbicar el día de la semana en el arreglo "$days", reflejandose este
        $seeDay = ($num !== null) ? $num : "domingo"; // en la variable "$seeDay".

        if (is_null($end)) {$this->know = $N;} // "$this->know" to el valor de "$N" para ser utilizado en la función "placas()".

        return [$seeDay, $this->dEnd, $this->Placas[$N]]; // ...o como aparece debajo:
        // return array($seeDay, $this->dEnd, $this->Placas[$N]);

        /*echo $seeDay;
        echo $this->dEnd;
        echo $this->Placas[$N];*/

        //return '<h3>Para el <b class="clo">' . $seeDay . ' ' . $this->dEnd . '</b> le corresponden<br> a las placas que terminan en: <b class="clo"><span class="parpadea text">' . $this->Placas[$N] . '</b></h3>';

    }

    public function check($checkDate)
    {

        $che   = preg_split($this->pattern, $checkDate);
        $check = (checkdate($che[1], $che[0], $che[2])) ? true : false;
        return $check;

    }

    public function checkPlac($num)
    {

        $checkPlac = (strlen($num) < 2) ? true : false;
        return $checkPlac;
    }

    public function placas($plas)
    {
        if (self::checkPlac($plas) == false) {
            return false;
        }
        // En esta función "placa" está el algorítmo se selecciona la placa

        self::today(); // Este código nos trae la varibale "$this->know" de la función "today()".

        if ($plas == 1 || $plas == 2) {
            // Este código le asigna un número a las placas que vienen en parámetro "$plas" en la variable "$placs".
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
            // El el "switch" se asigna la fecha según el número que viene en "$this->know y $placs"...
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
