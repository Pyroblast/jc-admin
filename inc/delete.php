<?php
include("dbc.php");
?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
  <link rel="shortcut icon" type="image/png" href="http://www.dianjoy.com/wp-content/themes/dian2013/img/logo.png">


    <title>删除信息</title>

    <link href="/jc-admin/css/bootstrap.min.css" rel="stylesheet">

    <link href="/jc-admin/css/alert.css" rel="stylesheet">

  </head>


  <body>
	<div class="container" style="width:600px">

		<?php
    $table = $_GET['table'];
    $id = $_GET['id'];

		  switch ($table) {
        case 'competition':
        $sql = "delete from competition where competition_id = '$id'";
        $result=mysql_query($sql);
        header("refresh:2;url=/jc-admin/index.php");
        echo "<div class='alert alert-success'>删除成功！2秒后返回首页</div>";  
          break;

        case 'guess':
        $sql = "delete from guess where guess_id = '$id'";
        $result=mysql_query($sql);
        header("refresh:2;url=/jc-admin/index.php");
        echo "<div class='alert alert-success'>删除成功！2秒后返回首页</div>"; 
          break;

        case 'team':
        $sql = "delete from team where team_id = '$id'";
        $result=mysql_query($sql);
        header("refresh:2;url=/jc-admin/index.php");
        echo "<div class='alert alert-success'>删除成功！2秒后返回首页</div>"; 
          break;

        default:
        header("refresh:2;url=/jc-admin/index.php");
        echo "无";
          break;
      }

		?>


    </div>
  </body>
</html>