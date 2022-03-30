<?php
namespace Modules\Entity\Model\University;

use Modules\Entity\ModelParent;

class UniversityDeadlineApp extends ModelParent {
    protected $table = 'university_deadline_app';
    protected $fillable = [ 'university_id', 'deadline', 'note'];
    
    function getNote($lang){
        $ar = (array)json_decode($this->note);
        if (!isset($ar[$lang]))
            return '';

        return $ar[$lang];
    }

    function getDate($lang){
        $ar = (array)json_decode($this->deadline);
        if (!isset($ar[$lang]))
            return '';

        return $ar[$lang];
    }

    function  getNoteTr(){
        return $this->getNote($this->lang);
    }
    
    function  getDateTr(){
        return $this->getDate($this->lang);
    }
}
