<?php 
namespace Modules\Entity\Model\University;

use Modules\Entity\Model\LibCity\LibCity;
use Modules\Entity\Model\LibUniverCat\LibUniverCat;
use Modules\Entity\Model\LibDiscipline\LibDiscipline;
use Modules\Entity\Model\LibLangStudy\LibLangStudy;
use Modules\Entity\Model\LibDegree\LibDegree;
use Modules\Entity\Model\University\UniversityData;
use Modules\Entity\Model\University\UniversitySocial;
use Modules\Entity\Model\University\UniversityFees;
use Modules\Entity\Model\University\UniversityDormitory;
use Modules\Entity\Model\LibRequirement\LibRequirement;
use Illuminate\Http\Request;

trait Presenter {
    private $rel_fee_obj_ar = [];
    private $prop_pr = [];

    function getCityAr(){
        return LibCity::pluck('name', 'id')->toArray();
    }

    function getArCatIdAttribute(){
        return $this->relCats()->pluck('cat_id')->toArray();
    }

    function getCatAr(){
        return LibUniverCat::pluck('name', 'id')->toArray();
    }

    function getCatNameAttribute(){
        if (!$this->relCats)
            return null;

        return $this->relCats->relCat->name;
    }

    function getFeeByDegree($degree_id, $attr){
        if (!isset($this->prop_pr['degree']))
            $this->prop_pr['degree'] = [];

        if (!isset($this->prop_pr['degree'][$degree_id]))
            $this->prop_pr['degree'][$degree_id] = $this->relFees()->where('degree_id', $degree_id)->first();

        if (!$this->prop_pr['degree'][$degree_id])
            return false;

        return $this->prop_pr['degree'][$degree_id]->{$attr};
    }

    function getLangNameAttribute(){
        $ar_lang_id = $this->relLang()->pluck('lang_id')->toArray();

        $items = LibLangStudy::whereIn('id', $ar_lang_id)->get();
        $ar = [];
        foreach ($items as $i){
            $ar[] = $i->name;
        }

        return implode(", ", $ar);
    }

    function getDisciplineAr(){
        return LibDiscipline::orderBy('name', 'asc')->pluck('name', 'id')->toArray();
    }

    function getRequirementAr(){
	    return LibRequirement::pluck('name', 'id')->toArray();
	}
	
	
    function getLangAr(){
		return LibLangStudy::pluck('name', 'id')->toArray();
    }

    function getDegreeAr(){
	    return LibDegree::pluck('name', 'id')->toArray();
    }

    

    function getDegreeItems(){
	    return LibDegree::get();
    }

    function getRelDormitory(){
        if (!$this->rel_doremitory_obj && !$this->relDormitory)
            $this->rel_doremitory_obj = new UniversityDormitory();
        else if (!$this->rel_doremitory_obj)
            $this->rel_doremitory_obj = $this->relDormitory;

        $this->rel_doremitory_obj->setLocale($this->lang);

        return $this->rel_doremitory_obj;
    }

    function getRelDataObj(){
        if (!$this->rel_data_obj && !$this->relData){
			
			 $this->rel_data_obj = new UniversityData();
		}
           
        else if (!$this->rel_data_obj){
			$this->rel_data_obj = $this->relData;
		}
           
        $this->rel_data_obj->setLocale($this->lang);

        return $this->rel_data_obj;
    }

    function getRelSocialObj(){
        if (!$this->rel_social_obj && !$this->relSocial){
			
			 $this->rel_social_obj = new UniversitySocial();
		}
           
        else if (!$this->rel_social_obj){
			$this->rel_social_obj = $this->relSocial;
		}

        return $this->rel_social_obj;
    }

    
    function getRelFeeObj($degree_id){
        if (!$this->rel_fee_obj_ar)
            $this->rel_fee_obj_ar = [];
        
        if (!isset($this->rel_fee_obj_ar[$degree_id]) && $fee = $this->relFees()->where(["degree_id" => $degree_id])->first())
            $this->rel_fee_obj_ar[$degree_id] = $fee;
        else if (!isset($this->rel_fee_obj_ar[$degree_id]))
            $this->rel_fee_obj_ar[$degree_id] =  new UniversityFees();

        return $this->rel_fee_obj_ar[$degree_id];
    }

    
    function getArLangIdAttribute(){
        return $this->relLang()->pluck('lang_id')->toArray();
    }

    function getArDisciplineIdAttribute(){
        return $this->relDiscipline()->pluck('discipline_id')->toArray();
    }

    function getEditedUserNameAttribute(){
        return ($this->relEditedUser ?  $this->relEditedUser->name : '');
    }

    function getNameAttribute($v){
        return $this->getTransField('name', $v);
    }
    
    function getContinentNameAttribute(){
        return ($this->relContinent ?  $this->relContinent->name : '');
    }
    
    function getCountryNameAttribute(){
        return ($this->relCountry ?  $this->relCountry->name : '');
    }
    
    function getCityNameAttribute(){
        return ($this->relCity ?  $this->relCity->name : '');
    }

}

