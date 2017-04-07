<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>

<link href="<?php echo LED_PATH;?>css/repast_list.css?v=1" rel="stylesheet" />
<!--头部结束-->


<!-- 内容 -->
<div class="container comm ">
<?php include template("content","position_local"); ?>

	<div class="lt p2th">
	   <?php include template("content","left_service_ly_box"); ?>
	</div>
    
    <div class="right right_content rightArea " style="  width: 740px;">
            <div class="p2th">
                <h1 class="CaterSearch"><?php echo $CATEGORYS[$catid]['catname'];?>查询</h1>
               <ul class="ul_list ">
                    <li id="ul_list_li1">	
                            <h2>游玩天数:</h2>
                           
							<div class="adiv">
								<?php $n=1;if(is_array(filters('day_num',$modelid))) foreach(filters('day_num',$modelid) AS $r) { ?>
	                            	<?php echo $r['menu'];?>|
	                            <?php $n++;}unset($n); ?>
                            </div>
							<div class="clearboth"></div>
                    </li>
                    <li id="ul_list_li2">	
                            <h2>交通:</h2>
                           <div class="adiv">
								<?php $n=1;if(is_array(filters('traffic',$modelid))) foreach(filters('traffic',$modelid) AS $r) { ?>
	                            	<?php echo $r['menu'];?>|
	                            <?php $n++;}unset($n); ?>
                            </div>
                            <div class="clearboth"></div>
                    </li>
                    <div class="clearboth"></div>
                    <li id="ul_list_li3">   
                            <h2>热门景区:</h2>
                           <div class="adiv">
                                <?php $n=1;if(is_array(filters('scenic',$modelid))) foreach(filters('scenic',$modelid) AS $r) { ?>
                                    <?php echo $r['menu'];?>|
                                <?php $n++;}unset($n); ?>
                            </div>
                             <div class="clearboth"></div>
                    </li>
                   
                </ul>           
            </div>
    


            <div class="ulbox p3th">
                <ul class="" id="">
                    <?php $sql = structure_filters_sql($modelid)?>
                    <?php $urlrule = makeurlrule()?>
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=3897f2aff86cda2903de499d434eed51&action=lists&catid=%24catid&where=%24sql&num=10&order=id+DESC&page=%24page&moreinfo=1&urlrule=%24urlrule\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 10;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'where'=>$sql,'order'=>'id DESC','moreinfo'=>'1','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'where'=>$sql,'order'=>'id DESC','moreinfo'=>'1','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
                        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                        <li>
                           <a href="<?php echo $r['url'];?>"><img src="<?php echo thumb($r[thumb],205,132);?>" width="205px" height="132px"></a>
                            <div class="p_box">
                                <h2> <a href="<?php echo $r['url'];?>"> <?php echo $r['title'];?></a></h2>
                                <p>
                                    <?php echo nl2br($r['description']);?>
                                </p>
                                
                                
                            </div>
                        </li>

                        <?php $n++;}unset($n); ?>
                 </ul>
                <div id="pages" class="text-c"><?php echo $pages;?></div>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </div>

                
        </div>

</div>
    </div>
  
  
<div class="clearboth"></div>

<!-- 内容END -->
<!--底部开始-->
<?php include template("content","footer"); ?>