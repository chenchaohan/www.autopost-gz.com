<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>

<link rel="stylesheet" href="<?php echo LED_PATH;?>css/swiper.min.css" />
<div class="w_fs_index_banner">
       <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper" id="swiper-wrapper">
		  
												<div class="swiper-slide">
					<a href="#">
					<?php if($languageId==1) { ?>
						<img src="<?php echo LED_PATH;?>images/banner_banner0.jpg"  style="width: 100%;" class="spread" alt="">
					<?php } else { ?>
						<img src="<?php echo LED_PATH;?>images/banner_en.jpg" style="width: 100%;" class="spread" alt="">
					<?php } ?>
					</a>
				</div>
												
        <!-- Add Pagination 
        <div class="swiper-pagination"></div>-->
    </div>

</div>
<script type="text/javascript" src="<?php echo LED_PATH;?>js/swiper.min.js"></script>
<!-- Initialize Swiper -->
    <script>

    //var newSlideSize = function slideSize(){
        //var w = Math.ceil($(".swiper-container").width()/3/*--调整高度---*/);
        //$(".swiper-container,.swiper-wrapper,.swiper-slide").height(w);
    //};
    //newSlideSize();
    //$(window).resize(function(){
        //newSlideSize();
    //});
$(document).ready(function () { 
	var mySwiper = new Swiper('.swiper-container',{
      
        loop:false,
        autoplay:5000,
        paginationClickable: true,
		centeredSlides: true,
        onSlideChangeStart: function(){
            //回调函数
        }
    });
});
</script>
	
<!-- 主体内容 -->
<div class="container">
	<!-- banner -->
	<div class="banner">
		<div class="banner_l fl">
		<?php if($languageId==1) { ?>
			<div class="fl">
				<p>欢迎参加</p>
				<p>第25届广州国际汽车用品、</p>
				<p>零配件及售后服务展览会</p>
				<p>距离开幕还有</p>

			</div>
		<?php } else { ?>
			<div class="fl en">
				<p>Welcome to The</p>
				<p>25th Guangzhou International Exhibition</p>
				<p>of Automotive Products,</p>
				<p>Auto Parts & Post-market Services</p>
				<p>Countdown</p>
			</div>
		<?php } ?>
			<div class="fl date">
				<span>107</span><?php echo $_LANG['DAYS'][$languageId];?>
			</div>
		</div>
		<div class="banner_r fr">
			<?php 
				$aid = $languageId==1 ? 18 : 81;
				$bid = $languageId==1 ? 25 : 96;
			?>
			<p><a href="<?php echo APP_PATH;?>index.php?m=consult&c=index&a=exhibition_form&catid=<?php echo $aid;?>&lang=<?php echo $languageId;?>"><img src="<?php echo LED_PATH;?>images/index_cz_btn_<?php echo $languageName;?>.jpg" /></a></p>
			<p><a href="<?php echo APP_PATH;?>index.php?m=consult&c=index&a=visitorregister&catid=<?php echo $bid;?>&lang=<?php echo $languageId;?>"><img src="<?php echo LED_PATH;?>images/index_dj_btn_<?php echo $languageName;?>.jpg" /></a></p>
			<p><a href="#"><img src="<?php echo LED_PATH;?>images/index_login_btn_<?php echo $languageName;?>.jpg" /></a></p>


		</div>
	</div>
	<!-- banner end -->

	<!-- 分类 -->
	<div class="news_box">
	<?php //分类频道
			if($languageId==1){
				$cat_arr = array(1=>31,2=>32);
			}else{
				$cat_arr = array(1=>101,2=>102);
			}
			
		?>
		<?php $k=1;?>
		<?php $n=1; if(is_array($cat_arr)) foreach($cat_arr AS $key => $catid) { ?>
			<div class="news_index_box <?php if($k%2!=0) { ?>fl <?php } else { ?> fr <?php } ?>">
				<div class="block_index_title"><a href="<?php echo $CATEGORYS[$catid]['url'];?>"><?php echo $_LANG['MORE'][$languageId];?>>></a><span><?php echo $CATEGORYS[$catid]['catname'];?></span></div>
				<div class="cate_desc">
					<ul>
					<?php $k2=1;?>
						<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=f12a71d557a026499d03faa92d13db46&action=lists&catid=%24catid&order=listorder+DESC%2Cid+DESC&num=6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$catid,'order'=>'listorder DESC,id DESC','limit'=>'6',));}?>
							<?php $n=1; if(is_array($data)) foreach($data AS $n => $r) { ?>
								<li><a href="<?php echo $r['url'];?>" target="_blank"><?php echo str_cut($r['title'], 80);?></a><span><?php echo date('Y/m/d', $r[inputtime]);?></span></li>
						<?php $k2++;?>
							<?php $n++;}unset($n); ?>
						<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
					</ul>
				</div>
			</div>
			<?php $k++;$k2++;?>
		<?php $n++;}unset($n); ?>

		<div style="clear: both;"></div>
	</div>
	<!-- 分类 end -->
	<?php $go_url = $languageId==1? 'index.php?m=consult&c=index&a=exhibition_form&catid=18&lang=1': 'index.php?m=consult&c=index&a=exhibition_form&catid=81&lang=2';?>
	<div onclick="window.location.href='<?php echo APP_PATH;?><?php echo $go_url;?>'">
		<img src="<?php echo LED_PATH;?>images/middle_banner_cn.jpg" style=" width: 100%;">

		</div>
	
