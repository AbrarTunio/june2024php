<?php 

class Student
{
    public $name = "Abrar Hussain";

    public function greet(  ){
        echo "Welcome Mr./Ms.". $this->name;
    }

}

$newStudent =  new Student();
// $newStudent->name = "Abrar Hussain";
// echo $newStudent->name;
$newStudent->greet();


$newStudent->name = "Israr";
$newStudent->greet();
