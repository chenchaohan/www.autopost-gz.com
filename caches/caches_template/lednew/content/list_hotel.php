<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>

<link href="<?php echo LED_PATH;?>css/hotel_index.css?v=1" rel="stylesheet" />
<!--头部结束-->
<script type="text/javascript" src="<?php echo LED_PATH;?>js/msg_box.js"></script>
<link rel="stylesheet" href="<?php echo LED_PATH;?>css/swiper.min.css" />


 <style type="text/css">
	

.swiper-container {
  margin: 0 auto;
  position: relative;
  overflow: hidden;
  z-index: 1;
  width: 506px;
  height: 240px;
  position: relative;
  overflow: hidden;
}

 </style>
<!-- 内容 -->
<div id="content" class="container layout cf">
	<div class="indexLeft fl">
		
		<div class="adv mm">

			<div class="swiper-container">
				<ul class="swiper-wrapper">
				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=e12d82de9aafe347de6e242244a77a79&sql=SELECT+setting+FROM+phpcms_poster+WHERE+spaceid+%3D+10+AND+type%3D%27images%27+AND+disabled%3D0+order+by+listorder+desc+%2Cid+desc\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT setting FROM phpcms_poster WHERE spaceid = 10 AND type='images' AND disabled=0 order by listorder desc ,id desc LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?> 
				<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
						<?php eval("\$narry =$r[setting];");?>
						<div class="swiper-slide">
							<a href="<?php echo $narry['1']['linkurl'];?>" target="_blank"><img src="<?php echo $narry['1']['imageurl'];?>"  class="spread" alt="<?php echo $narry['1']['alt'];?>"></a>
						</div>
						<?php $n++;}unset($n); ?>
				  <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

						
				</ul>
				<div class="swiper-pagination swiper-pagination-white"></div>
			</div>
			<script type="text/javascript" src="<?php echo LED_PATH;?>js/swiper.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () { 
        var mySwiper = new Swiper('.swiper-container',{
           
        pagination: '.swiper-pagination',
        paginationClickable: true,
            loop:true,
            autoplay:5000,
            paginationClickable: true,
            centeredSlides: true,
            onSlideChangeStart: function(){
                //回调函数
            }
        });
    });

</script>
			</script>
			<?php if($languageId==1) { ?>
			<div class="tips">
				友情提示：
				<br>以下酒店信息（包括房型、价格等）仅供参考。房间预订信息请以酒店方最终确认订单为准。 
				<br>“<img src="<?php echo LED_PATH;?>/images/hui.jpg"/>”表示酒店有优惠信息

			</div>
			<?php } else { ?>
			<div class="tips">
				Attention:
				<br>The information below (including room type and room rate) is FOR YOUR REFERENCE 
ONLY.  Final availability and rate is subject to hotel confirmation at the time of booking.
<br>“<img src="<?php echo LED_PATH;?>/images/hui.jpg">”Said the hotel deals

			</div>
			
			<?php } ?>
		</div>
		<div class="recommend m">
			<div class="tit cf">
				
				<h2><?php if($languageId==1) { ?>推荐酒店<?php } else { ?>Recommend Hotels<?php } ?></h2>			
			</div>
			<div class="recomList">
			 <div id="mjs:tip" class="tip" style="position:absolute;left:0;top:0;display:none;"></div>
				<ul class="cf">
					<?php $catid = $languageId==1?36:105;?>
					<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=00be1e79cc157c56d423a7409c41e02b&action=position&posid=10&catid=%24catid&order=listorder+DESC&num=30\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'10','catid'=>$catid,'order'=>'listorder DESC','limit'=>'30',));}?>
					<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
						<li><a href="<?php echo $r['url'];?>"><?php echo $r['title'];?></a>
							<?php if($r['description']) { ?>
							<span onmouseover="tip.start(this)" tips="<?php echo $r['description'];?>"><img src="<?php echo LED_PATH;?>/images/hui.jpg"></span>
							<?php } ?>
						</li>    
					<?php $n++;}unset($n); ?>
					<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                  	<div style="clear:both;"></div>
				</ul>
			
			</div>
		</div>

	</div>
	<div class="indexRight fr">
	<!--以下这一段是显示部门和服务项目分组的具体内容，请将其放到网页中您想要显示的位置-->
<script language="javascript">

if(document.all || document.getElementById)
{
	document.write('<span id="LR_ServKindlist_Div"></span>');
}
else if(document.layers)
{
	document.write('<layer name="LR_ServKindlist_Div"></layer>');
}

