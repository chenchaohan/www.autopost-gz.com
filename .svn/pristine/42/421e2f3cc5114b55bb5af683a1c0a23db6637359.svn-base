<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>

<link href="<?php echo LED_PATH;?>css/news.css?v=1" rel="stylesheet" />

<!--main-->
<div class="container comm about">

            <!--lo_linksstart-->
            <?php include template("content","position_local"); ?>

            <div style="clear: both;"></div>
            <!--lo_linksend-->
            <div class="lt">
               <?php include template("content","left_box"); ?>
            </div>
            <div class="rt">
                <!--新闻列表-->
                <div class="newsWarp">
                    <div class="rt-head">
                        <h4><?php echo $CATEGORYS[$catid]['catname'];?></h4>
                    </div>
                    
                <ul class="newsList">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=e24f9e4b5832d370c3c600a81af73ec4&action=lists&catid=%24catid&order=listorder+DESC%2Cid+DESC&page=%24page&num=10\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 10;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'order'=>'listorder DESC,id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'order'=>'listorder DESC,id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
                    <?php $n=1; if(is_array($data)) foreach($data AS $n => $r) { ?>
                    <li>
                        <p class="subTitle"><a href="<?php echo $r['url'];?>"><?php echo str_cut($r['title'], 72);?></a><span>[<?php echo date('Y-m-d',$r[inputtime]);?>]</span></p>
                        <p class="cot">
                            <?php echo str_cut($r['description'], 500);?>
                           
                        </p>


                    </li>
                    <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            
                </ul>
    
                <div id="pages">
                    <?php echo $pages;?>
                </div>

                </div>
            </div>

        <div style="clear: both;"></div>
    </div>


<?php include template("content","footer"); ?>