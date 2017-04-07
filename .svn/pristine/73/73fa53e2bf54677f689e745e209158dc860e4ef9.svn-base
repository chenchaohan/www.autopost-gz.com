$(function(){
	window.onscroll=function()
{
//	var oDiv=document.getElementById('right_fd')
//	var scrollTop=document.documentElement.scrollTop||document.body.scrollTop;
//	//oDiv.style.top=document.documentElement.clientHeight-oDiv.offsetHeight+scrollTop+'px';
//	startMove(parseInt((document.documentElement.clientHeight-oDiv.offsetHeight)/2+scrollTop))
}
var timer=null;
function startMove(iTarget)
{
	var oDiv=document.getElementById('right_fd')
	clearInterval(timer);
	timer=setInterval(function(){
		var speed=(iTarget-oDiv.offsetTop)/6
		speed=speed>0?Math.ceil(speed):Math.floor(speed)
		if(oDiv.offsetTop==iTarget)
		{
			clearInterval(timer)	
		}
		else
		{
			oDiv.style.top=oDiv.offsetTop+speed+'px';	
		}
		},30)
}
$("#guanzhu").mouseover(function(){
	$("#sao").css("display","block");
	$("#guanzhu").css("display","none");
	})
$("#sao").mouseout(function(){
	$("#guanzhu").css("display","block");
	$("#sao").css("display","none");
	})
})
