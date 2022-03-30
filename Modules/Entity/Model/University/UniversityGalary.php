<?php
namespace Modules\Entity\Model\University;

use Modules\Entity\ModelParent;

class UniversityGalary extends ModelParent {
    protected $table = 'university_galary';
    protected $fillable = [ 'university_id', 'photo', 'note'];
    
    function getNote($lang){
        $ar = (array)json_decode($this->note);
        if (!isset($ar[$lang]))
            return '';

        return $ar[$lang];
    }
    
    function  getNoteTr(){
        return $this->getNote($this->lang);
    }
}
