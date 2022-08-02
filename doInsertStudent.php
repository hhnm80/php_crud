<?php

require("StudentDao.php");
//难道
$id = $_POST['id'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$telephone = $_POST['telephone'];

$student = new Student();

$student->setId($id);
$student->setName($name);
$student->setGender($gender);
$student->setAge($age);
$student->setTelephone($telephone);

$retval = insertStudent($student);

if ($retval) {
    echo "记录插入成功！";
} else {
    echo "记录插入失败！";
}