</script>

	<!--搜索框-->
		<div class="booking mm">
        <div class="cwdn">
	<div class="tabnav">
		<ul>
		<li class="on" id="tb_11" onClick="HoverLi(1,1,5);">酒店</li>
		<li class="" id="tb_12" onClick="HoverLi(1,2,5);">租车</li>
		<li class="" id="tb_13" onClick="HoverLi(1,3,5);">火车票</li>
		<li class="" id="tb_14" onClick="HoverLi(1,4,5);">餐饮</li>
		<li class="" id="tb_15" onClick="HoverLi(1,5,5);">旅游</li>
        <li class="" id="tb_16">翻译</li>
        <li class="" id="tb_17">礼仪</li>
       
		</ul>
	</div>
	<div class="dis" id="tbc_11">
<div class="main">
	

<div class="bookingBox">
	<div id='b_container'></div>
	<script type='text/javascript' id='sp_widget' data-hash='_3b50d9953058497cf' data-container='b_container' data-size='370x211' data-tpncy='true' src='https://aff.bstatic.com/static/affiliate_base/js/booking_sp_widget.js'></script>
</div>	
</div>

</div>
<div class="undis" id="tbc_12">
<div class="main">
	
 <div class="bookingBox">


<iframe src="http://www.rentalcars.com/partners/integrations/dynamic-location/cantonfair/index.html?preflang=zs" width="385" height="231" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
			</div>

                     </div>
</div>
	<div class="undis" id="tbc_13">
<div class="main">
	 <div class="bookingBox">
				<div class="booking_tit cf">
					<h2>火车票查询</h2>
					<em> </em>	
				</div>
					<div class="bookingCon cf">
					<form id="bookingSearchForm" method="post" action="index.php?c=list&cs=huoche">
					<input type="hidden" id="tEnd" name="c" value="list">
                    <dl class="cf mudidi">
						<dt>出发站</dt>
						<dd>	
						<select name="start" id="tType" >
																			<option value="广州南">广州南</option>
																				<option value="广州北">广州北</option>
																				<option value="广州">广州</option>
																				<option value="广州东">广州东</option>
																				<option value="武汉">武汉</option>
																				<option value="长沙南">长沙南</option>
																				<option value="深圳北">深圳北</option>
																				<option value="新会">新会</option>
																				<option value="珠海">珠海</option>
																				<option value="珠海北">珠海北</option>
																				<option value="深圳">深圳</option>
																				<option value="深圳西">深圳西</option>
																				<option value="九龙">九龙</option>
																				<option value="三亚">三亚</option>
																				<option value="佛山">佛山</option>
																				<option value="厦门">厦门</option>
																				<option value="肇庆">肇庆</option>
																				<option value="惠州">惠州</option>
																			</select>
								</dd>
					</dl>
					<dl class="cf guanjianci">
						<dt>到达站</dt>
						<dd class="date">
							<input type="text"  class="" value="" name="end">
							</dd>
						
					</dl>
					<dl class="cf mudidi">
						<dt>类型</dt>
						<dd>	
															<select name="cs" id="tType" >
									<option value="chaxun">不限</option>
																			<option value="gaotie">高铁</option>
																				<option value="chgui">城轨</option>
																				<option value="huoch">火车</option>
																			</select>
					
								</dd>
					</dl>
                    <dl class="cf guanjianci">
						<dt>车次</dt>
						<dd>
                        <input type="text"  class="" value="" name="keywords"></dd>
					</dl>
					<input type="submit" class="button btn_search2" value='搜索'>
					</form>
				</div>
                </div>
	</div>
</div>
	<div class="undis" id="tbc_14">
