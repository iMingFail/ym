<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$bh=$_GET[bh];
$hfid=$_GET[hfid];
$sj=date("Y-m-d H:i:s");
$useridhf=returnuserid($_SESSION[SHOPUSER]);

$sqltaskhf="select * from yjcode_taskhf where bh='".$bh."' and useridhf=".$useridhf." and taskty=1 and zt=0 and id=".$hfid."";mysql_query("SET NAMES 'GBK'");$restaskhf=mysql_query($sqltaskhf);
if(!$rowtaskhf=mysql_fetch_array($restaskhf)){php_toheader("taskhflist1.php");}

$sqltask="select * from yjcode_task where bh='".$bh."' and taskty=1";mysql_query("SET NAMES 'GBK'");$restask=mysql_query($sqltask);
if(!$rowtask=mysql_fetch_array($restask)){php_toheader("taskhflist1.php");}

if($_GET[control]=="ys"){
 $oksj=date("Y-m-d H:i:s",strtotime("+".$rowcontrol[taskoksj]." day"));
 updatetable("yjcode_taskhf","ystxt='".sqlzhuru($_POST[content])."',oksj='".$oksj."',zt=1 where id=".$hfid);
 $sj=date("Y-m-d H:i:s");
 $txt="已经完成任务，发起验收申请，雇主需要在".$oksj."前进行验收，否则系统自动处理成交易成功";
 intotable("yjcode_tasklog","bh,userid,useridhf,admin,txt,sj,fj","'".$bh."',".$rowtask[userid].",".$useridhf.",2,'".$txt."','".$sj."',''");
 php_toheader("taskhflist1.php");
 
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="static/css/basic.css" rel="stylesheet" type="text/css" />
<link href="static/css/index.css" rel="stylesheet" type="text/css" />
<link href="css/task.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script type="text/javascript" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
function tj(){
if(!confirm("确定提交该操作吗？")){return false;}
layer.msg('正在处理', {icon: 16  ,time: 0,shade :0.25});
f1.action="taskysjs1.php?bh=<?=$bh?>&hfid=<?=$hfid?>&control=ys";
}
</script>
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
<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 任务大厅 > 多人任务 > 请求验收</li>
</ul>
<? $leftid=7;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("rcap9.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="g_ac0_h g_bc0_h";
 </script>

 <? include("taskv1.php");?>
 
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l7">验收说明：</li>
 <li class="l8"><script id="editor" name="content" type="text/plain" style="width:790px;height:380px;"></script></li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("请求验收","taskhflist1.php")?></li>
 </ul>
 </form>

 
</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
<script type="text/javascript">
//实例化编辑器
var ue= UE.getEditor('editor'
, {
            toolbars:[
            ['fullscreen', 'source', '|', 'undo', 'redo', '|',
                'removeformat', 'formatmatch' ,'|', 'forecolor',
                 'fontsize', '|',
                'link', 'unlink',
                'insertimage', 'emotion', 'attachment']
        ]
        });
</script>
</body>
</html>