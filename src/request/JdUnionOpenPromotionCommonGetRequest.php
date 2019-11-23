<?php

namespace huimengsdk;

class JdUnionOpenPromotionCommonGetRequest
{
	private $apiParas = array();
	private $apiParamsName = 'promotionCodeReq';
	private $apiMethodName = 'jd.union.open.promotion.common.get';
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
	 * @param materialId
	 * @param siteId
	 * @param positionId
	 * @param subUnionId
	 * @param ext1
	 * @param protocol
	 * @param pid
	 * @param couponUrl
	 *-----------------------------
	 */

	private $materialId;
	public function setMaterialId($materialId){
		$this->apiParas['materialId'] = $materialId;
	}
	public function getMaterialId(){
		return $this->apiParas['materialId'];
	}

	private $siteId;
	public function setSiteId($siteId){
		$this->apiParas['siteId'] = $siteId;
	}
	public function getSiteId(){
		return $this->apiParas['siteId'];
	}

	private $positionId;
	public function setPositionId($positionId){
		$this->apiParas['positionId'] = $positionId;
	}
	public function getPositionId(){
		return $this->apiParas['positionId'];
	}

	private $subUnionId;
	public function setSubunionId($subUnionId){
		$this->apiParas['subUnionId'] = $subUnionId;
	}
	public function getSubunionId(){
		return $this->apiParas['subUnionId'];
	}

	private $ext1;
	public function setExt1($ext1){
		$this->apiParas['ext1'] = $ext1;
	}
	public function getExt1(){
		return $this->apiParas['ext1'];
	}

	private $protocol;
	public function setProtocol($protocol){
		$this->apiParas['protocol'] = $protocol;
	}
	public function getProtocol(){
		return $this->apiParas['protocol'];
	}

	private $pid;
	public function setPid($pid){
		$this->apiParas['pid'] = $pid;
	}
	public function getPid(){
		return $this->apiParas['pid'];
	}

	private $couponUrl;
	public function setCouponUrl($couponUrl){
		$this->apiParas['couponUrl'] = $couponUrl;
	}
	public function getCouponUrl(){
		return $this->apiParas['couponUrl'];
	}

}

?>