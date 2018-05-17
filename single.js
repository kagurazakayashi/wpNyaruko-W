$(window).resize(function() {
	// singleload();
});

function singleload() {
	var scrollpic = $('#scrollpic');
	var singlebdiv = $('#singlebdiv');
	var singleleftdiv = $('#singleleftdiv');
	// var srdtitle = $('#srdtitle');
	var srdcontent = $('#srdcontent');
	singlebdiv.css({
		"width": (scrollpic.width() - 3) + "px"
	});
	// srdtitle.css({
	// 	"max-width": (scrollpic.width() - 293) + "px"
	// });
	srdcontent.css({
		"max-width": (scrollpic.width() - 33) + "px"
	});
	singleleftdiv.css({
		"height": singlebdiv.height() + "px"
	});
}
// singleload();

function contentformat() {
    var texts = $("#pagetext");
    var alltext = texts.html();
    var textlines = alltext.split('\n');
    var spacespan = '<span class="pagetextindent"></span>';
    var noformat = '[noformat]';
    var isnoformat = false;
    var newhtml = "";
    if (textlines[0].length >= noformat.length) {
        if (textlines[0].substr(0,noformat.length) == noformat) {
            isnoformat = true;
            newhtml = alltext.substr(noformat.length,alltext.length-noformat.length);
        }
    }
    if (!isnoformat) {
        for (let line = 0; line < textlines.length; line++) {
			var nowline = textlines[line];
			var nowlinetext = $(nowline).text();
			if (nowlinetext == "" || nowlinetext == " " || nowlinetext == "　") {
				//本行没有正文
			} else {
				var nowlinetype = nowline.replace(/(^\s*)|(\s*$)/g, "").substr(0,2);
				if (nowlinetype == "<p") {
					var nowlinesplit = nowline.split('>');
					var newline = nowlinesplit[0] + '>' + spacespan;
					for (let nlsi = 1; nlsi < nowlinesplit.length; nlsi++) {
						var nowlinespliti = nowlinesplit[nlsi];
						newline += nowlinespliti;
						if (nlsi < nowlinesplit.length-1) newline += '>';
					}
					textlines[line] = newline;
				} else {
					textlines[line] = spacespan + textlines[line];
				}
			}
			// var nowlinetype = nowline.replace(/(^\s*)|(\s*$)/g, "").substr(0,2);
            // if (nowlinetype == "<p") {
            //     var nowlinesplit = nowline.split('>');
            //     var nowlinetype2 = nowlinesplit[1];
            //     if (nowlinetype2.length > 4) {
            //         if (nowlinetype2.substr(0,4) != "<img") {
            //             textlines[line] = nowlinesplit[0] + ">" + spacespan + nowlinetype2 + ">";
            //         }
            //     }
            // } else if (nowlinetype != "" && nowlinetype.substr(0,1) != "<") {
            //     textlines[line] = spacespan + nowline;
            // }
        }
        newhtml = textlines.join('\n');
        newhtml = newhtml.replace(/\n\n/g, '<br/>');
	}
	// console.log(newhtml);
    texts.html(newhtml);
}
contentformat();