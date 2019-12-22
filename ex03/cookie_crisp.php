<?php
$var = $_GET;
if($var["action"]==="set"){
    $value = $var["value"];
    setcookie($var["name"], $value, time()+3600);
}
if($var["action"]==="get"){
    echo $_COOKIE[$var["name"]];
}
if($var["action"]==="del"){
    setcookie($var["name"], $value, time()-3600);
}
?> 