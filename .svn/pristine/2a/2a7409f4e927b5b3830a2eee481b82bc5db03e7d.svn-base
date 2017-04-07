<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php if($_GET['step']==2) { ?>
	<?php include template("content","list_repast2"); ?>
	<?php exit;?>

<?php } else { ?>


<?php include template("content","header"); ?>

<link href="<?php echo LED_PATH;?>css/repast.css?v=1" rel="stylesheet" />
<!--头部结束-->


<!-- 内容 -->
<div class="container comm p2th">
<?php include template("content","position_local"); ?>


	<div class="lt">
	   <?php include template("content","left_service_box"); ?>
	</div>
    
    <div class="right right_content rightArea">
                <h1 class="CaterSearch">餐饮查询及预订</h1>
               <ul class="ul_list">
                    <li id="ul_list_li1">	
                            <h2>分类:</h2>
                           
							<div class="adiv">
								<?php $n=1;if(is_array(filters('style_cate',$modelid))) foreach(filters('style_cate',$modelid) AS $r) { ?>
	                            	<?php echo $r['menu'];?>|
	                            <?php $n++;}unset($n); ?>
                            </div>
							<div class="clearboth"></div>
                    </li>
                    <li id="ul_list_li2">	
                            <h2>商区:</h2>
                           <div class="adiv">
								<?php $n=1;if(is_array(filters('area',$modelid))) foreach(filters('area',$modelid) AS $r) { ?>
	                            	<?php echo $r['menu'];?>|
	                            <?php $n++;}unset($n); ?>
                            </div>
                    </li>
            <div class="clearboth"></div>
                </ul>                
                <div class="finddiv" style="width:500px;">
                	
                </div>
                <div style="clearboth"></div>
                <div class="photo_list">
                	<h2 class="restaurantsale">指定餐厅<br>消费优惠：</h2>
					<ul class="photo_ul" id="photoul">
						<?php $sql = structure_filters_sql($modelid)?>
					 	<?php $urlrule = makeurlrule()?>
					 	<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=8901c834bf742558b60d501c41002e35&action=lists&catid=%24catid&where=%24sql&num=10&order=id+DESC&page=%24page&moreinfo=13&urlrule=%24urlrule\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 10;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'where'=>$sql,'order'=>'id DESC','moreinfo'=>'13','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'where'=>$sql,'order'=>'id DESC','moreinfo'=>'13','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
					 	 	<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
						    <li>
	                        	<a href="<?php echo $r['url'];?>"><img src="<?php echo thumb($r[thumb],156,97);?>" width="156px" height="97px"></a>
	                            <p class="hotelname"><?php echo $r['title'];?></p>
	                            <span class="sale"></span>
	                           <a href="<?php echo $r['url'];?>"> <span class="select">精选</span></a>
	                        </li>
	                        <?php $n++;}unset($n); ?>
                     </ul>
 					
 					<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

                    <a class="more" id="more" href="<?php echo $CATEGORYS[$catid]['url'];?>&step=2">更多信息...</a>
                </div>
        </div>
    </div>
  
    <div class="clear"></div>
</div>
<!-- 内容END -->
<!--底部开始-->
<?php include template("content","footer"); ?>

<?php } ?>