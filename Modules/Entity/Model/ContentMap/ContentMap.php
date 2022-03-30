<?php
namespace Modules\Entity\Model\ContentMap;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class ContentMap extends ModelParent {
    protected $table = 'content_map';
    protected $fillable = [ 'coor', 'note', 'edited_user_id'];
    
    function relEditedUser(){
        return $this->belongsTo('App\User', 'edited_user_id');
    }

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
