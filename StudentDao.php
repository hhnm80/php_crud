<?php

//我们学习python的时候就知道,一个py文件,,,里面可以写有函数,使用另一个文件里面的函数,我们需要先引入这个文件,,,,
//PHP 系统在加载PHP程序时有一个伪编译过程，可使程序运行速度加快。但 incluce 的文档仍为解释执行。include 的文件中出错了，主程序继续往下执行，require 的文件出错了，主程序也停了，所以包含的文件出错对系统影响不大的话（如界面文件）就用 include，否则用 require。
require("Student.php");
require("DataSource.php");

/**
 * 查询全部学生
 *
 * @return array
 */

//函数
function findAllStudents()
{
    // 获得数据库连接 局部变量,看来弱类型语言在这里不用定义变量类型,,,,
    $conn = getConn();
    // 定义SQL字符串
    $sql = "SELECT * FROM student";
    // 执行查询，返回结果集 query就是查询函数，本质上php与其它语言并没有什么不同，主要的不同点在于：php的变量需要加上符号$  SELECT * FROM student这个语句,是不加条件的查询,,,,查出来的是多条数据,将数据库理解为行列式,,,,,每一行就是一个数据单元,每一列就是这个数据单元所包含的属性,比如一个学生表,,,,,每一行都是一个学生的数据.每一列可以是学生的属性,比如姓名,性别,年龄,学号等
    $result = $conn->query($sql);
    // 定义学生数组
//定义学生数组,原来是这么定义的,,,,,,students这个数组,里面存储的元素是学生类的对象,,,,,那么为什么要弄出这么多学生类的对象呢??????难道把每一行查出的数据都当做一行来处理么?????给每一个对象赋值,果然是这样,,,,,
    $students = array();
    // 定义数组下标
    $i = 0;
    // 遍历结果集  不管循环执行多少次,,,,循环执行的次数就是查出来的数据条数,,,,
    while ($row = $result->fetch_assoc()) {
        $students[$i] = new Student();
//        给
        $students[$i]->setId($row['id']);
        $students[$i]->setName($row['name']);
        $students[$i]->setGender($row['gender']);
        $students[$i]->setAge($row['age']);
        $students[$i]->setTelephone($row['telephone']);
        $i++;
    }
    return $students;
}

/**
 * 按学号查询学生
 *
 * @param $id
 * @return null|Student
 */
function findStudentById($id)
{
    // 获得数据库连接
    $conn = getConn();
    // 定义SQL字符串 注意参数化查询,查出的结果是根据findStudentById这个函数的形参来决定,,,,所以注意这里数据库字符串的拼接,
    $sql = "SELECT * FROM student WHERE id = $id";
    // 执行查询，返回结果集
    $result = $conn->query($sql);
    // 判断是否有查询记录 如果有查询记录,就是查询到的行数>0,,,,但是这里有个问题,id是唯一的么?????如果id是唯一的,那么查询到的数据肯定只有一条,如果id这个属性值可以重复,这样查询到的数据可能不止一条,,,,
    if ($result->num_rows > 0) {
        // 将查询结果放进关联数组 把查询结果利用成员函数赋值给成员变量,这样就实现了把数据库里面的,,,,
        $row = $result->fetch_assoc();
        // 创建学生对象
        $student = new Student();
        // 设置学生对象属性 对象调用成员函数,,,,,给成员变量赋值,成员函数的作用就是访问成员变量,对成员变量进行控制,,,,,显然,这里认为id唯一,只查到了一条数据
        $student->setId($row['id']);
        $student->setName($row['name']);
        $student->setGender($row['gender']);
        $student->setAge($row['age']);
        $student->setTelephone($row['telephone']);
    } else {
        $student = null;
    }
    // 返回学生对象
    return $student;
}

/**
 * 添加学生记录
 * @param $student
 * @return bool|mysqli_result
 */
function insertStudent($student)
{
//    传入一个对象,先利用成员函数取出对象里面元素的值,,,,然后赋值给变量,,,,
    $id = $student->getId();
    $name = $student->getName();
    $gender = $student->getGender();
    $age = $student->getAge();
    $telephone = $student->getTelephone();

    // 获得数据库连接
    $conn = getConn();
    // 定义SQL字符串 这是关键的字符串语句
    $sql = "INSERT INTO student VALUES ('$id', '$name', '$gender', '$age', '$telephone')";
    // 执行插入操作
    $retval = $conn->query($sql);

    return $retval;
}

/**
 * 按学号删除学生
 *
 * @param $id
 */
function deleteStudentById($id)
{
    // 获得数据库连接 局部变量
    $conn = getConn();
    // 定义SQL字符串
    $sql = "DELETE FROM student WHERE id = $id";
    // 执行删除操作
    $retval = $conn->query($sql);

    return $retval;
}
?>