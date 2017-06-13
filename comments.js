$(document).ready(function() {
	loadscreen();
	// $(".commitbgDiv li").remove();
	// $(".commitbgDiv ul").remove();
	$("#commentd").keydown(function() {
		commentresize();
		if (event.keyCode == 13 || event.charCode == 13) {
			setTimeout(function(){
				$("#commentd").text($("#commentd").text());
				commentsubmit();
			}, 100);
		}
	});
});
$(window).resize(function() {
	loadscreen(true);
});


function to_reply(commentID,author,author64) {
	//https://www.yoooooooooo.com/yashi/?page_id=5302&replytocom=195#respond
	$("#commentoneto").val(commentID);
	$("#commentonename").val(author64);
	document.forms['commentone'].submit();

	var nNd='@'+author+':';
	var myField; 
	if (document.getElementById('comment') && document.getElementById('comment').type == 'textarea') { 
	myField = document.getElementById('comment'); 
	} else { 
	return false; 
	} 
	if (document.selection) { 
	myField.focus(); 
	sel = document.selection.createRange(); 
	sel.text = nNd; 
	myField.focus(); 
	} 
	else if (myField.selectionStart || myField.selectionStart == '0') { 
	var startPos = myField.selectionStart; 
	var endPos = myField.selectionEnd; 
	var cursorPos = endPos; 
	myField.value = myField.value.substring(0, startPos) 
	+ nNd 
	+ myField.value.substring(endPos, myField.value.length); 
	cursorPos += nNd.length; 
	myField.focus(); 
	myField.selectionStart = cursorPos; 
	myField.selectionEnd = cursorPos; 
	} 
	else { 
	myField.value += nNd; 
	myField.focus();
	}
}

function loadscreen(res = false) {
	var winWidth = document.body.clientWidth;
	var tl = $(".tl");
	var ls = $(".ls");
	var commitname = $(".commitname");
	var committime = $(".committime");
	for (var i = tl.length - 1; i >= 0; i--) {
		var lsw = commitname[i].offsetWidth + committime[i].offsetWidth;
		if (ls[i].offsetWidth < lsw) {
			tl[i].style.width = (lsw + 30) + "px";
		} else {
			tl[i].style.width = ls[i].offsetWidth + "px";
		}
	}

	var trRight = $(".trRight");
	var rs = $(".rs");
	if (res) {
		for (var i = trRight.length - 1; i >= 0; i--) {
			trRight[i].style.width = rs[i].offsetWidth + "px";
		}
	} else {
		for (var i = trRight.length - 1; i >= 0; i--) {
			var lsw = commitname[i].offsetWidth + committime[i].offsetWidth;
			if (rs[i].offsetWidth > lsw) {
				if ((rs[i].offsetWidth + 40) > winWidth) {
					trRight[i].style.width = (rs[i].offsetWidth - 100) + "px";
				} else {
					trRight[i].style.width = rs[i].offsetWidth + "px";
				}
			} else {
				trRight[i].style.width = (trRight[i].offsetWidth + 30) + "px";
			}
		}
	}
	var newls = $("#newls");
	// $("#comment").width(newls.width());
	$("#newcellline").height(newls.height()+10);
	$("#sentcommentbox").width(80+newls.width());
}
function commentresize() {
	$("#sentcommentbox").width(80+$("#newls").width());
}
function cellmousemove(self) {
	self.html("<b>点击回复</b>");
	self.css({'background-color':'rgba(0, 0, 0, 0.5)','line-height':(self.height()+'px')});
}
function cellmouseout(self) {
	self.css('background-color','transparent');
	self.html("");
}
function cellclick(self,comment_ID,comment_author) {
	console.log(comment_ID+"||"+comment_author);
}
function commentsubmit() {
	var commentd = $("#commentd");
	if (commentd.text() == "") {
		return;
	}
	commentd.attr("contenteditable","false");
	var commentstr = commentd.html().replace(/<div([^<>]*)>([^<>]*)<\/div>/gi, '<br/>$2');
	$("#comment").val(commentstr);
	document.forms['commentform'].submit();
}
function emailonblur() {
	var email = $("#email").val();
	if (email == undefined) {
		return;
	}
	var comsimg = $("#comsimg");
	var emailurl = "";
	if (email == "") {
		emailurl = comsimg.attr("none");
		$("#comsimga").attr("href","");
	} else {
		$("#comsimga").attr("href","https://cn.gravatar.com/"+hex_md5(email));
		var pxy = comsimg.attr("pxy");
		if (pxy == "") {
			emailurl = "https://cn.gravatar.com/avatar/"+hex_md5(email)+"?s=64";
		} else {
			emailurl = pxy+"&mail="+email+"&size=64";
		}
	}
	comsimg.attr("src",emailurl);
}
//type=1-40;errorcorrection=L,M,Q,H;mode=Numeric,Alphanumeric,Byte,Kanji;imgtype=tab,svg,img
//<div id="qrview" class="qrview"></div><script type="text/javascript">qr();</script>
function qr(text=window.location.href,innerid="qrview",imgtype="tab",type="10",errorcorrection="L",mode="Byte") {
	var qrgen = qrcode(type, errorcorrection);
	qrgen.addData(text, mode);
	qrgen.make();
	var innerdiv = document.getElementById(innerid);
	if (imgtype == "tab") {
		innerdiv.innerHTML = qrgen.createTableTag();
	}
	if (imgtype == "svg") {
		innerdiv.innerHTML = qrgen.createSvgTag();
	}
	if (imgtype == "img") {
		innerdiv.innerHTML = qrgen.createImgTag();
	}
}