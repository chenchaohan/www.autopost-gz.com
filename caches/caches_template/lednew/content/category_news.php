<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<link rel="stylesheet" href="<?php echo LED_PATH;?>css/swiper.min.css" />
<link href="<?php echo LED_PATH;?>css/news.css?v=1" rel="stylesheet" />

<!--main-->
<div class="container comm">

            <div class="lt">
                <?php include template("content","left_box"); ?>
            </div>
            <div class="rt">
                <div class="newsIndexWarp">
                    <div class="newIndex">
                        
                        <?php $cate_arr=array(31,32);//分类?>
                        <?php $n=1;if(is_array($cate_arr)) foreach($cate_arr AS $catid) { ?>
                        <div class="regin-head new">
                            <a class="more" href="<?php echo $CATEGORYS[$catid]['url'];?>">更多 &gt;</a>
                            <h4><a><?php echo $CATEGORYS[$catid]['catname'];?></a></h4>
                        </div>
                        <div class="newhead EnlargeImg">
                            <div class="lfd">

                                <div class="swiper-container">
                                    <ul class="swiper-wrapper" id="swiper-wrapper">
                                   <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=42e31479f2832a8b073c12d3a5b0f136&action=position&posid=10&catid=%24catid&order=listorder+DESC&num=3\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'10','catid'=>$catid,'order'=>'listorder DESC','limit'=>'3',));}?>
                                        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                                        <li class="swiper-slide" 
                                        ><a href="<?php echo $r['url'];?>"><img src="<?php echo $r['thumb'];?>" border="0" alt=""><span><?php echo str_cut($r['title'], 50);?></span></a></li>
                                        <?php $n++;}unset($n); ?>
                                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                                    </ul>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>

                            <div class="rth">
                                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=89180c315e637c7c507c60bce403d286&action=lists&catid=%24catid&limit=%270%2C1%27+order%3D\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$catid,'limit'=>'20',));}?>
                                    <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                                <h3>
                                    <a class="title" href="<?php echo $r['url'];?>"><?php echo str_cut($r['title'], 60);?></a></h3>
                                <p class="subh" id="ucNewsHot1">
                                    <a href="<?php echo $r['url'];?>"><?php echo str_cut($r['description'], 200);?> &nbsp;详情&gt;</a>
                                </p>
                                    <?php $n++;}unset($n); ?>
                                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                                <ul class="newhl">
                                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=2b04db6355eeda584f4eca1f0cc76507&action=lists&catid=%24catid&limit=%271%2C4%27+order%3D\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$catid,'limit'=>'20',));}?>
                                    <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                                            <li><span class="nli_time"><?php echo date('Y-m-d',$r[inputtime]);?></span><a href="<?php echo $r['url'];?>" class="overflowtxt" title=""><?php echo str_cut($r['title'], 60);?></a></li>
                                         <?php $n++;}unset($n); ?>
                                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?> 
                                        
                                </ul>

                            </div>
                        </div>
                        <?php $n++;}unset($n); ?>
                    
                </div>

    </div>




</div>
<script type="text/javascript" src="<?php echo LED_PATH;?>js/swiper.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () { 
        var mySwiper = new Swiper('.swiper-container',{
           nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
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
<?php include template("content","footer"); ?>