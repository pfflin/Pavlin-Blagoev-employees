<?php


interface ProjectInteface
{
    public function setPair(Employee $employee,Employee $otherEmployee,$interval);
    public function getPairs();
    public function checkIfPairExists(Employee $firstCollegue,Employee $secondCollegue,$interval);
    public function getEmployees();
    public function setEmployees(Employee $employee);
    public function generatePairs();
}