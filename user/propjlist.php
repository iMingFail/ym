<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="static/css/basic.css" rel="stylesheet" type="text/css" />
<link href="static/css/index.css" rel="stylesheet" type="text/css" />
<link href="css/product.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function ser(){
location.href="propjlist.php?&st1="+document.getElementById("st1").value+"&ifhf="+document.getElementById("sd1").value;
}
function hfonc(x){
layer.open({
  type: 2,
  shadeClose: true,
  area: ['622px', '215px'],
  title:["评价回复","text-align:left"],
  skin: 'layui-layer-rim', //加上边框
  content:['propjhf.php?id='+x, 'no'] 
});
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
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 商品评价管理</li>
</ul>
<? $leftid=1;include("left.php");?>

<!--RB-->
<div class="right">
 <ul class="wz">
 <li class="l0">请选择：</li>
 <li class="g_ac0_h g_bc0_h"><a href="propjlist.php">商品评价</a></li>
 </ul>

 <ul class="ksedi">
 <li class="l2">
 <a href="propjlist.php?ifhf=no" class="a1">查看所有未回复评价(共<?=returncount("yjcode_propj where selluserid=".$luserid." and (hf='' or hf is null)")?>个)</a>
 </li>
 <li class="l3">
  <input type="button" onclick="ser()" value="查询" class="btn" />
  <select id="sd1">
  <option value="">全部</option>
  <option value="no"<? if($_GET[ifhf]=="no"){?> selected="selected"<? }?>>未回复</option>
  <option value="yes"<? if($_GET[ifhf]=="yes"){?> selected="selected"<? }?>>已回复</option>
  </select>
  <span class="s1">回复情况：</span>
  <input type="text" id="st1" value="<?=$_GET[st1]?>" class="inp1" />
  <span class="s1">回复内容：</span>
 </li>
 </ul>
  
 <?
 $ses=" where selluserid=".$luserid;
 if($_GET[ifhf]=="no"){$ses=$ses." and (hf='' or hf is null)";}
 if($_GET[ifhf]=="yes"){$ses=$ses." and hf<>''";}
 if($_GET[st1]!=""){$ses=$ses." and txt like '%".$_GET[st1]."%'";}
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,10,"yjcode_propj","order by sj desc");while($row=mysql_fetch_array($res)){
 while1("*","yjcode_pro where bh='".$row[probh]."'");$row1=mysql_fetch_array($res1);
 ?>
 <ul class="propjlist">
 <li class="l1">商品信息：</li>
 <li class="l2"><strong><a href="../product/view<?=$row1[id]?>.html" target="_blank"><?=$row1[tit]?></a></strong></li>
 <li class="l1">评价会员：</li>
 <li class="l3"><?=returnnc($row[userid])?></li>
 <li class="l1">评价类型：</li>
 <li class="l3">好评</li>
 <li class="l1">评价时间：</li>
 <li class="l3"><?=$row[sj]?></li>
 <li class="l1">描述评分：</li>
 <li class="l3"><?=$row[pf1]?>分</li>
 <li class="l1">发货评分：</li>
 <li class="l3"><?=$row[pf2]?>分</li>
 <li class="l1">售后评分：</li>
 <li class="l3"><?=$row[pf3]?>分</li>
 </ul>
 <ul class="propjlist1">
 <li class="l1">评价内容：</li>
 <li class="l2">
 <?=$row[txt]?><br>
 <? 
 if(1==$row[iftp]){
 while2("*","yjcode_tp where bh='".$row[orderbh]."' order by xh asc");while($row2=mysql_fetch_array($res2)){$tp="../".str_replace(".","-1.",$row2[tp]);
 ?>
 <a href="../<?=$row2[tp]?>" target="_blank"><img src="<?=$tp?>" style="margin:5px 0 0 0;" width="50" height="50" /></a>&nbsp;&nbsp;
 <? }}?>
 </li>
 </ul>
 <ul class="propjlist1">
 <li class="l1">回复内容：</li>
 <li class="l2" style="cursor:pointer;" onclick="hfonc(<?=$row[id]?>)"><? if(empty($row[hf])){?><span class="hui">【暂未回复，点击进行回复】</span><? }else{?><span class="green">回复时间：<?=$row[hfsj]?><br>回复内容：<?=$row[hf]?></span><? }?></li>
 </ul>
 <? }?>

 <div class="npa">
 <?
 $nowurl="propjlist.php";
 $nowwd="ifhf=".$_GET[ifhf];
 require("page.html");
 ?>
 </div>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>