<?php


interface ProjectsInterface
{
    public function getTotalPairs();
    public function getAllProjects();
    public function addProject(ProjectInteface $project);
    public function addToProject(Employee $employee);
    public function getAllPairs();
    public function sortPairs();
    public function __toString();
}