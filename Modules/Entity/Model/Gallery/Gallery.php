<?php
namespace Modules\Entity\Model\Gallery;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class Gallery extends ModelParent {
    protected $table = 'galleries';
    protected $fillable = [ 'univer_id','user_id', 'photo','signature','requirement_id'];
    protected $filter_class = Filter::class; 

    use Presenter,CheckTrans;
    
    
	function relApplication(){
        return $this->hasOne('Modules\Entity\Model\Gallery\Application\Application', 'gallery_id', 'id');
    }
	
    function relTrans(){
        return $this->hasOne('Modules\Entity\Model\Gallery\TransGallery', 'el_id');
    }
	
    function relUniversity(){
        return $this->belongsTo('Modules\Entity\Model\University\University', 'univer_id', 'id');
    }
	
	function relRequirement(){
        return $this->belongsTo('Modules\Entity\Model\Gallery\Requirement', 'requirement_id','id');
    }

    function getTransTableNameAttribute(){
        return $this->getTable();
    }
      
    function getElIdAttribute(){
        return $this->id;
    }

  
}
