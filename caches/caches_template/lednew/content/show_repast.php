<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>

<link href="<?php echo LED_PATH;?>css/repast.css?v=1" rel="stylesheet" />
<!--头部结束-->
<!-- 内容 -->
<div class="container comm p2th">
<?php include template("content","position_local"); ?>
    <div class="right ">
                <h1 class="CaterSearch">餐饮查询</h1>
               <ul class="ul_list">
                    <li id="ul_list_li1">   
                            <h2>分类:</h2>
                           
                            <div class="adiv" style="width: 800px;">
                                <?php $n=1;if(is_array(filters('style_cate',$modelid,'','&setp=2'))) foreach(filters('style_cate',$modelid,'','&setp=2') AS $r) { ?>
                                    <?php echo $r['menu'];?>|
                                <?php $n++;}unset($n); ?>
                            </div>
                            <div class="clearboth"></div>
                    </li>
                    <li id="ul_list_li2">   
                            <h2>商区:</h2>
                           <div class="adiv" style="width: 800px;">
                                <?php $n=1;if(is_array(filters('area',$modelid,'','&setp=2'))) foreach(filters('area',$modelid,'','&setp=2') AS $r) { ?>
                                    <?php echo $r['menu'];?>|
                                <?php $n++;}unset($n); ?>
                            </div>
                    </li>
            <div class="clearboth"></div>
                </ul>                
                <div class="finddiv" style="width:500px;">
                    
                </div>
                <div style="clearboth"></div>
                <div class="detail">
                    <h2><?php echo $title;?></h2>
                    <?php echo $content;?>

                </div>
        </div>
    </div>
  
    <div class="clear"></div>
</div>
<!-- 内容END -->
<!--底部开始-->
<?php include template("content","footer"); ?>