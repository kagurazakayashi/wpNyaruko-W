// JavaScript Document
if (document.getElementById('lrdimg')) {
	lrdimgRight();
}
var btopimgNumber = 0;
imageslode();

function imageslode() {
	var blocktopimg = document.getElementsByName('blocktopimg');
	var blocktopdiv = document.getElementsByName('blocktopdiv');
	for (var i = 0; i < blocktopdiv.length; i++) {
		blocktopimg[i].onload = function() {
			// console.log(btopimgNumber++);
			if (this.complete) {
				lrdimgCenter(this, this.parentNode);
			}
		}
		lrdimgCenter(blocktopimg[i], blocktopdiv[i]);
	}
}

function getsizebyid(imgid,divid) {
	var blocktopimg = document.getElementById(imgid);
	var blocktopdiv = document.getElementById(divid);
	return lrdimgCenter(blocktopimg,blocktopdiv,false);
}

function lrdimgRight() {
	var lrdimg = document.getElementsByName('lrdimg');
	var lanrightdiv = document.getElementsByName('lanrightdiv');
	for (var i = lrdimg.length - 1; i >= 0; i--) {
		var imgwidth = lrdimg[i].naturalWidth;
		var imgheight = lrdimg[i].naturalHeight;
		var imgwh = imgwidth / imgheight;
		var screenwidth = lanrightdiv[i].offsetWidth;
		var screenheight = lanrightdiv[i].offsetHeight;
		var w = 0;
		var h = 0;
		var x = 0;
		var y = 0;

		w = imgwh * screenheight;
		if (w < screenwidth) {
			w = screenwidth;
		}
		x = screenwidth - w;
		h = w / imgwh;
		y = (screenheight - h) / 2;

		lrdimg[i].style.top = y + "px";
		lrdimg[i].style.left = x + "px";
		lrdimg[i].style.width = w + "px";
		lrdimg[i].style.height = h + "px";
	}
}

function lrdimgCenter(blocktopimg, blocktopdiv, echo = true) {
	var imgwidth = blocktopimg.naturalWidth;
	var imgheight = blocktopimg.naturalHeight;
	var imgwh = imgwidth / imgheight;
	var screenwidth = blocktopdiv.offsetWidth;
	var screenheight = blocktopdiv.offsetHeight;
	var ccss = nyarukoplayer_imgcenter(imgwidth, imgheight, screenwidth, screenheight);
	if (echo == false) {
		return ccss;
	}
	blocktopimg.style.top = ccss[1] + "px";
	blocktopimg.style.left = ccss[0] + "px";
	blocktopimg.style.width = ccss[2] + "px";
	blocktopimg.style.height = ccss[3] + "px";
}

function nyarukoplayer_imgcenter(imgwidth, imgheight, screenwidth, screenheight) {
	var x = 0;
	var y = 0;
	var w = 0;
	var h = 0;
	var imgwh = imgwidth / imgheight;
	var cw = screenwidth - imgwidth;
	var ch = screenheight - imgheight;
	var cwh = cw / ch;
	if (cw > ch) {
		w = screenwidth;
		h = w / imgwh;
		y = (screenheight - h) / 2;
	} else {
		h = screenheight;
		w = h * imgwh;
		x = (screenwidth - w) / 2;
	}
	if (imgwh > 1) {
		if (cwh > 1.01 && cwh < imgwh) {
			if (cw < ch) {
				w = screenwidth;
				h = w / imgwh;
				y = (screenheight - h) / 2;
				x = 0;
			} else {
				h = screenheight;
				w = h * imgwh;
				x = (screenwidth - w) / 2;
				y = 0;
			}
		}
	} else {
		if (cwh > imgwh && cwh < 1) {
			if (cw < ch) {
				w = screenwidth;
				h = w / imgwh;
				y = (screenheight - h) / 2;
				x = 0;
			} else {
				h = screenheight;
				w = h * imgwh;
				x = (screenwidth - w) / 2;
				y = 0;
			}
		}
	}
	return [x, y, w, h];
}

function resize(ani = false) {
	ceramictiles_setting["datacount"] = $(".blockbdiv").length;
	ceramictiles_resize(ani);
}
$(window).resize(function() {
	resize(true);
});

function loadmore() {
	var url = window.location.href.split('?');
	paged++;
	var wparg = "";
	if (url.length >= 2) {
		wparg = url[1].split('&')[0];
	}
	url = url[0] + "?" + wparg + "&paged=" + paged + "&data=" + datacount;
	$.ajax({
		url: url,
		global: false,
		type: "GET",
		data: ({}),
		dataType: "html",
		async: false,
		success: function(msg) {
			$("#postsbox").append(msg);
			resize();
			imageslode();
			now_num_pages++;
			if (now_num_pages >= max_num_pages) {
				$("#loadstatus").text("没有更多内容了");
				$("#loadstatus").attr("value", "2");
			} else {
				$("#loadstatus").text("滚动到页面最下方加载更多内容");
				$("#loadstatus").attr("value", "0");
			}
		},
		error: function(msg) {
			$("#loadstatus").text("没有更多内容了");
			$("#loadstatus").attr("value", "2");
		}
	});
}
$(window).scroll(function() {
	var winscrtop = $(window).scrollTop();
	var dochig = $(document).height();
	var winhig = $(window).height();
	if (winscrtop >= (dochig - winhig - 35)) {
		var loadstatus = $("#loadstatus");
		if (loadstatus.attr("value") == "0") {
			loadstatus.attr("value", "1");
			loadstatus.text("正在加载更多信息...");
			loadmore();
			imageslode();
		}
	}
});
function blockbdivclick(selfid,url) {
    var self = $('#blockbdiv'+selfid);
    self.css({"position":"fixed","z-index":"200","padding":"0px","border-radius":"0px"});
    self.animate({
        left:"0px",
        height:"100%",
        width:"100%"
    },500);
    $("body").fadeOut(500,function() {
        window.location.href = url;
    });
}
function blockbdivblur(selfid) {
    var self = $('#blockbdiv'+selfid);
    var selfimg = $('#blocktopimg'+selfid);
    var selfimgdiv = $('#blocktopdiv'+selfid);
    selfimg.stop();
    var frame = getsizebyid('blocktopimg'+selfid, 'blocktopdiv'+selfid);
    selfimg.css({
        "left":frame[0]+"px",
        "top":frame[1]+"px",
        "width":frame[2]+"px",
        "height":frame[3]+"px"
    });
    var newframe = [(frame[0]-(frame[2]*0.1)),(frame[1]-(frame[3]*0.1)),(frame[2]+(frame[2]*0.2)),(frame[3]+(frame[3]*0.2))];
    selfimg.animate({
        "left":newframe[0],
        "top":newframe[1],
        "width":newframe[2],
        "height":newframe[3]
    },500);
}
function blockbdivfocus(selfid) {
    var self = $('#blockbdiv'+selfid);
    var selfimg = $('#blocktopimg'+selfid);
    var selfimgdiv = $('#blocktopdiv'+selfid);
    selfimg.stop();
    var frame = getsizebyid('blocktopimg'+selfid, 'blocktopdiv'+selfid);
    selfimg.animate({
        "left":frame[0],
        "top":frame[1],
        "width":frame[2],
        "height":frame[3],
    },500);
}