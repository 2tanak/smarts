<?php
namespace Modules\Entity\Model\LibUniverCat;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class LibUniverCat extends ModelParent {
    protected $table = 'lib_univer_cat';
    protected $fillable = [ 'name', 'edited_user_id'];
    protected $filter_class = Filter::class; 
    use Presenter, CheckTrans;
    
    function relEditedUser(){
        return $this->belongsTo('App\User', 'edited_user_id');
    }

    function relTrans(){
        return $this->hasOne('Modules\Entity\Model\TransLib\TransLib', 'el_id')->where('table_name', $this->getTable());
    }

    function getTransTableNameAttribute(){
        return $this->getTable();
    }

    function getElIdAttribute(){
        return $this->id;
    }
}
