<?php

class Pair{
    private $idOne;
    private $idTwo;
    private $period;

    /**
     * Pair constructor.
     * @param $idOne
     * @param $idTwo
     * @param $period
     */
    public function __construct($idOne, $idTwo, $period)
    {
        $this->idOne = $idOne;
        $this->idTwo = $idTwo;
        $this->period = $period;
    }

    /**
     * @return mixed
     */
    public function getIdOne()
    {
        return $this->idOne;
    }

    /**
     * @param mixed $idOne
     */
    public function setIdOne($idOne)
    {
        $this->idOne = $idOne;
    }

    /**
     * @return mixed
     */
    public function getIdTwo()
    {
        return $this->idTwo;
    }

    /**
     * @param mixed $idTwo
     */
    public function setIdTwo($idTwo)
    {
        $this->idTwo = $idTwo;
    }

    /**
     * @return mixed
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param mixed $period
     */
    public function setPeriod($period)
    {
        $this->period = $period;
    }

}