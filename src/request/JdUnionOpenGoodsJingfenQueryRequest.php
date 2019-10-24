<?php

namespace HMMedia;

class JdUnionOpenGoodsJingfenQueryRequest
{
	private $apiParas = array();
	private $apiParamsName = 'goodsReq';
	private $apiMethodName = 'jd.union.open.goods.jingfen.query';
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
	 * @param $eliteId
	 * @param $pageIndex
	 * @param $pageSize
	 * @param $sortName
	 * @param $sort
	 *-----------------------------
	 */

	private $eliteId;
	public function setEliteId($eliteId){
		$this->apiParas['eliteId'] = $eliteId;
	}
	public function getEliteId(){
		return $this->apiParas['eliteId'];
	}
	private $pageIndex;
	public function setPageIndex($pageIndex){
		$this->apiParas['pageIndex'] = $pageIndex;
	}
	public function getPageIndex(){
		return $this->apiParas['pageIndex'];
	}
	private $pageSize;
	public function setPageSize($pageSize){
		$this->apiParas['pageSize'] = $pageSize;
	}
	public function getPageSize(){
		return $this->apiParas['pageSize'];
	}
	private $sortName;
	public function setSortName($sortName){
		$this->apiParas['sortName'] = $sortName;
	}
	public function getSortName(){
		return $this->apiParas['sortName'];
	}
	private $sort;
	public function setSort($sort){
		$this->apiParas['sort'] = $sort;
	}
	public function getSort(){
		return $this->apiParas['sort'];
	}

}

?>