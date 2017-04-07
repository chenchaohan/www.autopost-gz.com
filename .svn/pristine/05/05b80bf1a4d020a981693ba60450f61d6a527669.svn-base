/**
 * jQuery插件 滚动效果的实现
 */
(function (jQuery) {
	jQuery.fn.extend({
		marquee:function (o) {
			var it = this,
					d = o.direction || 'left', //滚动方向 默认向左
					s = o.speed || 30, //速度 默认30毫秒
					mar = jQuery(it),
					mp1 = jQuery(it).children(0).attr({id:"mp1"}),
					marqueeFunc = getMarquee(d),
					marRun = marqueeFunc ? setInterval(marqueeFunc, s) : function () {
						return false;
					};//开始滚动
			//鼠标悬停事件
			jQuery(it).hover(function () {
				clearInterval(marRun);
			}, function () {
				marRun = setInterval(marqueeFunc, s);
			})
			/*生成滚动函数
			 *1.判断方向 *2.装载CSS *3.判断需不需要滚动 *4.构造函数
			 */
			function getMarquee(d) {
				var marqueeFunc;
				switch (d) {
					//水平向右
					case "right":
						mar.addClass("plus-mar-left");
						var liHeight = mar[0].offsetHeight;
						mar.css({"line-height":liHeight + "px"});
						if (mp1[0].offsetWidth <= mar[0].offsetWidth) return false;
						var mp2 = mp1.clone().attr({id:"mp2"}).appendTo(mar);
						marqueeFunc = function () {
							if (mar[0].scrollLeft <= 0) {
								mar[0].scrollLeft += mp2[0].offsetWidth;
							} else {
								mar[0].scrollLeft--;
							}
						}
						break;
					case "top":  
						mar.addClass("plus-mar-top");  
						if (mp1.outerHeight() <= mar.outerHeight()) return false;  
						var mp2 = mp1.clone().attr({id:"mp2"}).appendTo(mar);  
						marqueeFunc = function () {  
							var scrollTop = mar[0].scrollTop;  
							if (mp1[0].offsetHeight > scrollTop) {  
								mar[0].scrollTop = scrollTop + 1;  
							} else {  
								mar[0].scrollTop = 0;  
							}  
						}  
						break;  
					default:
					{
						marqueeFunc = null;
						alert("滚动插件：传入的参数{direction}有误！");
					}
				}
				return marqueeFunc;
			}
		}
	})
})(jQuery);