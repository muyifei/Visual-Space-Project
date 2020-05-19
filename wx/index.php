<?php
/**
  * wechat php test
  */
 
//define your token
require_once './access_token.php';
define("TOKEN", "49Wc52");
$wechatObj = new wechatCallbackapiTest();
//$wechatObj->valid();
$wechatObj->getMenu();
$wechatObj->responseMsg(); 
class wechatCallbackapiTest
{
    public function valid()
    {
        $echoStr = $_GET["echostr"];
 
        //valid signature , option
        if($this->checkSignature()){
            echo $echoStr;
            return; 
        }
    }

    public function getMenu(){
	$access_token = index();
	$curl = curl_init();
	$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token; 
	//echo $access_token;
	set_include_path('./json');
	$json_string = file_get_contents('menu.json',FILE_USE_INCLUDE_PATH);
	$json = json_decode($json_string, true);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_HEADER, 1);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_HEADER, 0);
	curl_setopt($curl, CURLOPT_HTTPHEADER, 
			array(
				'Content-Type: application/json; charset=utf-8',
				'Content-Length:' . strlen($json_string)
			)
	);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $json_string);

	$ret = curl_exec($curl);
	$err = curl_errno($curl);
	
	if ($err){file_put_contents('Debug', $ret, FILE_USE_INCLUDE_PATH); return;}
	else{file_put_contents('Success', $ret.$access_token, FILE_USE_INCLUDE_PATH); curl_close($curl); return;}	

	
    }

    public function responseMsg()
    {
    //get post data, May be due to the different environments
	$postStr = file_get_contents('php://input');
	
    //extract post data
	if (!empty($postStr)){
                
       		$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
                $textTpl = "<xml>
			    <ToUserName><![CDATA[%s]]></ToUserName>
			    <FromUserName><![CDATA[%s]]></FromUserName>
			    <CreateTime>%s</CreateTime>
			    <MsgType><![CDATA[%s]]></MsgType>
			    <Content><![CDATA[%s]]></Content>
			    </xml>";             
		if(!empty( $keyword ))
                {
		    $msgType = "text";
                    $contentStr = "欢迎来到中国虚拟天文台移动端";
                    if ($keyword == "我是开发者牟义飞") $contentStr = "欢迎开发者牟义飞";
		    else if(preg_match("/^我是/",$keyword)>=1) $contentStr = "欢迎".substr($keyword, 6);
		    else if($keyword != "hello") $contentStr = "对不起该服务仍未实现"; 
		    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                    echo $resultStr;
		
                }else{
                    echo "message need"; 
                }
 
        }else {
            echo "success";
            exit;
        }
	return;
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        
	$token = TOKEN;
	$tmpArr = array($token, $timestamp, $nonce);
	sort($tmpArr);
	$tmpStr = implode( $tmpArr );
	$tmpStr = sha1( $tmpStr );

	if( $tmpStr == $signature ){
	    return true;
	}else{
	    return false;
	}
    }
}
 
?>


