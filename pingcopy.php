<?php
function urlExists($url=NULL)  
{  
    $proxy = '10.13.128.124:3128';
    //$proxyauth = '2rmsti:2rm@321';
    if($url == NULL) return false;  
    $ch = curl_init($url);  
    
    curl_setopt($ch, CURLOPT_PROXY, $proxy); // Endereço do proxy
    //curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth); // auth do proxy
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);  
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
    $data = curl_exec($ch);  
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
    curl_close($ch);  
    if($httpcode>=200 && $httpcode<300){  
        return true;  
    } else {  
        return false;  
    }  
}  

//Echoing it will display the ping if the host is up, if not it'll say "down".
if(urlExists("www.google.com.br")){
    echo '<script type="text/javascript">alert("Ok.");</script>';  
}else {echo '<script type="text/javascript">alert("Nao");</script>';
}