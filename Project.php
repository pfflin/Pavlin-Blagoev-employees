<?php


class Project implements ProjectInteface {
    /**
     * @var Employee[] $employees
     */
    private $employees;
    /**
     * @var Pair[] $pairs
     */
    private $pairs;
    function __construct()
    {
        $this->employees=array();
        $this->pairs=array();
    }
    public function setPair(Employee $employee,Employee $otherEmployee,$interval){
     $this->pairs[$employee->getEmployee()."-".$otherEmployee->getEmployee()]= new Pair($employee->getEmployee(),$otherEmployee->getEmployee(),$interval);
    }
    public function getPairs(){
        return $this->pairs;
    }
    public function checkIfPairExists(Employee $firstCollegue,Employee $secondCollegue,$interval){
        $name = $firstCollegue->getEmployee()."-".$secondCollegue->getEmployee();
        if (array_key_exists($name,$this->pairs)){
            $this->pairs[$name]->setPeriod($this->pairs[$name]->getPeriod() + $interval);
            return true;
        }
        return false;
    }
    public function getEmployees()
    {
        return $this->employees;
    }
    public function setEmployees(Employee $employee)
    {
        $this->employees[] = $employee;
    }
    public function generatePairs(){
        foreach ($this->employees as $employee){
            foreach ($this->employees as $otherEmployee){
                if ($employee->getEmployee() != $otherEmployee->getEmployee()) {
                    $interval = min($employee->getDateTo(),$otherEmployee->getDateTo())-(max($employee->getDateFrom(),$otherEmployee->getDateFrom()));
                    if (!$this->checkIfPairExists($employee,$otherEmployee,$interval)){
                        $this->setPair($employee,$otherEmployee,$interval);
                    }
                }
            }
        }
    }
}