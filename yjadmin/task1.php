<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$id=$_GET[id];
$sj=date("Y-m-d H:i:s");
$sqltask="select * from yjcode_task where id=".$id." and taskty=1";mysql_query("SET NAMES 'GBK'");$restask=mysql_query($sqltask);
if(!$rowtask=mysql_fetch_array($restask)){php_toheader("tasklist.php");}
$bh=$rowtask[bh];

if($_GET[control]=="update" && $_POST[jvs]=="zt105"){
 if(105==$rowtask[zt]){
  $zt=intval($_POST[Rzt]);
  if($zt==0){
  $endsj=date("Y-m-d H:i:s",strtotime("+".$rowtask[rwzq]." day"));
  updatetable("yjcode_task","zt=100,yxq='".$endsj."' where id=".$id);
  }
  elseif($zt==2){
   if($rowtask[money4]>0){
   PointIntoM($rowtask[userid],"������˲�ͨ���������˻�(������".$rowtask[bh].")",$rowtask[money4]);
   PointUpdateM($rowtask[userid],$rowtask[money4]);
   }
  updatetable("yjcode_task","zt=106 where id=".$id);
  }
 }
 
 php_toheader("task1.php?t=suc&id=".$id);


}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/ad.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>

<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/unit.js"></script>

</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu5").className="a1";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0602,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=3;include("menu_ad.php");?>

<div class="right">

 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","task1.php?id=".$id);}?>
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">��������</a>
 <a href="tasklist1.php">�����б�</a>
 </div> 
 <!--B-->
 <div class="rkuang">
 <script language="javascript">
 function tj(){
 r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("��ѡ����״̬��");return false;}
 if(!confirm("ȷ���ύ������")){return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="task1.php?id=<?=$id?>&control=update";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="rcap"><li class="l1"></li><li class="l2">������Ϣ</li><li class="l3"></li></ul>
 <ul class="viewul">
 <li class="l1">�������⣺</li>
 <li class="l2"><a href="../task/view<?=$rowtask[id]?>.html" target="_blank"><strong><?=$rowtask[tit]?></strong></a></li>
 <li class="l1">����Ԥ�㣺</li>
 <li class="l3"><strong class="feng">��<?=$rowtask[money1]?></strong></li>
 <li class="l1">����״̬��</li>
 <li class="l3"><?=returntask($rowtask[zt])?></li>
 <li class="l1">�������ͣ�</li>
 <li class="l3"><?=returntasktype(1,$rowtask[type1id])." ".returntasktype(2,$rowtask[type2id])?></li>
 <li class="l1">������ʽ��</li>
 <li class="l3">��������</li>
 <li class="l1">���������</li>
 <li class="l3"><?=$rowtask[tasknum]?>��</li>
 <li class="l1">�ѽ��ַ�����</li>
 <li class="l3"><a class="red" href="taskhflist1.php?bh=<?=$rowtask[bh]?>"><?=$rowtask[taskcy]?>��</a></li>
 <li class="l1">�����</li>
 <li class="l3"><?=$rowtask[money3]?>Ԫ</li>
 <li class="l1">�������ڣ�</li>
 <li class="l3"><?=$rowtask[rwzq]?>��</li>
 <li class="l1">����ʱ�䣺</li>
 <li class="l3"><?=$rowtask[sj]?></li>
 <li class="l4">����������</li>
 <li class="l5"><script id="editor" name="content" type="text/plain" style="width:853px;height:330px;"><?=$rowtask[txt]?></script></li>
 </ul>
 
 <? if(105==$rowtask[zt]){?>
 <ul class="rcap"><li class="l1"></li><li class="l2">����Ա����</li><li class="l3"></li></ul>
 <ul class="viewul">
 <li class="l1">������֪��</li>
 <li class="l2 red">���״̬����󣬲����ٴ���ˣ��������ʵ���������Ƿ�Ϸ��Ϲ�</li>
 <li class="l1">���״̬��</li>
 <li class="l2">
 <span class="finp">
 <label><input name="Rzt" type="radio" value="0" /> <strong>ͨ�����</strong></label> &nbsp;&nbsp;&nbsp;&nbsp;
 <label><input name="Rzt" type="radio" value="1" /> <strong>��˲�ͨ��</strong></label> 
 </span>
 </li>
 <li class="l8"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 <? }?>

 </form>
 </div>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
<script type="text/javascript">
//ʵ�����༭��
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