<?php
include("dbc.php");

	$game_name=$_POST['game_name'];
	$competition_name=$_POST['competition_name'];
	$competition_time=$_POST['competition_time'];
	$information=$_POST['information'];

	$rs = $db->query("select game_id from game where game_name = '$game_name'");
	$row = $rs->fetch();
	$game_id = $row[0];
	if ($game_id && $competition_name && $competition_time && $information){
	
		$sql="SELECT * FROM competition WHERE game_id = '$game_id' and competition_name = '$competition_name'";
		$rs = $db->query($sql);
		$rows = $rs->fetch();

			if($rows){
						echo "	<!DOCTYPE html>
							  	<html>
								<head>
								<meta charset='utf-8'>
								<title>赛事信息添加</title>
								</head><script language='javascript'>alert('该赛事已存在');history.back();</script>
								</html>";
						exit;
					 }
		$sql="insert into competition(game_id,competition_name,competition_time,information) values('$game_id','$competition_name','$competition_time','$information')"; 
		$res = $db->exec($sql);
			if($res == 1){


?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
	<link rel="shortcut icon" type="image/png" href="http://www.dianjoy.com/wp-content/themes/dian2013/img/logo.png">


    <title>赛事信息添加</title>

    <link href="/jc_admin/css/bootstrap.min.css" rel="stylesheet">

    <link href="/jc_admin/css/alert.css" rel="stylesheet">

  </head>

  <body>
	<div class="container" style="width:600px">
		<?php
				header("refresh:2;url=/jc_admin/insert/competition_insert.html");
				echo "<div class='alert alert-success'>添加成功！2秒后自动返回</div>";

			}else{
				header("refresh:2;url=/jc_admin/insert/competition_insert.html");
				echo "<div class='alert alert-danger'>添加失败...2秒后自动返回</div>";

			}
			}
			else 
			{
				echo "			<!DOCTYPE html>
							  	<html>
								<head>
								<meta charset='utf-8'>
								<title>赛事信息添加</title>
								</head><script language='javascript'>alert('信息不完整');history.back();</script>
								</html>";
			}
		?>
    </div>
  </body>
</html>
