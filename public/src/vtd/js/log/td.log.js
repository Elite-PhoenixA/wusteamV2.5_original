$.fn.barrage = function(opt) {
    var _self = $(this);
    var opts = {
        data: [],
        row: 5,
        time: 2500,
        gap: 15,
        ismoseoverclose: true,
    }
    var settings = $.extend({}, opts, opt);
    var M = {}, Obj = {};
    Obj.data = settings.data;
    M.bgColors = ['#f79a3e', '#e66760', '#5382af', '#aea79f', '#37b8af', '#008b5d', '#f0b849', '#499df3', '#5f6c72', '#8c88cd'];
    Obj.arrEle = [];
    M.barrageBox = $('<ul id="thanhdieu-plugin-barrage"></ul>');
    M.timer = null;

    var createView = function() {
        if (Obj.data.length === 0) return;

        var randomIndex = Math.floor(Math.random() * M.bgColors.length);
        var ele = $('<li class="' + Obj.data[0].type + '" style="background-color:' + M.bgColors[randomIndex] + '"><a href="' + Obj.data[0].now_user_link + '" class="img" target="_blank">' + Obj.data[0].avatar + '</a>' + Obj.data[0].content + '</li>');
        var str = Obj.data.shift();
        ele.css('margin-bottom', settings.gap + 'px');
        ele.css('opacity', 1);
        M.barrageBox.append(ele);
        Obj.data.push(str);

        if (M.barrageBox.children().length > settings.row) {
            M.barrageBox.children().eq(0).css('opacity', 0).on('transitionend', function() {
                $(this).remove();
            });
        }
    }

    M.mouseClose = function() {
        settings.ismoseoverclose && (function() {
            M.barrageBox.mouseover(function() {
                clearInterval(M.timer);
                M.timer = null;
            }).mouseout(function() {
                M.timer = setInterval(function() {
                    createView();
                }, settings.time);
            });
        })();
    }

    Obj.close = function() {
        M.barrageBox.remove();
        clearInterval(M.timer);
        M.timer = null;
    }

    Obj.start = function() {
        if (M.timer) return;
        _self.append(M.barrageBox);
        createView();
        M.timer = setInterval(function() {
            createView();
        }, settings.time);
        M.mouseClose();
    }

    return Obj;
}

$.ajax({
    type: "POST",
    url: "/app/module/gadget/data.php",
    success: function(msg) {
        var Obj = $('body').barrage({
            data: '',
            row: 5,
            time: 2500,
            gap: 15,
            ismoseoverclose: true,
        });

        if ($('#thanhdieu-plugin-barrage').length == 0) {
            Obj.start();
        }
    }
});