<?php 
namespace Modules\Entity\Model\Program;

use Modules\Entity\Model\University\University;
use Modules\Entity\Model\LibDiscipline\LibDiscipline;
use Modules\Entity\Model\LibDegree\LibDegree;
use Cache;

trait Presenter {
    
    function getArDisciplineIdAttribute(){
        return $this->relDiscipline()->pluck('discipline_id')->toArray();
    }
    
    function getDisciplineAr(){
		return LibDiscipline::orderBy('name', 'asc')->get()->pluck('name', 'id')->toArray();
    }

    function getUniverAr(){
		return University::orderBy('name', 'asc')->get()->pluck('name', 'id')->toArray();
    }

    function getDegreeAr(){
		return LibDegree::orderBy('name', 'asc')->get()->pluck('name', 'id')->toArray();
	}

    function getDegreeNameAttribute(){
        return ($this->relDegree ?  $this->relDegree->name : '');
    }

    function getEditedUserNameAttribute(){
        return ($this->relEditedUser ?  $this->relEditedUser->name : '');
    }

    function getNameAttribute($v){
        return $this->getTransField('name', $v);
    }
 
    function getNoteAttribute($v){
        return $this->getTransField('note', $v);
    }
	
	
    function getDisciplineNoteAttribute($v){
        return $this->getTransField('discipline_note', $v);
    }

    function getProceedNoteAttribute($v){
        return $this->getTransField('proceed_note', $v);
    }
    
    function getUniverNameAttribute(){
        return ($this->relUniversity ?  $this->relUniversity->name : '');
    }

}

