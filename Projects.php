<?php


class Projects implements ProjectsInterface {
    /**
     * @var Employee[] $employees
     */
    private $projects;
    /**
     * @var Pair[] $totalPairs
     */
    private $totalPairs;
    function __construct()
    {
        $this->projects=array();
        $this->totalPairs=array();
    }
    public function getTotalPairs(){
        return $this->totalPairs;
    }
    public function getAllProjects(){
        return $this->projects;
    }
    public function addProject(ProjectInteface $project){
        $this->checkIfProjectExists($project);
        $this->projects[]=$project;
    }
    private function checkIfProjectExists(ProjectInteface $project){
        if (in_array($project,$this->projects)){
            return true;
        }
        return false;
    }
    //check if there is a project, if not create one and add employee to it, else just add the employee in it
    public function addToProject(Employee $employee)
    {
        if (!array_key_exists($employee->getProject(),$this->projects)){
            $this->projects[$employee->getProject()]= new Project();
        }
        $this->projects[$employee->getProject()]->setEmployees($employee);
    }
    public function getAllPairs(){
        foreach($this->getAllProjects() as $proj){
            //create the pairs inside each project
            $proj->generatePairs();
        };
        //get all pairs from each project together
        foreach ($this->getAllProjects() as $project){
            foreach ($project->getPairs() as $pair){
                if (!$this->checkIfPairExists($pair)){
                    $this->totalPairs[]=$pair;
                }
            }
        }
    }
    private function checkIfPairExists($pair)
    {
        foreach ($this->totalPairs as $p){
            if ($p->getIdOne() == $pair->getIdOne() && $p->getIdTwo() == $pair->getIdTwo()){
                $p->setPeriod($p->getPeriod() + $pair->getPeriod());
                return true;
            }
        }
        return false;
    }
    public function sortPairs(){
        $array = $this->getTotalPairs();
        usort($array,function (Pair $a, Pair $b){return $b->getPeriod()-$a->getPeriod();});
        $this->totalPairs = $array;

    }
    public function __toString()
    {
       $this->getAllPairs();
       $this->sortPairs();
       $winnerPair = $this->getTotalPairs()[0];
       $winnerPairDays = floor($this->getTotalPairs()[0]->getPeriod()/60/60/24);
       return 'Employee with id:'.$winnerPair->getIdOne()." and Employee with id:".$winnerPair->getIdTwo()." worked together ".$winnerPairDays." days";
    }
}