<?php

require("StudentDao.php");

//表示变量$id值通过POST方法取得传递过来的id值。&nbsp;PHP中取得传值的方法主要有：get,post,request，其中get表示取得显性传值，安全性要求不高时用，post表接收隐性传值，安全性要求高时用（如：接收表单传值、用户登录时等），request包含get和post两种方法，是一种模糊概念，由服务器自动选择，一般较少用。将取得的id值赋值给id变量,这里显然用的是POST方法,,,,,id来自哪里呢???? id来自于FindStudentById.php这个页面中表单中提交过来的值,,,,
$id = $_POST['id'];
//然后我们得到了id的值,我们就用这个值作为参数来查询,如果查到了东西(因为id是唯一的,,所以如果查到了东西,也只能是查到一条记录)
$student = findStudentById($id);
if ($student == null) {
    echo "你要查询的学生不存在！";
} else {
//    如果查到了东西,我们就输出这个变量....
    echo $student;
}
