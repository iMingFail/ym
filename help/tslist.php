<?
include("../config/conn.php");
include("../config/function.php");
$getstr=$_GET[str];
$m=returnsx("m");
switch($m){
 case 1: $nurl=weburl."task/view".returnsx("i").".html";$nstr="您好，您的投标信息已经发送，耐心等待雇主选标";break;
 case 2: $nurl=weburl."task/view".returnsx("i").".html";$nstr="您好，你已接单成功，完成任务后，请一定及时提交验收";break;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="refresh" content="10;url=<?=$nurl?>">  
<title>操作提示 - <?=webname?></title>


<link href="static/css/basic.css" rel="stylesheet" type="text/css" />
<link href="static/css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<div class="bfb bfbtop fontyh">
<div class="yjcode">

<? include("../tem/top.html");?>

 </div> 
</div>
</div>
<span id="webhttp" style="display:none"><?=weburl?></span>
<script language="javascript">
userCheckses();
</script>
<div class="yjcode"></div>
<? include("../tem/top1.html");?>
   </div>
      </div>
	     </div>
		    </div>

<div class="yjcode">
 <div class="succap">提示</div>
 <div class="sucmain">
  <strong><?=$nstr?></strong><br>
  <a href="<?=$nurl?>">5秒后系统会自动跳转，也可点击此处直接跳转</a>
 </div>
</div>

<? include("../tem/bottom.html");?>
</body>
</html>