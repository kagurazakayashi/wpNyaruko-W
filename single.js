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
    var firstline = true;
    var spacespan = '<span class="pagetextindent"></span>';
    var noformats = ["[noformat]","[noformat=all]","<script","<link","[noformat=img]","[noformat=indent]","[nyarukotabloid]"];
    var isnoformat = false;
    var newhtml = "";
    // console.log("textlines[0]",textlines[0]);
    for (let noformatj = 2; noformatj <= 3; noformatj++) {
        const noformat = noformats[noformatj];
        if (textlines[0].length >= noformat.length && textlines[0].substr(0,noformat.length) == noformat) {
            console.log(noformat);
            isnoformat = true;
            break;
        }
    }
    if (!isnoformat) {
        for (let noformati = 0; noformati < noformats.length; noformati++) {
            const noformat = noformats[noformati];
            if (textlines[0].length >= noformat.length && textlines[0].substr(0,noformat.length) == noformat) {
                console.log(noformat);
                isnoformat = true;
                newhtml = alltext.substr(noformat.length,alltext.length-noformat.length);
                break;
            }
        }
    }
    if (textlines[0].length >= noformats[4].length && textlines[0].substr(0,noformats[4].length) == noformats[4]) {
        console.log(noformats[4]);
        isnoformat = false;
    }
    if (textlines[0].length >= noformats[5].length && textlines[0].substr(0,noformats[5].length) == noformats[5]) {
        console.log(noformats[5]);
        spacespan = "";
    }
    if (!isnoformat) {
        for (let line = 0; line < textlines.length; line++) {
            var nowline = textlines[line];
            var nowlinetype = nowline.replace(/(^\s*)|(\s*$)/g, "").substr(0,2);
            //console.log(line,nowlinetype,nowline);
            if (nowlinetype == "<i" || nowlinetype == "<s" || nowlinetype == "<d" || nowlinetype == "<v" || nowlinetype == "") {
                if (firstline && nowlinetype != "") {
                    if (firstline) {
                        if (nowlinetype == "<d" || nowlinetype == "<p") {
                            $("#sortingtotext").css("height","20px");
                        } else if (nowlinetype != "") {
                            $("#sortingtotext").css("height","0px");
                        }
                        firstline = false;
                    }
                }
            } else  {
                firstline = false;
            }
            if (nowlinetype == "<p") {
                var nowlinesplit = nowline.split('>');
                var nowlinetype2 = nowlinesplit[1];
                if (nowlinetype2.length > 4) {
                    if (nowlinetype2.substr(0,4) != "<img") {
                        textlines[line] = nowlinesplit[0] + ">" + spacespan + nowlinetype2 + ">";
                        if (nowlinesplit.length > 2) {
                            for (let lineti = 2; lineti < nowlinesplit.length; lineti++) {
                                const nowospan = nowlinesplit[lineti];
                                if (nowospan != "") textlines[line] += nowospan + ">";
                            }
                        }
                    }
                }
            } else if (nowlinetype != "" && nowlinetype.substr(0,1) != "<") {
                textlines[line] = spacespan + nowline;
            }
        }
        newhtml = textlines.join('\n');
        newhtml = newhtml.replace(/\n\n/g, '<br/>');
        texts.html(newhtml);
        if (!(textlines[0].length >= noformats[2].length && textlines[0].substr(0,noformats[2].length) == noformats[2])) {
            $("#pagetext img").each(function(){
                $(this).addClass("pagetext_autosizeimg");
            });
        }
    } else {
        texts.html(newhtml);
    }
}
contentformat();