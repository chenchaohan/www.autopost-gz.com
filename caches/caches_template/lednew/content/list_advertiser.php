<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('content', 'header'); ?>
<link href="<?php echo LED_PATH;?>css/news.css?v=11" rel="stylesheet" />
<link href="<?php echo LED_PATH;?>css/partner.css?v=11" rel="stylesheet" />
<!-- main start  -->

   <div class="container comm about">
      <div class="lt">
               <?php include template("content","left_box"); ?>
            </div>

      <div class="right_content">
         <?php include template("content","position_local"); ?>


         <div class="w_prd_rc_box w_prd_league_city w_prd_league_city2">
           <ul>
			<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=1f3057fc22da92000f4dd43f8cbe84f6&sql=SELECT+%2A+FROM+phpcms_partner+WHERE+catid%3D%24catid+ORDER+BY+listorder+DESC&num=12&return=data&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$pagesize = 12;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$r = $get_db->sql_query("SELECT COUNT(*) as count FROM  phpcms_partner WHERE catid=$catid ORDER BY listorder DESC");$s = $get_db->fetch_next();$pages=pages($s['count'], $page, $pagesize, $urlrule);$r = $get_db->sql_query("SELECT * FROM phpcms_partner WHERE catid=$catid ORDER BY listorder DESC LIMIT $offset,$pagesize");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
				<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
             <li class="f1t"><a href="<?php echo $r['url'];?>" target="_blank"><div class="logo"><img src="<?php echo $r['thumb'];?>"></div><p class="title"><?php echo $r['title'];?></p><p><?php echo str_cut($r['description'], 100);?></p></a></li>
				<?php $n++;}unset($n); ?>
			<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
           </ul>
         </div>
			<div id="pages">
                    <?php echo $pages;?>
                </div>
      </div>


   </div>
<div style="clear: both;"></div>
<?php include template('content', 'footer'); ?>