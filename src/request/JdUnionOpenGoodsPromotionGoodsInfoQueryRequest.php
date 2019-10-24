<?php

namespace HMMedia;

class JdUnionOpenGoodsPromotionGoodsInfoQueryRequest
{
	private $apiParas = array();
	private $apiParamsName;
	private $apiMethodName = 'jd.union.open.goods.promotiongoodsinfo.query';
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
	 * @param skuIds
	 *-----------------------------
	 */

	private $skuIds;
	public function setSkuIds($skuIds){
		$this->apiParas['skuIds'] = $skuIds;
	}
	public function getSkuIds(){
		return $this->apiParas['skuIds'];
	}

}

?>