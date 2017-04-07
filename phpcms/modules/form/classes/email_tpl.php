<?php

defined('IN_PHPCMS') or exit('No permission resources.');

//led预登记邮件发送模板


$EMAIL_TPL = array(

//////////////////////////春季邮件模板/////////////////////////////////////////////////////////////////////////
	'1'=>"<!doctype html>
<html lang='en'>
 <head>
  <meta charset='UTF-8'>
  <title>观众网上预登记确认函Visitor Online Pre-Registration Confirmation</title>
 </head>
 <body>
  <style type='text/css'>
		body{font-family:Arial;margin:0;padding:0;font-size:15px;}
		p{margin:0;padding:0;}
		.content{width:610px;margin:0 auto;line-height: 20px;position: relative;}
		.center{text-align:center;}
		table.coll {width:100%;border-collapse: collapse;border-color:#000;}
		table.coll td{border-color:#000;padding:10px;width:50%;}
		table.date td{padding:2px 25px;padding-left:0px;}
		.footer_txt{line-height:25px;padding:10px 5px;background-color:#23b6bc;color:#fff;text-align:center;}
		.footer_txt a{text-decoration:#fff;color:#fff;}
		.rest_btn{display:none;}
	</style>
	<div class='wrapper'>
		<div class='content'>
			<div class='center'>
				<img src='http://www.isle.org.cn/statics/led/images/isle_mail_logo.jpg'  />	
			</div>
			<div style='margin-top:60px;'>
			<p style='margin-bottom:5px;'><b>尊敬的客户</b></p>
感谢您预登记参加2017广州国际广告标识及展览会（春季展），请保留网上预登记函并打印。届时请凭纸质版到展会现场的预登记通道换领参观证，即可快速入场参观！
			</div>
			<br/>
			<p style='margin-bottom:20px;line-height: 20px;'>
			Dear Sir / Madam<br/>
Thank you for pre-registering to attend International Signs & LED Exhibition, Guangzhou 2017. Please save well with this confirmation letter. And check in at our on-site fast track with your printed confirmation letter during the show.
			</p>
			<div style='margin-bottom:20px;'>
				<table class='coll center' border='1'>
				<tr>
					<td>姓名<br><b>Name</b></td>
					<td>$name</td>
				</tr>
				<tr>
					<td>预登记号<br><b>Pre-registration Number</b></td>
					<td>$suijima</td>
				</tr>
				</table>
			</div>
			<p><b>展会时间 Exhibition Time：</b></p>
			<table class='date'>
				<tr>
					<td>二月 February 15-17</td>
					<td>9:30am—5:30pm</td>
				</tr>
				<tr>
					<td>二月 February 18</td>
					<td>9:30am—2:00pm</td>
				</tr>
			</table>
			<div style='margin-top:20px;margin-bottom:25px;'>
			<b>展会地点 Exhibition Venue：</b>
			<p>中国广州市海珠区阅江中路382号广交会展馆B区</p>
			<p>Area B, Canton Fair Complex,No. 382,Yuejiang Zhong Road,Guangzhou,China</p>
			</div>

			<p><img src='http://www.isle.org.cn/statics/led/images/foot_banner.jpg'  /></p>
      
			<div class='center' style='margin: 15px 0;'>
				<img src='http://www.isle.org.cn/statics/led/images/footer_logo.jpg'  />	
			</div>
			<div class='footer_txt'>
				<p>更多资讯，请浏览官网Fore more details, please visit: www.isle.org.cn </p>
				<p>参观咨询电话Contact us: 020-89268257 /89268292</p>
			</div>
			<div class='rest_btn' style='text-align: center; position: absolute; margin-left: -80px; top: 60px;'>
				<a href='http://www.isle.org.cn/'><img src='http://www.isle.org.cn/statics/led/images/rest_btn.jpg' style='width: 80px'></a>
			</div>
		</div>
	</div>
 </body>
</html>",


//////////////////////////秋季邮件模板/////////////////////////////////////////////////////////////////////////
	'2'=>"<!doctype html>
<html lang='en'>
 <head>
  <meta charset='UTF-8'>
  <title>观众网上预登记确认函Visitor Online Pre-Registration Confirmation</title>
 </head>
 <body>
  <style type='text/css'>
		body{font-family:Arial;margin:0;padding:0;font-size:15px;}
		p{margin:0;padding:0;}
		.content{width:610px;margin:0 auto;line-height: 20px;position: relative;}
		.center{text-align:center;}
		table.coll {width:100%;border-collapse: collapse;border-color:#000;}
		table.coll td{border-color:#000;padding:10px;width:50%;}
		table.date td{padding:2px 25px;padding-left:0px;}
		.footer_txt{line-height:25px;padding:10px 5px;background-color:#23b6bc;color:#fff;text-align:center;}
		.footer_txt a{text-decoration:#fff;color:#fff;}
		.rest_btn{display:none;}
	</style>
	<div class='wrapper'>
		<div class='content'>
			<div class='center'>
				<img src='http://www.isle.org.cn/statics/led/images/isle_mail_logo.jpg'  />	
			</div>
			<div style='margin-top:60px;'>
			<p style='margin-bottom:5px;'><b>尊敬的客户</b></p>
感谢您预登记参加2016广州国际广告标识（秋季）展览会，请保留网上预登记函并打印。届时请凭纸质版到展会现场的预登记通道换领参观证，即可快速入场参观！
			</div>
			<br/>
			<p style='margin-bottom:20px;line-height: 20px;'>
			Dear Sir / Madam<br/>
Thank you for pre-registering to attend 2016 Guangzhou International Signs Exhibition. Please save well with this confirmation letter. And check in at our on-site fast track with your printed confirmation letter during the show.
			</p>
			<div style='margin-bottom:20px;'>
				<table class='coll center' border='1'>
				<tr>
					<td>姓名<br><b>Name</b></td>
					<td>$name</td>
				</tr>
				<tr>
					<td>预登记号<br><b>Pre-registration Number</b></td>
					<td>$suijima</td>
				</tr>
				</table>
			</div>
			<p><b>展会时间 Exhibition Time：</b></p>
			<table class='date'>
				<tr>
					<td>七月 July 22-23</td>
					<td>9:30am —5:30 pm</td>
				</tr>
				<tr>
					<td>七月 July 24</td>
					<td>9:30am —2:00 pm</td>
				</tr>
			</table>
			<div style='margin-top:20px;margin-bottom:25px;'>
			<b>展会地点 Exhibition Venue：</b>
			<p>中国广州市海珠区阅江中路382号广交会展馆B区</p>
			<p>Area B, Canton Fair Complex,No. 382,Yuejiang Zhong Road,Guangzhou,China</p>
			</div>

			<p><img src='http://www.isle.org.cn/statics/led/images/foot_banner.jpg'  /></p>
      
			<div class='center' style='margin: 15px 0;'>
				<img src='http://www.isle.org.cn/statics/led/images/footer_logo.jpg'  />	
			</div>
			<div class='footer_txt'>
				<p>更多资讯，请浏览官网Fore more details, please visit: www.isle.org.cn </p>
				<p>参观咨询电话Contact us: 020-89268257 /89268292</p>
			</div>
			<div class='rest_btn' style='text-align: center; position: absolute; margin-left: -80px; top: 60px;'>
				<a href='http://www.isle.org.cn/'><img src='http://www.isle.org.cn/statics/led/images/rest_btn.jpg' style='width: 80px'></a>
			</div>
		</div>
	</div>
 </body>
</html>",


//////////////////////////春秋季邮件模板/////////////////////////////////////////////////////////////////////////
	'3'=>"<!doctype html>
<html lang='en'>
 <head>
  <meta charset='UTF-8'>
  <title>观众网上预登记确认函Visitor Online Pre-Registration Confirmation</title>
 </head>
 <body>
  <style type='text/css'>
		body{font-family:Arial;margin:0;padding:0;font-size:15px;}
		p{margin:0;padding:0;}
		.content{width:610px;margin:0 auto;line-height: 20px;position: relative;}
		.center{text-align:center;}
		table.coll {width:100%;border-collapse: collapse;border-color:#000;}
		table.coll td{border-color:#000;padding:10px;width:50%;}
		table.date td{padding:2px 15px;padding-left:0px;}
		.footer_txt{line-height:25px;padding:10px 5px;background-color:#23b6bc;color:#fff;text-align:center;}
		.footer_txt a{text-decoration:#fff;color:#fff;}
		.rest_btn{display:none;}
	</style>
	<div class='wrapper'>
		<div class='content'>
			<div class='center'>
				<img src='http://www.isle.org.cn/statics/led/images/isle_mail_logo.jpg'  />	
			</div>
			<div style='margin-top:60px;'>
			<p style='margin-bottom:5px;'><b>尊敬的客户</b></p>
感谢您预登记参加2016广州国际广告标识（秋季）展览会、2017广州国际广告标识及LED展览会（春季展），请保留网上预登记函并打印。届时请凭纸质版到展会现场的预登记通道换取参观证，获取快速入场参观！
			</div>
			<br/>
			<p style='margin-bottom:20px;line-height: 20px;'>
			Dear Sir / Madam<br/>
Thank you for pre-registering to attend 2016 Guangzhou International Signs Exhibition (Autumn), 2017 International Signs & LED Exhibition, Guangzhou. Please save well with this confirmation letter. And check in at our on-site fast track with your printed confirmation letter during the show.
			</p>
			<div style='margin-bottom:20px;'>
				<table class='coll center' border='1'>
				<tr>
					<td>姓名<br><b>Name</b></td>
					<td>$name</td>
				</tr>
				<tr>
					<td>预登记号<br><b>Pre-registration Number</b></td>
					<td>$suijima</td>
				</tr>
				</table>
			</div>
			<p><b>展会时间 Exhibition Time：</b></p>
			<table class='date'>
				<tr>
					<td colspan=2>秋季展 Autumn Edition</td>
					<td colspan=2>春季展 Spring Edition</td>
				</tr>
				<tr>
					<td>七月 July 22-23, 2016</td>
					<td>9:30am - 5:30 pm</td>

					<td>二月February 15-17,2017</td>
					<td>9:30am - 5:30 pm</td>
				</tr>
				<tr>
					<td>七月 July 24, 2016</td>
					<td>9:30am - 2:00 pm</td>

					<td>二月February 18, 2017</td>
					<td>9:30am - 2:00 pm</td>
				</tr>
			</table>
			<div style='margin-top:20px;margin-bottom:25px;'>
			<b>展会地点 Exhibition Venue：</b>
			<p>中国广州市海珠区阅江中路382号广交会展馆B区</p>
			<p>Area B, Canton Fair Complex,No. 382,Yuejiang Zhong Road,Guangzhou,China</p>
			</div>

			<p><img src='http://www.isle.org.cn/statics/led/images/foot_banner.jpg'  /></p>
      
			<div class='center' style='margin: 15px 0;'>
				<img src='http://www.isle.org.cn/statics/led/images/footer_logo.jpg'  />	
			</div>
			<div class='footer_txt'>
				<p>更多资讯，请浏览官网Fore more details, please visit: www.isle.org.cn </p>
				<p>参观咨询电话Contact us: 020-89268257 /89268292</p>
			</div>
			<div class='rest_btn' style='text-align: center; position: absolute; margin-left: -80px; top: 60px;'>
				<a href='http://www.isle.org.cn/'><img src='http://www.isle.org.cn/statics/led/images/rest_btn.jpg' style='width: 80px'></a>
			</div>
		</div>
	</div>
 </body>
</html>"

,











);

