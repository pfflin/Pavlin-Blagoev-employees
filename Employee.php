<?php


class Employee{
    private $employee;
    private $project;
    private $dateFrom;
    private $dateTo;


    /**
     * Employee constructor.
     * @param $employee
     * @param $projects
     * @param $dateFrom
     * @param $dateTo
     */
    public function __construct($employee, $project, $dateFrom, $dateTo)
    {
        $this->setEmployee($employee);
        $this->setProject($project);
        $this->setDateFrom($dateFrom);
        $this->setDateTo($dateTo);
    }
    /**
     * @return mixed
     */
    public function getEmployee()
    {
        return $this->employee;
    }

    /**
     * @param mixed $employee
     */
    public function setEmployee($employee)
    {
        $this->employee = trim($employee);
    }

    /**
     * @return mixed
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param mixed $project
     */
    public function setProject($project)
    {
        $this->project = trim($project);
    }

    /**
     * @return mixed
     */
    public function getDateFrom()
    {
        return $this->dateFrom;
    }

    /**
     * @param mixed $dateFrom
     */
    public function setDateFrom($dateFrom)
    {
        $date = new DateTime($dateFrom);
        $this->dateFrom = $date->getTimestamp();
    }

    /**
     * @return mixed
     */
    public function getDateTo()
    {
        return $this->dateTo;
    }

    /**
     * @param mixed $dateTo
     */
    public function setDateTo($dateTo)
    {
        if (trim($dateTo) == "NULL"){
            $dateTo = 'now';
        }
        $date = new DateTime($dateTo);
        $this->dateTo =$date->getTimestamp();
    }
}