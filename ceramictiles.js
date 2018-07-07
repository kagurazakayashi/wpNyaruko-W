if (typeof ceramictiles_setting == "undefined") {
    var ceramictiles_setting = {
        "tilesbox": "#postsbox",
        "tiles": "#blockbdiv",
        "datacount": 0,
        "intervalwidth": 10,
        "intervalheight": 10,
        "tileswidth": 310,
        "tilesheight": 400
    }
}
function ceramictiles_resize(animation = false) {
    var screenwidth = document.body.clientWidth;
    var datacount = ceramictiles_setting["datacount"];
    var cw = ceramictiles_setting["intervalwidth"];
    var ch = ceramictiles_setting["intervalheight"];
    var x = cw;
    var y = ch;
    var w = ceramictiles_setting["tileswidth"];
    var h = ceramictiles_setting["tilesheight"];
    var tw = -1;
    if (screenwidth <= (w + cw * 4)) {
        cw = 0;
        //console.log("应用手机版式。"+screenwidth);
    }
    var wnum = parseInt(screenwidth / (w + cw + cw));
    var hnum = Math.ceil(datacount / wnum);
    if (wnum > datacount) {
        wnum = datacount;
    }
    var datanum = 0;
    for (var i = 0; i < hnum; i++) {
        y = ch + (h + ch + ch) * i;
        for (var ii = 0; ii < wnum; ii++) {
            x = cw + (w + cw + cw) * ii;
            var tiles = $(ceramictiles_setting["tiles"] + (datanum++));
            if (animation == false) {
                tiles.css("top", y);
                tiles.css("left", x);
            } else {
                tiles.stop();
                tiles.animate({
                    top: y,
                    left: x
                });
            }
            if ((i == (hnum - 1)) && (ii == (wnum - 1))) {
                tw = (w + cw + cw) * (ii + 1);
            }
        }
    }
    y += (h + ch);
    var contents = $(ceramictiles_setting["tilesbox"]);
    var contentsleft = (screenwidth - tw) / 2;
    contents.css("left", contentsleft);
    contents.css("width", tw);
    contents.css("height", y);
    return [tw, y, contentsleft];
}

function ceramictiles_resize_old(animation = false) {
    var screenwidth = $(window).width();
    var datacount = ceramictiles_setting["datacount"];
    var cw = ceramictiles_setting["intervalwidth"];
    var ch = ceramictiles_setting["intervalheight"];
    var y = ch;
    var w = ceramictiles_setting["tileswidth"];
    var h = ceramictiles_setting["tilesheight"];
    var e = 0;
    var tw = -1;
    if (screenwidth <= (w + cw * 4)) {
        cw = 0;
        //console.log("应用手机版式。"+screenwidth);
    }
    for (var i = 0; i < datacount; i++) {
        x = cw + (w + cw) * i - e;
        if (x > screenwidth - (w + cw) - cw) {
            if (tw == -1) {
                tw = cw + (w + cw) * i;
            }
            e += x - cw;
            x = cw;
            y += (h + ch);
        }
        var tiles = $(ceramictiles_setting["tiles"] + i);
        if (animation == false) {
            tiles.css("top", y);
            tiles.css("left", x);
        } else {
            tiles.stop();
            tiles.animate({
                top: y,
                left: x
            });
        }
    }
    y += (h + ch);
    var contents = $(ceramictiles_setting["tilesbox"]);
    var contentsleft = screenwidth / 2 - tw / 2 - cw / 2;
    contents.css("left", contentsleft);
    contents.css("width", tw);
    contents.css("height", y);
    return [tw, y, contentsleft];
}