<?php

defined('IN_ADMIN') or exit('No permission resources.');

include $this->admin_tpl('header', 'admin');

?>
		<div class="pad-lr-10">
            <h2 style="text-align:center; padding-bottom:20px;"><?php echo L('xuanze'); ?></h2>
				<span style="text-align:center">
					<h3><a href="index.php?m=form&c=admin_form&a=yuyue&lan=1">1、<?php echo L('caigou'); ?></a></h3>
					<h3><a href="index.php?m=form&c=admin_form&a=yuyue&lan=2">2、<?php echo L('采购-英文'); ?></a></h3>
					<h3><a href="index.php?m=form&c=admin_form&a=yuyue&lan=3">3、<?php echo L('采购-俄文'); ?></a></h3>
					<h3><a href="index.php?m=form&c=admin_form&a=caigoum">4、<?php echo L('caigoum'); ?></a></h3>
					<h3><a href="index.php?m=form&c=admin_form&a=canzhan">5、<?php echo L('canzhan'); ?></a></h3>
					<h3><a href="index.php?m=form&c=admin_form&a=tezhuang">6、<?php echo L('tezhuang'); ?></a></h3>
					<h3><a href="index.php?m=form&c=admin_form&a=caigou">7、<?php echo L('采购-旧'); ?></a></h3>
				</span>
		</div>
	</body>
</html>