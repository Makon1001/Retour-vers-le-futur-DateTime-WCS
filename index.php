<?php
include 'vendor/autoload.php';
use app\Time\TimeTravel;


/*Initialisation de la date start*/
$time = new TimeTravel();
$time -> setStart('1985-12-31');
echo 'Date de départ : ' . date_format($time->getStart(), 'Y-m-d H:i:s');
echo '<br>';


/*Trouver la date 1000000000s dans le passé*/
$interval = 1000000000;

$time -> findDate('PT' .$interval .'S');
echo 'Date de fin du voyage dans le temps : ' . date_format($time->getEnd(), 'Y-m-d H:i:s' );
echo '<br>';

/*Travel Info */
echo $time -> getTravelInfo();

$period = $time -> backToFutureStepByStep(new DateInterval('P1M8D'));

foreach ($period as $date){
    echo '<br>';
    echo $date;
}
