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
function textboxsethtml(texts,newhtml) {
    if (newhtml != "") texts.html(newhtml);
}
function contentformat() {
    var texts = $("#pagetext");
    var alltext = texts.html();
    var textlines = alltext.split('\n');
    var firstline = true;
    var spacespan = '<span class="racing_indent"></span>';
    var noformats = ["[noformat]","[noformat=all]","<script","<link","[noformat=img]","[noformat=indent]","[nyarukotabloid]"];
    var isnoformat = false;
    var newhtml = "";
    var codemode = false;
    for (let noformatj = 2; noformatj <= 3; noformatj++) {
        const noformat = noformats[noformatj];
        if (textlines[0].length >= noformat.length && textlines[0].substr(0,noformat.length) == noformat) {
            isnoformat = true;
            break;
        }
    }
    if (!isnoformat) {
        for (let noformati = 0; noformati < noformats.length; noformati++) {
            const noformat = noformats[noformati];
            if (textlines[0].length >= noformat.length && textlines[0].substr(0,noformat.length) == noformat) {
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
    var debug_noformat = window.location.hash == "#noformat" ? true : false;
    var debug_format = window.location.hash == "#format" ? true : false;
    if (debug_noformat) {
        console.log("[DEBUG MODE] noformat");
        isnoformat = true;
    }
    if (debug_format) {
        console.log("[DEBUG MODE] format");
        isnoformat = false;
    }
    if (!isnoformat) {
        console.log("format...");
        for (let line = 0; line < textlines.length; line++) {
            var nowline = textlines[line];
            var nowlinetype = nowline.replace(/(^\s*)|(\s*$)/g, "").substr(0,2);
            if (window.location.hash == "#formatlog") {
                console.log(line,nowlinetype,nowline);
            }
            if (nowline.search('<pre class="EnlighterJS') != -1) {
                codemode = true;
            } else if (nowline.search('</pre>') != -1) {
                codemode = false;
            }
            if (codemode) {
                textlines[line] = nowline;
                continue;
            }
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
            } else {
                textlines[line] = nowline;
            }
        }
        // newhtml = textlines.join('<br/>');
        newhtml = newhtml.replace(/<br\/><br\/>/g, '<br/>');
        newhtml = newhtml.replace(/<br\/><p/g, '<p');
        newhtml = newhtml.replace(/<br\/> 	<li>/g, '<li>');
        newhtml = newhtml.replace(/<br\/><\/ul><br\/>/g, '</ul>');
        newhtml = newhtml.replace(/<br\/><\/ol><br\/>/g, '</ol>');
        newhtml = newhtml.replace(/<\/h1><br\/>/g, '</h1>');
        newhtml = newhtml.replace(/<\/h2><br\/>/g, '</h2>');
        newhtml = newhtml.replace(/<\/h3><br\/>/g, '</h3>');
        newhtml = newhtml.replace(/<\/h4><br\/>/g, '</h4>');
        newhtml = newhtml.replace(/<\/h5><br\/>/g, '</h5>');
        newhtml = newhtml.replace(/<\/h6><br\/>/g, '</h6>');
        textboxsethtml(texts,newhtml);
        if (!(textlines[0].length >= noformats[2].length && textlines[0].substr(0,noformats[2].length) == noformats[2])) {
            $("#pagetext img").each(function(){
                $(this).addClass("pagetext_autosizeimg");
            });
        }
        var scrolltable = $(".scrolltable");
        for (let sti = 0; sti < scrolltable.length; sti++) {
            const scrolltablen = $(scrolltable[sti]);
            const scrolltablet = $(".scrolltable table")[sti];
            scrolltablen.html(scrolltablet);
        }
    } else {
        textboxsethtml(texts,newhtml);
    }
}
contentformat();