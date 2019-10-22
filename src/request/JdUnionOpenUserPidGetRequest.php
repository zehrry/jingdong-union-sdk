<?php

class JdUnionOpenUserPidGetRequest
{
	private $apiParas = array();
	private $apiParamsName = 'pidReq';
	private $apiMethodName = 'jd.union.open.user.pid.get';
	private $apiVersion = '1.1';

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
	 * @param unionId
	 * @param childUnionId
	 * @param promotionType
	 * @param positionName
	 * @param mediaName
	 *-----------------------------
	 */

	private $unionId;
	public function setUnionId($unionId){
		$this->apiParas['unionId'] = $unionId;
	}
	public function getUnionId(){
		return $this->apiParas['unionId'];
	}

	private $childUnionId;
	public function setChildunionId($childUnionId){
		$this->apiParas['childUnionId'] = $childUnionId;
	}
	public function getChildunionId(){
		return $this->apiParas['childUnionId'];
	}

	private $promotionType;
	public function setPromotionType($promotionType){
		$this->apiParas['promotionType'] = $promotionType;
	}
	public function getPromotionType(){
		return $this->apiParas['promotionType'];
	}

	private $positionName;
	public function setPositionName($positionName){
		$this->apiParas['positionName'] = $positionName;
	}
	public function getPositionName(){
		return $this->apiParas['positionName'];
	}

	private $mediaName;
	public function setMediaName($mediaName){
		$this->apiParas['mediaName'] = $mediaName;
	}
	public function getMediaName(){
		return $this->apiParas['mediaName'];
	}

}

?>