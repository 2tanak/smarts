<?php
namespace Modules\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


use Modules\Entity\Traits\DateHelper;
use Modules\Entity\Traits\FilterModel;
use Modules\Entity\Traits\RoleModel;
use Modules\Entity\Traits\ChangeModel;

use Modules\Entity\Traits\LabelModel;

use App\Helper\CurrentLang;

class ModelParent extends Model {
    use DateHelper, RoleModel, FilterModel, LabelModel, ChangeModel;
    protected $lang = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
		
        $this->lang = CurrentLang::get();
    }

    public function setLocale($locale = false){
        if (!$locale){
            $this->lang = 'ru';
		}
        
        $this->lang = $locale;
    }

    protected function getTransField($field, $v){
        if ($this->lang == 'ru')
            return $v;
		
        $table_name = $this->getTable();
        if (strpos($table_name, 'lib_') !== false){
            $lang = $this->relTrans()->where(['lang'=>$this->lang])->first();
            if (!$lang){
                $lang =  $this->relTrans()->updateOrCreate([
                    'lang' => $this->lang,
                    'table_name' => $table_name,
                    'el_id' => $this->id
                ], ['lang' => $this->lang, 'table_name' => $table_name]);
            }
        }
        else{
		    $lang = $this->relTrans()->firstOrCreate(['lang'=>$this->lang]);
        }
        
        if (!$lang->{$field}){
            return $v;
		}

        return $lang->{$field};
    }

    function getTitleAttribute(){
        return $this->getTable();
    }

}
