<?php

namespace huimengsdk;

class JdUnionOpenOrderQueryRequest
{
	private $apiParas = array();
	private $apiParamsName = 'orderReq';
	private $apiMethodName = 'jd.union.open.order.query';
	private $apiVersion = '1.0';
	
	public function getApiMethodName(){
	  return $this->apiMethodName;
	}

	public function getApiParas(){
		if(empty($this->apiParas)){
			return "{}";
		}
		if(isset($this->apiParamsName) && is_string($this->apiParamsName) && strlen($this->apiParamsName)>0){
			$param_json[$this->apiParamsName] = $this->apiParas;
			return json_encode($param_json);
		}
		else{
			return json_encode($this->apiParas);
		}
	}

	public function check(){
	}

	public function getApiVersion(){
		return $this->apiVersion;
	}
	
	/*
	 *-----------------------------
	 * @param pageNo
	 * @param pageSize
	 * @param type
	 * @param time
	 * @param childUnionId
	 * @param key
	 *-----------------------------
	 */

	private $pageNo;
	public function setPageNo($pageNo){
		$this->apiParas['pageNo'] = $pageNo;
	}
	public function getPageNo(){
		return $this->apiParas['pageNo'];
	}

	private $pageSize;
	public function setPageSize($pageSize){
		$this->apiParas['pageSize'] = $pageSize;
	}
	public function getPageSize(){
		return $this->apiParas['pageSize'];
	}	

	private $type;
	public function setType($type){
		$this->apiParas['type'] = $type;
	}
	public function getType(){
		return $this->apiParas['type'];
	}

	private $time;
	public function setTime($time){
		$this->apiParas['time'] = $time;
	}
	public function getTime(){
		return $this->apiParas['time'];
	}

	private $childUnionId;
	public function setChildUnionId($childUnionId){
		$this->apiParas['childUnionId'] = $childUnionId;
	}
	public function getChildUnionId(){
		return $this->apiParas['childUnionId'];
	}

	private $key;
	public function setKey($key){
		$this->apiParas['key'] = $key;
	}
	public function getKey(){
		return $this->apiParas['key'];
	}

}

?>