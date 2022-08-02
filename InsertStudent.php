<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加学生记录</title>
</head>
<body>
<h3>添加学生记录</h3>
<!--一个表单组件里面包含5个输入框,就是input,,,,-->
<form action="doInsertStudent.php" method="post">
<!--    注意每安排一个输入框以后我们就要换行,因为这里没有设置css样式,所以每个输入框换行后都是左对齐,,,-->
    学号：<input type="number" name="id"><br>
姓名：<input type="text" name="name"><br>
性别：<input type="text" name="gender"><br>
年龄：<input type="number" name="age"><br>
电话：<input type="tel" name="telephone"><br>
    <input type="submit" value="确定">
    <input type="reset" value="重置">
</form>
</body>
</html>