<?php
namespace Modules\Entity\Model\University;

use Modules\Entity\ModelParent;

class UniversityRequirement extends ModelParent {
    protected $table = 'university_requirement';
    protected $fillable = [ 'university_id', 'requirement_id', 'note'];
    
    function getNote($lang){
        $ar = (array)json_decode($this->note);
        if (!isset($ar[$lang]))
            return '';

        return $ar[$lang];
    }

    function  getNoteTr(){
        return $this->getNote($this->lang);
    }
    
    function relRequirement(){
        return $this->belongsTo('Modules\Entity\Model\LibRequirement\LibRequirement', 'requirement_id');
    }
}
