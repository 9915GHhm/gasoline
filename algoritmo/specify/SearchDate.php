<?php
require_once 'Gasoline.php';
date_default_timezone_set('America/Caracas');
error_reporting(E_ERROR | E_PARSE);

class SearchDate extends Matriculas
{
    private $plas;
    private $know;

    public function __construct($plas, $know)
    {

        $this->plas = $plas;
        $this->know = $know;
    }

    protected function searchDate()
    {

        if ($this->plas == 1 || $this->plas == 2) {
            $placs = 3;
        } elseif ($this->plas == 3 || $this->plas == 4) {
            $placs = 4;
        } elseif ($this->plas == 5 || $this->plas == 6) {
            $placs = 5;
        } elseif ($this->plas == 7 || $this->plas == 8) {
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

        return $date; // ...y returna dicha fecha que se guarda en "$result" a la función "today()".
    }
}
