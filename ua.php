<?php
// $useragent = $_SERVER["HTTP_USER_AGENT"];
function get_broswer($useragent){
    $broswers = [
        ["火狐浏览器","Firefox/","/Firefox\/([^;)]+)+/i"],
        ["傲游浏览器","Maxthon","/Maxthon\/([\d\.]+)/"],
        ["Internet Explorer","MSIE","/msie ([\d.]+)/"],
        ["Internet Explorer","Trident","/rv:([\d.]+)\) like gecko/"],
        ["欧朋浏览器","OPR","/OPR\/([\d\.]+)/"],
        ["Edge浏览器","Edge","/Edge\/([\d\.]+)/"],
        ["谷歌浏览器","Chrome","/Chrome\/([\d\.]+)/"],
        ["Safari","Safari","/Safari\/([\d\.]+)/"],
        ["雅诗浏览器","Yashi","/Yashi\/([\d\.]+)/"],
        ["其他 Gecko 内核浏览器","Gecko","/Gecko\/([\d\.]+)/"],
        ["其他 Webkit 内核浏览器","Webkit","/Webkit\/([\d\.]+)/"]
    ];
    $broswerName = "系统自带浏览器";
    $broswerVersion = "";
    for ($i= 0;$i< count($broswers); $i++){
        $broswer = $broswers[$i];
        if (stripos($useragent, $broswer[1]) > 0) {
            preg_match($broswer[2], $useragent, $broswerInfo);
            $broswerName = $broswer[0];
            $broswerVersion = isset($broswerInfo[1]) ? $broswerInfo[1] : "";
            break;
        }
    }
	return [$broswerName,$broswerVersion];
}
function get_os($useragent) {
    $systems = [
        ["Windows 95","/win/i","/95/i"],
        ["Windows ME","/win 9x/i","/4.90/i"],
        ["Windows 98","/win/i","/98/i"],
        ["Windows Vista","/win/i","/nt 6.0/i"],
        ["Windows 7","/win/i","/nt 6.1/i"],
        ["Windows 8","/win/i","/nt 6.2/i"],
        ["Windows 10","/win/i","/nt 10.0/i"],
        ["Windows XP","/win/i","/nt 5.1/i"],
        ["Windows 2000","/win/i","/nt 5/i"],
        ["Windows NT","/win/i","/nt/i"],
        ["Windows 32","/win/i","/32/i"],
        ["GNU/Linux","/linux/i",""],
        ["Unix","/unix/i",""],
        ["SunOS","/sun/i","/os/i"],
        ["IBM OS/2","/ibm/i","/os/i"],
        ["macOS","/Mac/i","/PC/i"],
        ["PowerPC","/PowerPC/i",""],
        ["AIX","/AIX/i",""],
        ["HPUX","/HPUX/i",""],
        ["NetBSD","/NetBSD/i",""],
        ["BSD","/BSD/i",""],
        ["OSF1","/OSF1/i",""],
        ["IRIX","/IRIX/i",""],
        ["FreeBSD","/FreeBSD/i",""],
        ["teleport","/teleport/i",""],
        ["flashget","/flashget/i",""],
        ["webzip","/webzip/i",""],
        ["offline","/offline/i",""],
        ["iOS","/iPad/i",""],
        ["iOS","/iPhone/i",""],
        ["macOS","/Mac OS X/i",""],
        ["Android","/Android/i",""],
        ["Android","/Adr/i",""],
        ["Ubuntu","/ubuntu/i",""],
        ["RedHat/CentOS","/rh/i",""],
        ["微信小程序","/MicroMessenger/i",""],
        ["Yashi","/Yashi/i",""]
    ];
    $systemName = "新款或未知操作系统";
    for ($i= 0;$i< count($systems); $i++) {
        $system = $systems[$i];
        if (preg_match($system[1], $useragent)) {
            if ($system[2] == "" || preg_match($system[2], $useragent)) {
                $systemName = $system[0];
                break;
            }
        }
    }
    return $systemName;
}
function get_osico($useragent) {
    $browser = get_broswer($useragent);
    $browserName = $browser[0]." ( 版本 ".$browser[1]." )";
    $systemName = get_os($useragent);
    if (preg_match("/Windows/i", $systemName)) {
        $systemName = "Windows";
    }
    $systemicos = [
        ["Windows","OS_Windows","00bcf2"],
        ["GNU/Linux","OS_Linux","de793b"],
        ["macOS","OS_macOS","a49f96"],
        ["iOS","OS_Apple","a49f96"],
        ["Android","OS_Android","97c03d"],
        ["PowerPC","OS_OSX","7dacec"],
        ["Ubuntu","OS_LinuxUbuntu","de4815"],
        ["RedHat","OS_LinuxRedhat","f60203"],
        ["RedHat/CentOS","CN_tencentwechat","51c332"],
        ["Yashi","POP_GP",'dd4b39']
    ];
    $systemColor = "000000";
    $systemImage = "";
    for ($i= 0;$i< count($systemicos); $i++) {
        $systemico = $systemicos[$i];
        if ($systemico[0] == $systemName) {
            $systemColor = $systemico[2];
            $systemImage = $systemico[1];
            break;
        }
    }
    return [$systemImage,$systemColor,$systemName,$browserName];
}
?>