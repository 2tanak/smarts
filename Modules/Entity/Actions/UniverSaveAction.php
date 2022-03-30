<?php
namespace Modules\Entity\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Services\UploadPhoto;

use Modules\Entity\Model\LibCity\LibCity;
use Modules\Entity\Model\LibContinent\LibContinent;
use Modules\Entity\Model\LibCountry\LibCountry;
use Modules\Entity\Model\University\UniversityDeadlineApp;
use Modules\Entity\Model\University\UniversityRequirement;

class UniverSaveAction {
    private $model = false;
    private $request = false;

    function __construct(Model $model, Request $request){
        $this->model = $model; 
        $this->request = $request; 
    }

    function run(){
        $this->saveMain();
        $this->saveCats();
        $this->saveData();
        $this->saveDiscipline();
        $this->saveDormitory();
        $this->saveFee();
        $this->saveLang();
        $this->saveStat();
        $this->saveSocial();
        
        $this->saveDeadline();
        $this->saveRequirement();
    }

    private function saveMain(){
	
        $ar = $this->request->all();
        $ar['edited_user_id'] = $this->request->user()->id;

        if ($this->request->has('logotip'))
            $ar['logotip'] = UploadPhoto::upload($this->request->logotip);
        else 
            unset($ar['logotip']);

        
        $city = LibCity::find($this->request->city_id);
		
        if ($city){
            $ar['country_id'] = $city->country_id;
        }

        if ($city && $city->relCountry){
            $ar['continent_id'] = $city->relCountry->continent_id;
        }
       
        $this->model->fill($ar);
        $this->model->save();
    }

    private function saveData(){
        $this->model->relData()->updateOrCreate(['university_id' => $this->model->id], $this->request->data);
    }

    private function saveCats(){
		
		$this->model->relCats()->delete();
	    $this->model->relCats()->updateOrCreate(['university_id'=>$this->model->id,'cat_id' => $this->request->cat_id], ['cat_id' => $this->request->cat_id]);
		/*
        $this->model->relCats()->delete();

        if (is_array($this->request->cat_id) && count($this->request->cat_id)){
            foreach ($this->request->cat_id as $cat_id) {
                $this->model->relCats()->create(['cat_id' => $cat_id]);
            }
        }
		*/
    }

    private function saveDiscipline(){
        $this->model->relDiscipline()->delete();

        if (is_array($this->request->discipline_id) && count($this->request->discipline_id)){
            foreach ($this->request->discipline_id as $discipline_id) {
                $this->model->relDiscipline()->create(['discipline_id' => $discipline_id]);
            }
        }
    }

    private function saveDormitory(){
        if (is_array($this->request->dormitory) && count($this->request->dormitory))
            $this->model->relDormitory()->updateOrCreate(['university_id' => $this->model->id], $this->request->dormitory);
        else 
            $this->model->relDormitory()->delete();
    }

    private function saveFee(){
        if (is_array($this->request->fee) && count($this->request->fee)){
            foreach ($this->request->fee as $degree_id => $ar) {
                $this->model->relFees()->updateOrCreate(['degree_id' => $degree_id, 'university_id' => $this->model->id], $ar);
            }
        }
    }

    private function saveSocial(){
        if (is_array($this->request->social) && count($this->request->social)){
            $this->model->relSocial()->updateOrCreate(['university_id' => $this->model->id], $this->request->social);
        }
    }

    private function saveLang(){
        $this->model->relLang()->delete();
        if (is_array($this->request->lang_id) && count($this->request->lang_id)){
            foreach ($this->request->lang_id as $lang_id) {
                $this->model->relLang()->create(['lang_id' => $lang_id]);
            }
        }
    }

    private function saveStat(){
        $this->model->relStat()->updateOrCreate(['university_id' => $this->model->id], $this->request->stat);
    }

    private function saveDeadline(){
        $this->model->relDeadLineApps()->delete();

        if (!$this->request->deadline)
            return ;

        $ar = $this->request->deadline;

        if (!isset($ar['note']['ru']))
            return ;
            
        foreach ($ar['note']['ru'] as $k => $v){
            if (!$ar["note"]['ru'][$k] && !$ar["date"]['ru'][$k] && !$ar["note"]['en'][$k])
                continue;

            UniversityDeadlineApp::create([
                'university_id' => $this->model->id, 
                'deadline' => json_encode([
                    'ru' => $ar["date"]['ru'][$k],
                    'en' => $ar["date"]['en'][$k]
                ]), 
                'note' => json_encode([
                    'ru' => $ar["note"]['ru'][$k],
                    'en' => $ar["note"]['en'][$k]
                ])
            ]);

        }

    }

    
    private function saveRequirement(){
        $this->model->relRequirements()->delete();

        if (!$this->request->requirement)
            return ;

        $ar = $this->request->requirement;

        if (!isset($ar['note']['ru']))
            return ;
            
        foreach ($ar['note']['ru'] as $k => $v){
            if (!$ar["note"]['ru'][$k] && !$ar["note"]['en'][$k])
                continue;

            UniversityRequirement::create([
                'university_id' => $this->model->id, 
                'requirement_id' => $ar["requirement_id"][$k], 
                'note' => json_encode([
                    'ru' => $ar["note"]['ru'][$k],
                    'en' => $ar["note"]['en'][$k]
                ])
            ]);

        }

    }
}