<?
include("../config/conn.php");
include("../config/function.php");
include("../config/tpclass.php");
sesCheck();
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}

if($_POST[jvs]=="smrz"){
 zwzr();
 if(panduan("uid,sfzrz","yjcode_user where uid='".$_SESSION[SHOPUSER]."' and (sfzrz=2 or sfzrz=3)")==0){Audit_alert("���������","smrz.php");}
 $sfz=sqlzhuru($_POST[tsfz]);
 if(strlen(stripos($sfz,"/"))>0 || strlen(stripos($sfz,";"))>0){Audit_alert("����֤�����ʽ����","smrz.php");}
 updatetable("yjcode_user","uname='".sqlzhuru($_POST[tuname])."',sfz='".sqlzhuru($_POST[tsfz])."',sfzrz=0 where uid='".$_SESSION[SHOPUSER]."'");
 uploadtpnodata(1,"upload/".$rowuser[id]."/",strgb2312($sfz,0,15)."-1.jpg","allpic",510,300,0,0,"no");
 uploadtpnodata(2,"upload/".$rowuser[id]."/",strgb2312($sfz,0,15)."-2.jpg","allpic",510,300,0,0,"no");
 //uploadtpnodata(3,"upload/".$rowuser[id]."/",strgb2312($sfz,0,15)."-3.jpg","allpic",800,0,0,0,"no");
 php_toheader("smrz.php?t=suc"); 
}

$sfz1="../upload/".$rowuser[id]."/".strgb2312($rowuser[sfz],0,15)."-1.jpg";
$sfz2="../upload/".$rowuser[id]."/".strgb2312($rowuser[sfz],0,15)."-2.jpg";
//$sfz3="../upload/".$rowuser[id]."/".strgb2312($rowuser[sfz],0,15)."-3.jpg";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<link href="static/css/basic.css" rel="stylesheet" type="text/css" />
<link href="static/css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function tj(){
 if((document.f1.tuname.value).replace("/\s/","")==""){alert("��������ʵ����");document.f1.tuname.focus();return false;}
 if((document.f1.tsfz.value).replace("/\s/","")==""){alert("����������֤����");document.f1.tsfz.focus();return false;}
 tjwait();
 f1.action="smrz.php";
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
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ʵ����֤</li>
</ul>
<? $leftid=3;include("left.php");?>
<!--RB-->
<div class="right">
 <? include("rcap1.php");?>
 <script language="javascript">
 document.getElementById("rcap7").className="g_ac0_h g_bc0_h";
 </script>
 <? systs("��ϲ���������ɹ�!","smrz.php")?>
 <div class="rts">
 ��֤״̬<br>
 <? 
 if(0==$rowuser[sfzrz]){echo "<strong class='blue'>���ύ���ϣ����������֤�������ĵȴ�</strong>";}
 elseif(1==$rowuser[sfzrz]){echo "<strong class='green'>�Ѿ�ͨ��ʵ����֤</strong>";}
 elseif(2==$rowuser[sfzrz]){echo "<strong class='red'>��֤���ܣ�ԭ��".$rowuser[sfzrzsm]."</strong>";}
 elseif(3==$rowuser[sfzrz]){echo "<strong>δ�ύ��֤���ϣ�����д������Ϣ���ύ</strong>";}
 ?>
 </div>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="smrz" name="jvs" />
 <ul class="uk">
 <li class="l1">��ȫ��ʾ��</li>
 <li class="l21 blue">������ʵ����������֤�ż�����֤��Ƭ�����ǽ�����ʵ����֤������͸¶���κε�����</li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ��ʵ������</li>
 <li class="l2"><input type="text" class="inp" name="tuname" value="<?=$rowuser[uname]?>" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ����֤�ţ�</li>
 <li class="l2"><input type="text" class="inp" name="tsfz" value="<?=$rowuser[sfz]?>" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ����֤���棺</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" size="25"></li>
 <? if(is_file($sfz1)){?>
 <li class="l5"></li>
 <li class="l6"><a href="<?=$sfz1?>" target="_blank"><img border="0" src="<?=$sfz1?>" width="170" height="100" /></a></li>
 <? }?>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ����֤���棺</li>
 <li class="l2"><input type="file" name="inp2" id="inp2" size="25"></li>
 <? if(is_file($sfz2)){?>
 <li class="l5"></li>
 <li class="l6"><a href="<?=$sfz2?>" target="_blank"><img border="0" src="<?=$sfz2?>" width="170" height="100" /></a></li>
 <? }?>
 <? if(2==$rowuser[sfzrz] || 3==$rowuser[sfzrz]){?>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("�����޸�")?></li>
 <? }?>
 </ul>
 </form>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>