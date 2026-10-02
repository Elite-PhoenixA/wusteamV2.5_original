(function() {
    if (typeof WeixinJSBridge == "object" && typeof WeixinJSBridge.invoke == "function") {
        handleFontSize();
    } else {
        if (document.addEventListener) {
            document.addEventListener("WeixinJSBridgeReady", handleFontSize, false);
        } else if (document.attachEvent) {
            document.attachEvent("WeixinJSBridgeReady", handleFontSize);
            document.attachEvent("onWeixinJSBridgeReady", handleFontSize);
        }
    }
    function handleFontSize() {
        WeixinJSBridge.invoke('setFontSizeCallback', { 'fontSize' : 0 });
        WeixinJSBridge.on('menu:setfont', function() {
            WeixinJSBridge.invoke('setFontSizeCallback', { 'fontSize' : 0 });
        });
    }
})();
var docSize;
(function(doc, win) {
	var docEl = doc.documentElement,
	isIOS = navigator.userAgent.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/),
	dpr = isIOS ? Math.min(win.devicePixelRatio, 3) : 1,
	dpr = window.top === window.self ? dpr : 1,
	dpr = 1,
	scale = 1 / dpr,
	resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize';
	docEl.dataset.dpr = dpr;
	var metaEl = doc.createElement('meta');
	metaEl.name = 'viewport';
	metaEl.content = 'initial-scale=' + scale + ',maximum-scale=' + scale + ', minimum-scale=' + scale;
	docEl.firstElementChild.appendChild(metaEl);
	var recalc = function() {
		var width = docEl.clientWidth;
		if (width / dpr > 750) {
			width = 750 * dpr;
		}
		docEl.style.fontSize = 100 * (width / 750) + 'px';
		docSize = 100 * (width / 750);
	};
	recalc()
	if (!doc.addEventListener) return;
	win.addEventListener(resizeEvt, recalc, false);
})(document, window);

function httipsFun(tex,type){
	if($('.httips').length>0){
		return false
	}
	$('body').append('<div class="httips"><span>'+tex+'</span></div><div class="httipsbg"></div>');
	$('.httipsbg').height($('body,html').height())
	if(type != true){
		setTimeout(function(){
			$('.httips').remove();
			$('.httipsbg').remove()
		},1000)
	};
	$('.httipsbg').on('touchmove', function(e){
		e.preventDefault();
		e.stopPropagation();
	});
}

function httipsRemove(){
	$('.httips').remove();
	$('.httipsbg').remove();
}
function httipsbgFun(){
	$('body').append('<div class="httipsbgajax"></div>');
	$('.httipsbgajax').height($('body,html').height())
	$('.httipsbgajax').on('touchmove',function(e){
		e.preventDefault();
		e.stopPropagation();
	});
}
function httipsbgRemove(){
	$('.httipsbgajax:last').remove();
}

function addLoadEvent(func){
	var oldonload = window.onload;
	if(typeof window.onload != 'function'){
		window.onload= func;
	}else{
		window.onload =function (){
			oldonload();
			func();
		}
	}
}