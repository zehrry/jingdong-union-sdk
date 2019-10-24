<?php

namespace HMMedia;

class JdUnionOpenCategoryGoodsGetRequest
{
	private $apiParas = array();
	private $apiParamsName = 'req';
	private $apiMethodName = 'jd.union.open.category.goods.get';
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
	 * @param parentId
	 * @param grade
	 *-----------------------------
	 */

	private $parentId;
	public function setParentId($parentId){
		$this->apiParas['parentId'] = $parentId;
	}
	public function getParentId(){
		return $this->apiParas['parentId'];
	}

	private $grade;
	public function setGrade($grade){
		$this->apiParas['grade'] = $grade;
	}
	public function getGrade(){
		return $this->apiParas['grade'];
	}

}

?>