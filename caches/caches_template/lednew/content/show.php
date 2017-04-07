<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>

<link href="<?php echo LED_PATH;?>css/news.css?v=1" rel="stylesheet" />

<!--main-->
<div class="container comm about ">
<div class="detail ">
            <!--lo_linksstart-->
           <?php include template("content","position_local"); ?>

            <div style="clear: both;"></div>
            <!--lo_linksend-->
            <div class="lt">
               <?php include template("content","left_box"); ?>
            </div>
            <div class="rt">
                <h4><?php echo $title;?></h4>
                <div id="divNewsDate" style="text-align: center; margin-top: 10px;">
                   <?php if($copyfrom) { ?> <p>来源：<?php echo $copyfrom;?></p><?php } ?>
					 <p><?php if($languageId == 1) { ?>发布日期<?php } else { ?>Release Date<?php } ?>：<?php echo date('Y-m-d',strtotime($inputtime));?></p>
                </div>
				
                <div id="divContent" class="content_c" style="margin-top: 20px;">
                	<?php echo $content;?>
                </div>

            </div>

        <div style="clear: both;"></div>
    </div>
</div>


<?php include template("content","footer"); ?>