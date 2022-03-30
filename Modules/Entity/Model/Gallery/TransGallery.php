<?php
namespace Modules\Entity\Model\Gallery;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class TransGallery extends ModelParent {
    protected $table = 'trans_gallery';
    protected $table_ru = 'gallery';
    protected $fillable = [ 'el_id', 'lang', 'signature','description','table'];
  

    function getTransTableNameAttribute(){
        return 'galleries';
    }

    function getTransFiledsAttribute(){
       return  ['signature'];
    }
    
}
