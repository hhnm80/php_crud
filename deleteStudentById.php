<?php

require("StudentDao.php");

//为什么这里可以get呢???难道我们在哪里提交处理了么,我们必须要找那种带有表单控件的php文件,但是我并没有找到提交到这个php文件里面的表单或者按钮什么的,但是经过我的仔细观察,我发现在index.html页面上面,,,,,的确有一个元素(还不能叫做按钮,是删除作用的,点击这个元素(删除),会提交到deleteStudentById.php这个页面来处理,,,,,
$id = $_GET['id'];
$retval = deleteStudentById($id);
//$location是一個地址,這個地址会根据$retval的值来变动
$location = "StudentList.php?retval=$retval";
header("location:$location");
