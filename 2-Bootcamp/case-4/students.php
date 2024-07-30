<?php 
class Student {
    private $name;
    private $grade;

    public function __construct($name, $grade) {
        $this->name = $name;
        $this->grade = $grade;
    }

    public function getName() {
        return $this->name;
    }

    public function getGrade() {
        return $this->grade;
    }

    public function setGrade($grade) {
        $this->grade = $grade;
    }
    
}
?>
