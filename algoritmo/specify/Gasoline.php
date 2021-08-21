<?php
require_once "SearchDay.php";
require_once "SearchDate.php";
date_default_timezone_set('America/Caracas');
error_reporting(E_ERROR | E_PARSE);

class Matriculas
{

    private $da;
    private $dEnd;
    private $know;
    private $pattern = "/^(0?[1-9]|[12]\d|3[01])[-|\/|.](0?[1-9]|1[0-2])[-|\/|.]([12]\d{3})$/";

    public function __construct()
    {

        $t        = time(); // El contructor inicializa la fecha del momento actual.
        $this->da = date('d/m/Y', $t);

    }

    public function today($end = null)
    {

        if (!is_null($end)) {

            if (self::check($end) === true) {
                $this->dEnd = $end;
            } else {
                return false;
            }

        } else {

            $this->dEnd = $this->da;

        }

        $day  = new SearchDay($this->dEnd);
        $days = $day->searchDay();

        $this->know = $days[3];

        return [$days[0], $days[1], $days[2]];
    }

    public function check($checkDate)
    {

        $check = (!preg_match($this->pattern, $checkDate)) ? false : true;
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

        self::today();

        $matricula = new SearchDate($plas, $this->know);
        $matri     = $matricula->SearchDate();

        $result = $this->today($matri);

        return $result;

    }
}
