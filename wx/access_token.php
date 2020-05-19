<?php
	header('Content-type:text');
 function index(){
    
    $appId = 'wx9cd9e82142e45644';
    $appSecret = '85b67823f91162f4bdcbe0c40973ebe5';
    set_include_path('./json/');
    $res = file_get_contents('access_token.json',FILE_USE_INCLUDE_PATH);
    $result = json_decode($res, true);
    $expires_time = $result["expires_time"];
    $access_token = $result["access_token"];
    
    if (time() > ($expires_time + 5400)){
    $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appId."&secret=".$appSecret;
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url); 
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); 
    $result =(array) json_decode(curl_exec($ch));
    
    if(curl_errno($ch)){
      var_dump(curl_error($ch)); 
      return -1;
    }
    curl_close($ch);
    $access_token = $result['access_token'];
    $expires_time = time();
    file_put_contents('access_token.json','{"access_token":"'.$access_token.'","expires_time": '.$expires_time.'}', FILE_USE_INCLUDE_PATH);
    }
    return $access_token;
}
?>
