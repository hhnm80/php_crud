<?php
// 包含文件Student.php
require("Student.php");

// 创建学生对象
$student = new Student();

// 设置学生对象属性
$student->setId(1);
$student->setName("张小强");
$student->setGender("男");
$student->setAge(18);
$student->setTelephone("15890904567");

// 输出学生对象
echo $student;
?>