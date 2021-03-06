<?php
namespace Modules\Entity\Traits;

use Modules\Entity\Services\ChangeModelService;

trait ChangeModel {
    protected static function boot(){

        static::updating(function ($el) {
			
            ChangeModelService::createUpdateNote($el);
            return true;
        });

        static::created(function ($el) {
            ChangeModelService::createCreateNote($el);
            return true;
        });

        static::deleted(function ($el) {
           ChangeModelService::createDeleteNote($el);
        });
        
        return parent::boot();
    }
}

?>
