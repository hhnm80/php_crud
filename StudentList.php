<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生列表</title>
</head>
<body>
<h3>学生列表</h3>
<?php
    require("StudentDao.php");


    @$retval = $_GET['retval'];
    if ($retval) {
//        至于为什么这样写,也许这是一种规定,因为
        echo "<script type='text/javascript'>alert('记录删除成功！');</script>";
    }

//    执行删除操作以后,,,,然后我们查找数据库里面,看看还有多少条数据,如果数据条数不为0,我们需要输出一个table控件么????
    $students = findAllStudents();
    if (count($students) > 0) {
//        这是html写法,,,,
        echo
        "<table border='1' cellpadding='5' cellspacing='0'>
        <tr>
        <td>学号</td>
        <td>姓名</td>
        <td>性别</td>
        <td>年龄</td>
        <td>电话号码</td>
        <td>操作</td>
        <td>操作</td>
        </tr>";

        foreach ($students as $student) {
            $id = $student->getId();
            $name = $student->getName();
            $gender = $student->getGender();
            $age = $student->getAge();
            $telephone = $student->getTelephone();
            echo "<tr>
                  <td>$id</td>
                  <td>$name</td>
                  <td>$gender</td>
                  <td>$age</td>
                  <td>$telephone</td>
                  <td><a href='#'>编辑</a></td>
                  <td>
                  <a href='DeleteStudentById.php?id=$id' onclick='return deleteStudent();'>删除</a>
                  </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "学生表里没有记录！";
    }
?>
<script type="text/javascript">
    function deleteStudent() {
        var choice = confirm("你是否要删除该记录？");
        return choice;
    }
</script>
</body>
</html>