<div class="main">
<div class="bookingBox">
				<div class="booking_tit cf">
					<h2>餐饮查询</h2>
					<em> </em>	
				</div>
				<div class="bookingCon cf">
				<form id="searchForm" method="get" action="index.php">
						
					 <input type="hidden" class="text" name="c" value="list"/>
                    <input type="hidden" class="text" name="cs" value="gzcanyin"/>
					 <dl class="cf mudidi">
						<dt>分   类</dt>
						<dd>	
						<select name="gztype" id="tType" >
																			<option value="1">粤菜</option>
																				<option value="2">川菜</option>
																				<option value="3">潮汕菜</option>
																				<option value="4">湘菜</option>
																				<option value="5">东北菜</option>
																				<option value="6">清真菜</option>
																				<option value="7">欧式西餐</option>
																				<option value="8">美式西餐</option>
																				<option value="9">韩日料理</option>
																				<option value="10">东南亚菜</option>
																				<option value="11">自助餐</option>
																			</select>
								</dd>
					</dl>
							
						 <dl class="cf mudidi">
						<dt>商    圈</dt>
						<dd>	
						<select name="gzquan" id="tType" >
																			<option value="1">天河</option>
																				<option value="2">江南大道</option>
																				<option value="3">东晓南</option>
																				<option value="4">珠江新城</option>
																				<option value="5">越秀公园</option>
																				<option value="6">环市东</option>
																				<option value="7">体育中心</option>
																				<option value="8">琶洲</option>
																				<option value="9">客村</option>
																				<option value="10">中山六路</option>
																				<option value="11">中山八路</option>
																				<option value="12">北京路</option>
																				<option value="13">麓湖公园</option>
																				<option value="14">机场路</option>
																				<option value="15">五羊新城</option>
																				<option value="16">天河北</option>
																				<option value="17">三元里</option>
																				<option value="18">东山口</option>
																				<option value="19">中山七路</option>
																				<option value="20">番禺</option>
																			</select>
								</dd>
					</dl>
					
				<div class="s_search">
					
						<label for="searchInput" style="font-size:13px;
						font-weight:bold;color:#3E4241;font-family:'Microsoft YaHei';margin-left:11px;">关键词</label>
						   <input type="text" class="text" name="keywords" />
                   
                    <input type="hidden" class="text" name="step" value="2"/>
                        
						<input type="submit" class="button btn_search2" value='搜索'>
					
				</div>
				</div>
		     </form>
				
                </div>
</div>
</div>
	<div class="undis" id="tbc_15">
<div class="main">
<div class="bookingBox">
				<div class="booking_tit cf">
					<h2>旅游搜索</h2>
					<em> </em>	
				</div>
				<div class="bookingCon cf">
					
			<dl class="cf mudidi">
						<form id="searchForm" method="get" action="index.php">
						<dt>天    数</dt>
						<dd>	
						<select name="tianshu" id="tianshu" >
																			<option value="1">一日</option>
																				<option value="2">二日</option>
																				<option value="3">三日</option>
																				<option value="4">四日</option>
																				<option value="5">五日</option>
																				<option value="6">六日</option>
																				<option value="7">六日以上</option>
																			</select>
								</dd>
					</dl>
					
							
					<dl class="cf mudidi">
						<dt>交    通</dt>
						<dd>	
						<select name="jiaotong" id="jiaotong" >
																			<option value="1">飞机</option>
																				<option value="2">巴士</option>
																				<option value="3">火车/轮船</option>
																				<option value="4">自驾</option>
																			</select>
								</dd>
					</dl>	
					
				<div class="s_search">
					
						<label for="searchInput" style="font-size:13px;font-weight:bold;
						color:#3E4241;font-family:'Microsoft YaHei';margin-left:11px;">关键词</label>
						<input type="text" id="searchInput" placeholder="" value="" class="searchInput placeholder" name="keywords">
						<input class="text" type="hidden" value="list" name="c">
                        <input class="text" type="hidden" value="lyluxian" name="cs">
                        
						<input type="submit" class="button btn_search2" value='搜索'>
					</form>
				</div>
		
				</div>
                </div>
</div>
</div>

</div>
        </div>	
								


		<div class="hotelList m">

			<ul class="cf">
				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=631fb3651aabba1e72db04d6174ce0f4&action=lists&catid=%24catid&order=listorder+DESC%2Cid+DESC&num=30\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$catid,'order'=>'listorder DESC,id DESC','limit'=>'30',));}?>
                    <?php $n=1; if(is_array($data)) foreach($data AS $n => $r) { ?>
					<li>
						<div class="listImg">
							<a href="<?php echo $r['url'];?>"><img src="<?php echo thumb($r[thumb],599,330);?>" alt="<?php echo $r['title'];?>" class="mid" /></a><em class="mid_em"></em>
						</div>
						<div class="listTitle"><a href="index.php?c=msg&amp;id=2037&amp;"><?php echo $r['title'];?></a></div>
						<?php if($r['description']) { ?>
							<div class="listTip"><?php echo $r['description'];?></div>
						<?php } ?>
					</li>
					<?php $n++;}unset($n); ?>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
			</ul>
		</div>

	</div>
	<div style="clear:both;"></div>
</div>

<!--[if lte IE 6]>
<script>
var imgUl = $(".listImg");
var maxWidth = imgUl.width();
var maxHeight = imgUl.height();
$(".hotelList").find("img").each(function(){
	if($(this).width() > maxWidth || $(this).height() > maxHeight){
		if($(this).width()/ $(this).height() > maxWidth / maxHeight){
			$(this).width(maxWidth);
		}else{
			$(this).height(maxHeight);
		}
	}
});
</script>
<![endif]-->


<!-- 内容END -->
<!--底部开始-->
<?php include template("content","footer"); ?>