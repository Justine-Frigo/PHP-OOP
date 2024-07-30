<?php 
class Group {
    private $students = [];

    public function addStudent(Student $student) {
        $this->students[] = $student;
    }

    public function removeStudent(Student $student) {
        foreach ($this->students as $key => $s) {
            if ($s->getName() == $student->getName()) {
                unset($this->students[$key]);
                $this->students = array_values($this->students);
                return $student;
            }
        }
        return null;
    }

    public function getAverageGrade() {
        $total = 0;
        foreach ($this->students as $student) {
            $total += $student->getGrade();
        }
        return count($this->students) > 0 ? $total / count($this->students) : 0;
    }

    public function getTopStudent() {
        if (count($this->students) === 0) return null;

        $topStudent = $this->students[0];
        foreach ($this->students as $student) {
            if ($student->getGrade() > $topStudent->getGrade()) {
                $topStudent = $student;
            }
        }
        return $topStudent;
    }

    public function getLowestStudent() {
        if (count($this->students) === 0) return null;

        $lowestStudent = $this->students[0];
        foreach ($this->students as $student) {
            if ($student->getGrade() < $lowestStudent->getGrade()) {
                $lowestStudent = $student;
            }
        }
        return $lowestStudent;
    }
}
?>
