<?php


namespace app\Time;


class TimeTravel
{
    /**
     *
     */
    public $start ;
    public $end;


    public function getTravelInfo()
    {
        $diff = $this->start->diff($this->end);
        return $diff ->format('Il y a %Y années, %m mois, %d jours, %h heures, %i minutes et %s secondes entre les deux dates');
    }

    /**
     * @param mixed $end
     */
    public function setEnd($end): void
    {
        $this->end = new \DateTime($end);
    }

    /**
     * @param mixed $start
     */
    public function setStart($start): void
    {
        $this->start = new \DateTimeImmutable($start);
    }

    /**
     * @return mixed
     */
    public function getStart()
    {
        return $this->start;
    }


    /**
     * @return mixed
     */
    public function getEnd()
    {
        return $this->end;
    }

    public function findDate($interval)
    {
        $findDate = $this->start->sub(new \DateInterval($interval));
        $this->setEnd(date_format($findDate, 'Y-m-d H:i:s'));
    }

    public function backToFutureStepByStep($step)
    {
        $period = new \DatePeriod($this->end, $step, $this->start);
        foreach ($period as $dt) {
            $arrayDate[] = date_format($dt, 'M j Y  a G:i' );
        }
        return $arrayDate;
    }
}