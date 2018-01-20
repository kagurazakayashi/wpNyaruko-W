var menus = ['','','',''];
var menupage = false;
$(document).ready(function(){
    menupager();
    menupagecp();
    $("#rightbottommenuswitch").click(function() {
        menupagecp();
        rightbottommenuswitchclick();
    });
    $("#bodyhidden").fadeOut(500,null);
});
function rightbottommenuswitchclick() {
    var rightbottommenuswitch = $("#rightbottommenuswitch");
    var rightbottommenubox = $("#rightbottommenubox");
    var rightbottommenubtns = $("#rightbottommenuboxf li");
    if (rightbottommenubox.attr("value") == "0") {
        rightbottommenubox.attr("value","1");
        rightbottommenuswitch.stop();
        var animation = "rightbottommenuopen 0.4s forwards";
        rightbottommenuswitch.css({"animation":animation,"-webkit-animation":animation,"-moz-animation":animation,"-o-animation":animation,"-ms-animation":animation});
        $.each(rightbottommenubtns, function(i, item) {
            var speed = 150 * (rightbottommenubtns.length - i);
            $(this).stop();
            $(this).fadeIn(speed);
        });
    } else {
        rightbottommenubox.attr("value","0");
        rightbottommenuswitch.stop();
        var animation = "rightbottommenuclose 0.3s forwards";
        rightbottommenuswitch.css({"animation":animation,"-webkit-animation":animation,"-moz-animation":animation,"-o-animation":animation,"-ms-animation":animation});
        $.each(rightbottommenubtns, function(i, item) {
            var speed = 150 * i;
            $(this).stop();
            $(this).fadeOut(speed);
        });
    }
}
function menupager() {
    menust = [$("#mainmenuwpbox1").html(),$("#mainmenuwpbox1b").html(),$("#mainmenuwpbox2").html(),$("#mainmenuwpbox2b").html()];
    for (let i = 0; i < menust.length; i++) {
        var nowmenuhtml = menust[i];
        nowmenuhtml = nowmenuhtml.replace('href="#mainmenupage#"','onclick="menupagec();"');
        // nowmenuhtml = nowmenuhtml.replace('#mainmenupagenext#','<span class="mainmenupageicon mainmenupagenext"></span>');
        // nowmenuhtml = nowmenuhtml.replace('#mainmenupageprev#','<span class="mainmenupageicon mainmenupageprev"></span>');
        menus[i] = nowmenuhtml;
    }
    $("#mainmenuwpbox1b").remove();
    $("#mainmenuwpbox2b").remove();
}
function menupagecp() {
    menupage = false;
    $("#mainmenuwpbox1").html(menus[0]);
    $("#mainmenuwpbox2").html(menus[2]);
}
function menupagec() {
    menupage = !menupage;
    var mainmenuwpboxs = [$("#mainmenuwpbox1"),$("#mainmenuwpbox2")];
    var atime = 300;
    var rightbottommenubox = $("#rightbottommenubox");
    if (rightbottommenubox.attr("value") == "0") {
        mainmenuwpboxs[0].fadeOut(atime,function() {
            if (menupage) {
                mainmenuwpboxs[0].html(menus[1]);
            } else {
                mainmenuwpboxs[0].html(menus[0]);
            }
            mainmenuwpboxs[0].fadeIn(atime);
        });
    } else {
        // mainmenuwpboxs[1].fadeOut(atime,function() {
            if (menupage) {
                mainmenuwpboxs[1].html(menus[3]);
            } else {
                mainmenuwpboxs[1].html(menus[2]);
            }
            // mainmenuwpboxs[1].fadeIn(atime);
        // });
        rightbottommenubox.attr("value","0");
        rightbottommenuswitchclick();
    }
}
function searchclick() {
    var searchkeyword = $("#searchkeyword");
    if (searchkeyword.attr("value") == "搜索") {
        searchkeyword.attr("value","");
        searchkeyword.css("color","black");
    }
}
function searchblur() {
    var searchkeyword = $("#searchkeyword");
    if (searchkeyword.attr("value") == "") {
        searchkeyword.attr("value","搜索");
        searchkeyword.css("color","gray");
    }
}
function searchfocus() {
    searchclick();
}
function blockbdivin(self) {
    self.animate({
        "height":0
    },500);
}
function showprivacy() {
    if ($(".yashiprivacy").length == 0) {
        $("body").append("<div class='yashiprivacy'></div>");
        $(".yashiprivacy").load('privacy.html .yashiprivacyw');
    }
}