$(document).ready(function() {
	loadscreen();
	// $(".commitbgDiv li").remove();
	// $(".commitbgDiv ul").remove();
	$("#comment").keydown(function() {
	console.log("RRRRR");
	commentresize();
});
});
$(window).resize(function() {
	loadscreen(true);
});


function to_reply(commentID,author) {
	console.log("执行回复"+commentID+"给"+author);
	//https://www.yoooooooooo.com/yashi/?page_id=5302&replytocom=195#respond
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