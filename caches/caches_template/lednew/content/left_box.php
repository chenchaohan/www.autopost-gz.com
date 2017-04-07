<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=3530229ce266d4df58e33718445ba7b3&sql=SELECT+parentid+FROM+phpcms_category+WHERE+catid+%3D+%24catid+LIMIT+0%2C+1--&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT parentid FROM phpcms_category WHERE catid = $catid LIMIT 0, 1-- LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
	<?php $getCategory = $data[0];?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
<?php if(!in_array($getCategory['parentid'],array(15,35,16,73))) { ?>
	<?php $_catid = $getCategory['parentid'];?>
<?php } else { ?>
	<?php $_catid = $catid;?>
<?php } ?>


<dl class="">
<dt><i></i><a href="<?php echo $CATEGORYS[$catid]['url'];?>" style="color:#fff;"><?php echo $CATEGORYS[$_catid]['catname'];?></a></dt>

<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=33d5b875d3991e00c6c8a258855c7e8e&sql=SELECT+catid%2C+catname%2C+url%2Cdescription+FROM+phpcms_category+WHERE+parentid+%3D+%24_catid+and+ismenu%3D1+ORDER+BY+listorder+ASC&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT catid, catname, url,description FROM phpcms_category WHERE parentid = $_catid and ismenu=1 ORDER BY listorder ASC LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
	<?php if($data) { ?>
		<?php $n=1;if(is_array($data)) foreach($data AS $value) { ?>

		<dd <?php if($value['catid'] == $catid) { ?>class="now"<?php } ?> >
		<i></i>
		<?php if(preg_match('/^(http:\/\/)/', $value['description'])) { ?>
			<a href="<?=  preg_match('/^(http:\/\/)|(^\/)/', $value['description'])?APP_PATH.$value['description']:$value['url'];?>">
		<?php } else { ?>
			<a href="<?=  $value['description']?APP_PATH.$value['description']:$value['url'];?>">
		<?php } ?>
			<?php echo $value['catname'];?>
		</a></dd>
		<?php $n++;}unset($n); ?>
	<?php } ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
</dl>