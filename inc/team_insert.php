<?php
include("dbc.php");

	$game_name=$_POST['game_name'];
	$team_name=$_POST['team_name'];
	$information=$_POST['information'];

	$game_id = mysql_query("select game_id from game where game_name = '$game_name'");
	$row = mysql_fetch_row($game_id);
	$game_id = $row[0];
	if ($game_id && $team_name && $information){
	
		$sql="SELECT * FROM team WHERE game_id = '$game_id' and team_name = '$team_name'";
		$res = mysql_query($sql);
		$rows=mysql_num_rows($res);

			if($rows){
						echo "	<!DOCTYPE html>
							  	<html>
								<head>
								<meta charset='utf-8'>
								<title>战队信息添加</title>
								</head><script language='javascript'>alert('该战队已存在');history.back();</script>
								</html>";
						exit;
					 }
		$sql="insert into team(game_id,team_name,information) values('$game_id','$team_name','$information')"; 
		$res = mysql_query($sql);
			if($res){


?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
	<link rel="shortcut icon" type="image/png" href="http://www.dianjoy.com/wp-content/themes/dian2013/img/logo.png">


    <title>战队信息添加</title>

    <link href="/jc-admin/css/bootstrap.min.css" rel="stylesheet">

    <link href="/jc-admin/css/alert.css" rel="stylesheet">

  </head>

  <body>
	<div class="container" style="width:600px">
		<?php
				header("refresh:2;url=/jc-admin/insert/team_insert.html");
				echo "<div class='alert alert-success'>添加成功！2秒后自动返回</div>";

			}else{
				header("refresh:2;url=/jc-admin/insert/team_insert.html");
				echo "<div class='alert alert-danger'>添加失败...2秒后自动返回</div>";

			}
			}
			else 
			{
				echo "			<!DOCTYPE html>
							  	<html>
								<head>
								<meta charset='utf-8'>
								<title>战队信息添加</title>
								</head><script language='javascript'>alert('信息不完整');history.back();</script>
								</html>";
			}
		?>
    </div>
  </body>
</html>