<?
include("../config/conn.php");
include("../config/function.php");
?>
 <div class="bfb bfbbot">
  <div class="yjcode">
   <div class="d1"><img src="http://shopt5.yj99.cn/homeimg/blogo.jpg" /></div>
    <div class="d2"> 
   <? $i=1;while1("*","yjcode_ad where adbh='gao_04' and zt=0 order by xh asc limit 3");while($row1=mysql_fetch_array($res1)){?>
 
    <span class="s1"><a href="<?=$row1[aurl]?>" target="_blank"><?=$row1[tit]?></a></span>
    <? $i++;}?>
    <? $i=1;while1("*","yjcode_ad where adbh='gao_05' and zt=0 order by xh asc limit 3");while($row1=mysql_fetch_array($res1)){?>
    
    <span class="s2"><a href="<?=$row1[aurl]?>" target="_blank"><?=$row1[tit]?></a></span>
   <? $i++;}?>

  <span class="s3">咨询热线：<?=$rowcontrol[webtelv]?></span>
   </div>
 <ul class="u1">
 <li class="l1">客户指南</li>
 <li class="l2">
  <a href="<?=weburl?>help/search_j9v.html">买家指南</a>
  <a href="<?=weburl?>help/search_j10v.html">卖家指南</a>
  <a href="<?=weburl?>help/search_j11v.html">安全交易</a>
  <a href="<?=weburl?>help/search_j12v.html">常见问题</a>
  <a href="<?=weburl?>help/search_j13v.html">服务中心</a>
  </li>
 </ul>
 <ul class="u2">
 <li class="l1">手机访问</li>
 <li class="l2"><img src="<?=weburl?>tem/getqr.php?u=<?=weburl?>m&size=4" /></li>
 </ul>

</div>
</div>

<div class="bfb bfbbot1">
<div class="yjcode">
 <div class="bq">
 <a href="<?=weburl?>">网站首页</a>&nbsp;&nbsp;|&nbsp;&nbsp;
 <a href="<?=weburl?>help/aboutview2.html">关于我们</a>&nbsp;&nbsp;|&nbsp;&nbsp;
 <a href="<?=weburl?>help/aboutview3.html">广告合作</a>&nbsp;&nbsp;|&nbsp;&nbsp;
 <a href="<?=weburl?>help/aboutview4.html">联系我们</a>&nbsp;&nbsp;|&nbsp;&nbsp;
 <a href="<?=weburl?>help/aboutview5.html">隐私条款</a>&nbsp;&nbsp;|&nbsp;&nbsp;
 <a href="<?=weburl?>help/aboutview6.html">免责声明</a><br>
 CopyRight 2014-2024 <?=webname?> | <?=$rowcontrol[beian]?><br><?=$rowcontrol[webtj]?>
 </div>
 
</div>
</div>


<!--***********右侧浮动开始*************-->
<div class="rightfd" style="display:<? if($rowcontrol[ifkf]=="off"){?>none<? }?>;">

 <div class="d1">
  <span class="s1">联系客服</span>
  <div class="sd1">
  <?
  $qq=preg_split("/,/",$rowcontrol[webqqv]);
  for($qqi=0;$qqi<count($qq);$qqi++){
  $qv=preg_split("/\*/",$qq[$qqi]);
  if($qv[0]!=""){
  if($qv[1]==""){$qtit="网站客服";}else{$qtit=$qv[1];}
  ?>
  <a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$qv[0]?>&site=<?=weburl?>&menu=yes" target="_blank"><?=$qtit?></a>
  <? }}?>
  <strong class="fontyh">联系客服<br><?=$rowcontrol[webtelv]?></strong>
  </div>
 </div>

 <div class="d2">
  <span class="s1">手机版</span>
  <div class="sd1">
  <img src="<?=weburl?>tem/getqr.php?u=<?=weburl?>m&size=4" width="100" height="100" /><br>扫一扫进手机版
  </div>
 </div>

 <div class="d3">
  <span class="s1" onClick="gotoTop();return false;">返回顶部</span>
 </div>
 
</div>
<!--**********右侧浮动结束***************-->
<script language="javascript">
$(".prolist .u1 .l1").mouseenter(function () {
    $(this).find('.d1').eq(0).stop().animate({'top': '6px'}, 200);
});
$(".prolist .u1 .l1").mouseleave(function () {
    $(this).find('.d1').eq(0).stop().animate({'top': '-50px'}, 200);
});
</script>