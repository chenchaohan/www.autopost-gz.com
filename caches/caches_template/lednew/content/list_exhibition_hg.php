<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>

<link href="<?php echo LED_PATH;?>css/exhibition_about.css?v=1" rel="stylesheet" />
<!--头部结束-->
<!-- 内容 -->
<div class="container comm">
	<div class="lt">
	   <?php include template("content","left_box"); ?>
	</div>
    <div class="about right_content" >
         <div class="rt">
                <div class="about-md">
                    <ul>
					<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=d60151cceca25846de6087220333c5b0&sql=SELECT+%2A+FROM+phpcms_news+WHERE+catid%3D%24catid+ORDER+BY+listorder+DESC+LIMIT+10--&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM phpcms_news WHERE catid=$catid ORDER BY listorder DESC LIMIT 10-- LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
						<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
						 <li>
							<a href="<?php echo $r['url'];?>">
								<img src="<?php echo $r['thumb'];?>" style="height:199px;">
								<p class="title"><?php echo $r['title'];?></p>
							</a>
						</li>
						<?php $n++;}unset($n); ?>
					<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                       
                    </ul>
                </div>
            </div>
    </div>
  
    <div class="clear"></div>
</div>
<!-- 内容END -->
<!--底部开始-->
<?php include template("content","footer"); ?>