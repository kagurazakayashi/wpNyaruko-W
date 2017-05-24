$(document).ready(function() {
	loadscreen();
	// $(".commitbgDiv li").remove();
	// $(".commitbgDiv ul").remove();
});
$(window).resize(function() {
	loadscreen(true);
});

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

}