<?php
function getConn() {
    $host = "localhost";
    $user = "root";
    $password = "136970";
    $database = "student";

//    打开一个到 MySQL 服务器的新的连接： 但是我的电脑上面安装的是mariadb,所以我们要是用连接到mariadb的函数,,,,,,,到底mysqli_connect函数可不可以连接mariadb呢???我们亲自尝试一番就知道了,,,,,
    $conn = mysqli_connect($host, $user, $password, $database);

    if ($conn->error) {
//        输出一条消息，并退出当前脚本：原来数据库连接失败是这么处理的,可惜啊,php文件不能单独运行,不然我们就可以在这里执行这个脚本文件了......
        die("连接数据库[$database]失败！");
    }
    return $conn;
}
?>

<!--那么php到底是弱类型还是强类型语言呢???????通过php语言的写法,很像python的写法,,,,,比如我们在这个文件里面,只写了一个函数,但是php的语法很奇怪,就是函数要放在<?php?>里面   -->