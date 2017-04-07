<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=3530229ce266d4df58e33718445ba7b3&sql=SELECT+parentid+FROM+phpcms_category+WHERE+catid+%3D+%24catid+LIMIT+0%2C+1--&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT parentid FROM phpcms_category WHERE catid = $catid LIMIT 0, 1-- LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
	<?php $getCategory = $data[0];?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
<?php if($getCategory['parentid'] != 15) { ?>
	<?php $_catid = $getCategory['parentid'];?>
<?php } else { ?>
	<?php $_catid = $catid;?>
<?php } ?>




<div class="left" style="position:relative; "><!--左边导航部分-->
        	
	<div class="leftArea fl">
	<div class="tkServe">
		<h2><?php echo $CATEGORYS[$catid]['catname'];?></h2>
		<?php $aid = $languageId ==1 ?39:107;?>
		<a class="s_place s_list" href="<?php echo $CATEGORYS[$aid]['url'];?>"><span><?php echo $CATEGORYS[$aid]['catname'];?></span></a>
		<a class="s_place s_list on" href="<?php echo $CATEGORYS[$catid]['url'];?>"><span><?php echo $CATEGORYS[$catid]['catname'];?></span></a>
	</div>
    </div>
</div>  