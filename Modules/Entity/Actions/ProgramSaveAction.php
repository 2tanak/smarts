<?php
namespace Modules\Entity\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Services\UploadPhoto;
use Modules\Entity\Model\Program\ProgramChild;


class ProgramSaveAction {
    private $model = false;
    private $request = false;

    function __construct(Model $model, Request $request){
		
        $this->model = $model; 
        $this->request = $request; 
    }

    function run(){
        $this->saveMain();

        if (method_exists($this->model, 'relDiscipline')){
            $this->saveDiscipline();
            $this->saveChilds();
        }
    }

    private function saveMain(){
		$arr_note = explode('|',$this->request->note);
		$this->request->note = serialize($arr_note);
		
		 
        $ar = $this->request->all();
        $ar['edited_user_id'] = $this->request->user()->id;

        $this->model->fill($ar);
        $this->model->save();
    }

    private function saveDiscipline(){
        $this->model->relDiscipline()->delete();

        if (is_array($this->request->discipline_id) && count($this->request->discipline_id)){
            foreach ($this->request->discipline_id as $discipline_id) {
                $this->model->relDiscipline()->create(['discipline_id' => $discipline_id,'univer_id'=>$this->request->univer_id]);
            }
        }
    }

    private function saveChilds(){
        $this->model->relChilds()->delete();

        if (!isset($this->request->child))
            return;

        $ar = $this->request->child;
        if (!isset($ar['note']['ru']))
            return ;

        foreach ($ar['note']['ru'] as $k => $v){
            if (!isset($ar["note"]['ru'][$k]) || !isset($ar["note"]['en'][$k]))
                continue;

            ProgramChild::create([
                'program_id' => $this->model->id,
                'note' => json_encode([
                    'ru' => $ar["note"]['ru'][$k],
                    'en' => $ar["note"]['en'][$k]
                ])
            ]);
        }

    }
}