<?php $id = $languageId == 1 ? 43 : 76;?>
	<div class="block_index_box block_consult_box" >
		<div class="block_index_title"><a href="<?php echo $CATEGORYS[$id]['url'];?>"><?php echo $_LANG['MORE'][$languageId];?>>></a><span><?php echo $CATEGORYS[$id]['catname'];?></span></div>
		<div id="mar1">
			<ul>
				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=b8b48d7d0f32b0261c57a3618b8cc984&sql=SELECT+%2A+FROM+phpcms_partner+WHERE+catid+in+%28%24id%29+ORDER+BY+listorder+DESC%2Cid+DESC+LIMIT+0%2C+20--+&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM phpcms_partner WHERE catid in ($id) ORDER BY listorder DESC,id DESC LIMIT 0, 20--  LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
	                <?php $n=1; if(is_array($data)) foreach($data AS $n => $r) { ?> 
					<li>
						<a href="<?php echo $r['url'];?>" target="_blank"><img src="<?php echo $r['thumb'];?>" /></a>
					</li>
	                <?php $n++;}unset($n); ?>
	            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
			</ul>
		</div>
	</div>
<?php $id = $languageId == 1 ? 44 : 77;?>
	<div class="block_index_box block_consult_box partner_box">
		<div class="block_index_title"><a href="<?php echo $CATEGORYS[$id]['url'];?>"><?php echo $_LANG['MORE'][$languageId];?>>></a><span><?php echo $CATEGORYS[$id]['catname'];?></span></div>
		<div id="mar2">
			<ul>
				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=b8b48d7d0f32b0261c57a3618b8cc984&sql=SELECT+%2A+FROM+phpcms_partner+WHERE+catid+in+%28%24id%29+ORDER+BY+listorder+DESC%2Cid+DESC+LIMIT+0%2C+20--+&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM phpcms_partner WHERE catid in ($id) ORDER BY listorder DESC,id DESC LIMIT 0, 20--  LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
	                <?php $n=1; if(is_array($data)) foreach($data AS $n => $r) { ?> 
					<li>
						<a href="<?php echo $r['url'];?>" target="_blank"><img src="<?php echo $r['thumb'];?>" /></a>
					</li>
	                <?php $n++;}unset($n); ?>
	            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
			</ul>
		</div>
	</div>


</div>
<!-- 主体内容 end -->
<script type="text/javascript">
$(document).ready(function(){
	$("#mar1").marquee({
        direction:"right",
        speed:30
    });
	$("#mar2").marquee({
        direction:"right",
        speed:30
    });
});
    
</script>

<?php include template("content","footer"); ?>