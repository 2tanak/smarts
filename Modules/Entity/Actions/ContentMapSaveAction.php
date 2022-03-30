<?php
namespace Modules\Entity\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ContentMapSaveAction {
    private $model = false;
    private $request = false;

    function __construct(Model $model, Request $request){
        $this->model = $model; 
        $this->request = $request; 
    }

    function run(){
        $ar = $this->request->all();
        
        if ($this->request->user())
            $ar['edited_user_id'] = $this->request->user()->id;

        $ar['note'] = json_encode([
            'ru' => $this->request->note_ru,
            'en' => $this->request->note_en
        ]);

        $this->model->fill($ar);
        $this->model->save();

        return $this->model;
    }

}