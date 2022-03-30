<?php 
namespace Modules\Entity\Model\Gallery;

use Modules\Entity\Model\University\University;

//use Modules\Entity\Model\LibRequirement\LibRequirement;

use Cache;

trait Presenter {
	
   function getUniverAr(){
	 if(Cache::has('univer')){
		$cache = Cache::get('univer');
        return $cache;
		}else{
		Cache::forever('univer',University::pluck('name', 'id')->toArray());
		return University::pluck('name', 'id')->toArray();
		}
    }

/*
	 function getRequirementAr(){
        return LibRequirement::pluck('name', 'id')->toArray();
    }
*/
	function getSignatureAttribute($v){
		return $this->getTransField('signature', $v);
    }
	
	function getDescriptionAttribute($v){
		if($this->lang == 'ru'){
			 return ($this->relApplication ?  $this->relApplication->description : '');
		}
		return $this->getTransField('description', $v);
	  

    }
	/*
	  function getDegreeAr(){
        return LibDegree::pluck('name', 'id')->toArray();
    }
	*/

}

