<?php

namespace huimengsdk;

class JingdongUnionClient
{

	private $api = 'https://router.jd.com/api';
	private $app_secret;

	// 系统级参数
	private $method;
	private $app_key;
	private $access_token;
	private $timestamp;
	private $format = 'json';
	private $v;
	private $sign_method = 'md5';
	private $sign;

	// 业务级参数
	private $param_json;

	// 
	private $connectTimeout = 0;
	private $readTimeout = 0;

	private function generateSign($params){
		ksort($params);
		$stringToBeSigned = $this->app_secret;
		foreach ($params as $k => $v){
			if("@" != substr($v, 0, 1)){
				$stringToBeSigned .= "$k$v";
			}
		}
		unset($k, $v);
		$stringToBeSigned .= $this->app_secret;
		return strtoupper(md5($stringToBeSigned));
	}

	private function curl($url, $postFields = null){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FAILONERROR, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		if ($this->readTimeout) {
			curl_setopt($ch, CURLOPT_TIMEOUT, $this->readTimeout);
		}
		if ($this->connectTimeout) {
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->connectTimeout);
		}
		if(strlen($url) > 5 && strtolower(substr($url,0,5)) == "https" ) {
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		}
		if (is_array($postFields) && 0 < count($postFields)){
			$postBodyString = "";
			$postMultipart = false;
			foreach ($postFields as $k => $v){
				if("@" != substr($v, 0, 1)){
					$postBodyString .= "$k=" . urlencode($v) . "&"; 
				}
				else{
					$postMultipart = true;
				}
			}
			unset($k, $v);
			curl_setopt($ch, CURLOPT_POST, true);
			if ($postMultipart){
				curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
			}
			else{
				curl_setopt($ch, CURLOPT_POSTFIELDS, substr($postBodyString,0,-1));
			}
		}
		$reponse = curl_exec($ch);
		if (curl_errno($ch)){
			throw new Exception(curl_error($ch),0);
		}
		else{
			$httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			if (200 !== $httpStatusCode){
				throw new Exception($reponse,$httpStatusCode);
			}
		}
		curl_close($ch);
		return $reponse;	
	}

	public function __construct($app_key,$app_secret,$access_token = null){
		// 构造函数
		$this->app_key = $app_key;
		$this->app_secret = $app_secret;
		$this->access_token = $access_token;
	}

	public function execute($request, $access_token = null){
		// 业务级参数
		$param_json = $request->getApiParas();

		// 请求参数
		$sysParams["app_key"] = $this->app_key;
		$sysParams["v"] = $request->getApiVersion();
		$sysParams["method"] = $request->getApiMethodName();
		$sysParams["timestamp"] = date("Y-m-d H:i:s");
		if (null != $access_token){
           $sysParams["access_token"] = $access_token;
        }
        $sysParams["format"] = $this->format;
        $sysParams["sign_method"] = $this->sign_method;
        $sysParams["param_json"] = $param_json;
        $sysParams["sign"] = $this->generateSign($sysParams);

        // 拼接请求url
        $apiurl = $this->api . '?';
        foreach ($sysParams as $key => $value) {
        	$apiurl .= "$key=" . urlencode($value) . "&";
        }

		// 提交服务请求
		try
		{
			$resp = $this->curl($apiurl);
		}
		catch (Exception $e)
		{
			$result->code = $e->getCode();
			$result->msg = $e->getMessage();
			return $result;
		}
		$respWellFormed = false;
		if ("json" == $this->format)
		{
			$respObject = json_decode($resp);
			if (null !== $respObject)
			{
				$respWellFormed = true;
			}
		}
		else if("xml" == $this->format)
		{
			$respObject = @simplexml_load_string($resp);
			if (false !== $respObject)
			{
				$respWellFormed = true;
			}
		}
		if (false === $respWellFormed)
		{
			$result->code = 0;
			$result->msg = "HTTP_RESPONSE_NOT_WELL_FORMED";
			return $result;
		}
		return $respObject;
	}
}

?>