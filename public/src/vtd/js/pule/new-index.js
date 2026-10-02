$(function(){
	$.fn.myScroll = function(speed){
		var $_this = $(this);

		var myScrollObj = {
			isAnimating : false,
			pageNum : 0,
			stop : false,
			getLis : function(){
				return $_this.children("li");
			},
			getLiSize : function(){
				return this.getLis().length;
			},
			goToPart : function(n){
				var _t = this,
				$lis = _t.getLis(), 
				$firstLi = $lis.eq(0),
				height = $firstLi.height(),
				newMarginTop = n*height,
				$showLi = $lis.eq(n),
				$isOnLi = $_this.find(".on");
				if(_t.isAnimating || _t.stop || n >= _t.getLiSize() || n < 0){return ;}
				_t.isAnimating = true;
				$showLi.trigger("beginLoad");
				$isOnLi.trigger("beginLeave");
				$firstLi.animate({
					"marginTop" : -newMarginTop+"px"
				},speed,"swing",function(){
					$isOnLi.trigger("LeaveEnd").removeClass("on");
					$showLi.addClass("on").trigger("LoadEnd");
					_t.isAnimating = false;
					_t.pageNum = n;
				});
			},
			preventScroll : function(){
				this.stop = true;
			},
			resetScroll : function(){
				this.stop = false;
			},
			getNowIndex : function(){
				return $_this.find(".on").index();
			},
			next: function(){
				var index = this.getNowIndex();
				this.goToPart(index+1);
			},
			prev: function(){
				var index = this.getNowIndex();
				this.goToPart(index-1);
			}
		};

		$_this.bind("mousewheel",function(evt,delta){
			var dir = delta > 0 ? -1 : 1, 
			$nowLi = $_this.children(".on"),
			index = $nowLi.index() + dir;
			myScrollObj.goToPart(index);
		});

		$(window).resize(function(){
			var index = $(".on").index(),
			$firstLi = myScrollObj.getLis().eq(0),
			height = $(window).height();

			$firstLi.css("marginTop",-height*index+"px");
		});
		return myScrollObj;
	}
});
(function($){
    $.fn.myScroll = function(options){
    var defaults = {
        speed:40, 
        rowHeight:24 
    };
    var opts = $.extend({}, defaults, options),intId = [];

    function marquee(obj, step){
    
        obj.find("ul").animate({
            marginTop: '-=1'
        },0,function(){
                var s = Math.abs(parseInt($(this).css("margin-top")));
                if(s >= step){
                    $(this).find("li").slice(0, 1).appendTo($(this));
                    $(this).css("margin-top", 0);
                }
            });
        }
        
        this.each(function(i){
            var sh = opts["rowHeight"],speed = opts["speed"],_this = $(this);
            intId[i] = setInterval(function(){
                if(_this.find("ul").height()<=_this.height()){
                    clearInterval(intId[i]);
                }else{
                    marquee(_this, sh);
                }
            }, speed);

            _this.hover(function(){
                clearInterval(intId[i]);
            },function(){
                intId[i] = setInterval(function(){
                    if(_this.find("ul").height()<=_this.height()){
                        clearInterval(intId[i]);
                    }else{
                        marquee(_this, sh);
                    }
                }, speed);
            });       
        });
    }
})(jQuery);
$('.elseListbox').myScroll({
        speed:50,
        rowHeight:47
    })