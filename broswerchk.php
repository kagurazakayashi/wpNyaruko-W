<?php
function broswerchkto($errurl) {
  $broswerck = broswerchk();
  if ($broswerck != "") {
    // die("抱歉，您的浏览器（ ".$broswerck." ）不受支持。".$_SERVER["HTTP_USER_AGENT"]);
    die('抱歉，您的浏览器（ '.$broswerck.' ）不受支持。<script language="javascript" type="text/javascript">window.location.href="'.$errurl.$broswerck.'";</script>');
  }
}
function broswerchk() {
  include_once("ua.php");
  $ua = $_SERVER["HTTP_USER_AGENT"];
  $broswer = get_broswer($ua);
  $os = get_os($ua);
  $broswerName = $broswer[0];
  $broswerVersion = $broswer[1];
  if ($broswerVersion == "") {
    $broswerMainVersion = 0;
  } else {
    $broswerMainVersion = (int)explode(".",$broswerVersion)[0];
  }
  $isOK = false;
  if ($broswerName == "火狐浏览器" && $broswerMainVersion >= 50) {
    $isOK = true;
  }
  else if ($broswerName == "谷歌浏览器" && $broswerMainVersion >= 50) {
    $isOK = true;
  }
  else if ($broswerName == "Safari" && $broswerMainVersion >= 500) {
    $isOK = true;
  }
  else if ($broswerName == "欧朋浏览器" && $broswerMainVersion >= 11) {
    $isOK = true;
  }
  else if ($broswerName == "其他 Gecko 内核浏览器" && $broswerMainVersion >= 50) {
    $isOK = true;
  }
  else if ($broswerName == "其他 Webkit 内核浏览器" && $broswerMainVersion >= 50) {
    $isOK = true;
  }
  else if ($broswerName == "Edge浏览器" || $broswerName == "雅诗浏览器") {
    $isOK = true;
  }
  else if ($os == "Android" || $os == "iOS" || $os == "微信小程序" || $os == "Yashi") {
    $isOK = true;
  }
  if ($broswerMainVersion == 0) {
    $broswerMainVersion = "";
  }
  if ($isOK) {
    return "";
  } else {
    return "#".$broswerName."#".$broswerMainVersion."#".$os;
  }
}
?>