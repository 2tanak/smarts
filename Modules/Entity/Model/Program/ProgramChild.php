<?php
namespace Modules\Entity\Model\Program;

use Modules\Entity\ModelParent;

class ProgramChild extends ModelParent {
    protected $table = 'program_childs';
    protected $fillable = [ 'program_id', 'note'];
    
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
