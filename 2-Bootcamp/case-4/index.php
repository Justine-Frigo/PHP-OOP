<?php
require_once 'students.php';
require_once 'group.php';

$studentsGroup1 = [
    new Student('Adrien', 85),
    new Student('Arnaud', 92),
    new Student('Caroline', 78),
    new Student('Justine', 95),
    new Student('Dylan', 88),
    new Student('Dzheylyan', 65),
    new Student('Giovanni', 79),
    new Student('Iliess', 91),
    new Student('Julie', 72),
    new Student('Stacy', 81),
];

$studentsGroup2 = [
    new Student('Ludovic', 60),
    new Student('Lyne', 87),
    new Student('Jordan', 66),
    new Student('Manu', 55),
    new Student('Nataliia', 78),
    new Student('Youris', 85),
    new Student('Zahra', 59),
    new Student('Maryam', 95),
    new Student('Isabelle', 70),
    new Student('Nath', 77),
];

$group1 = new Group();
$group2 = new Group();

foreach ($studentsGroup1 as $student) {
    $group1->addStudent($student);
}

foreach ($studentsGroup2 as $student) {
    $group2->addStudent($student);
}

function moveStudent($student, $fromGroup, $toGroup)
{
    $removedStudent = $fromGroup->removeStudent($student);
    if ($removedStudent) {
        $toGroup->addStudent($removedStudent);
    }
}
echo "Moyenne du groupe 1: " . $group1->getAverageGrade() . "<br>";
echo "Moyenne du groupe 2: " . $group2->getAverageGrade() . "<br>";


$topStudentGroup1 = $group1->getTopStudent();
$lowestStudentGroup2 = $group2->getLowestStudent();

moveStudent($topStudentGroup1, $group1, $group2);
moveStudent($lowestStudentGroup2, $group2, $group1);

echo "Moyenne du groupe 1 après déplacement: " . $group1->getAverageGrade() . "<br>";
echo "Moyenne du groupe 2 après déplacement: " . $group2->getAverageGrade() . "<br>";
