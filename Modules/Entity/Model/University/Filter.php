<?php
namespace Modules\Entity\Model\University;

use Modules\Entity\Model\Program\Program;
use Modules\Entity\Services\ModelFilter;

class Filter extends ModelFilter {
    public function filter(){
        $request = $this->request;

        if ($this->request->has('id') && $this->request->id) 
            $this->query->where('id', $this->request->id);

        if ($this->request->has('name') && $this->request->name){ 
            if($request->lang == 'en'){
                $this->query->whereHas('relTrans', function($q) use ($request){
                    $q->where('name', 'like', '%'.$this->request->name.'%');;
                });
            }else{
                $this->query->where('name', 'like', '%'.$this->request->name.'%');
            }
		}
        
        if ($this->request->has('country_id') && $this->request->country_id)
            $this->query->where('country_id', $this->request->country_id);
        
        if ($this->request->has('city_id') && $this->request->city_id)
            $this->query->where('city_id', $this->request->city_id);
        
        if ($this->request->has('degree_id') && $this->request->degree_id)
            // $univer_ids = Program::where('degree_id', $this->request->degree_id)->pluck('univer_id')->toArray();
            // $this->query->whereIn('id', $univer_ids);
            $this->query->whereHas('relPrograms', function($q) use ($request){
                $q->where('degree_id', (int)$request->degree_id);
            });
            
        if ($this->request->has('discpline_id') && is_array($this->request->discpline_id))
            $this->query->whereHas('relDiscipline', function($q) use ($request){
                $q->whereIn('discipline_id', $request->discpline_id);
            });
        if ($this->request->has('cost') && is_array($this->request->cost)){
            $ar = array();
            foreach ($request->cost as $k => $cost){ //перебираем массив стоимостей
                $is_double = strpos($cost, '-'); //если стоимость в промежутке от и до
                if ($is_double !== false) {
                    $ar_cost = explode('-', $cost);
                    array_push($ar, array_map('intval', $ar_cost));
                }
                else{
                    array_push($ar, (int)$cost + 1);
                }   
            }
            // $ar = array_map('intval', $ar);
            // dd($ar);
            // $programs = Program::where('id', '>', 0);
            $this->query->whereHas('relPrograms', function($q) use ($ar){

                foreach ($ar as $k => $costs){ //перебираем массив стоимостей
                    $q->where(function($q) use ($costs) {
                        if (is_array($costs) && count($costs) > 1) {
                            $q->where(function($q) use ($costs) {
                                $q->where('price_for_inter', '>=', $costs[0])
                                  ->Where('price_for_inter', '<=', $costs[1]);
                            });
                        }
    
                        if(!is_array($costs) && $costs > 50000){
                            $q->where('price_for_inter', '>', $costs);
                        }  
                    });
                    
                     
                }
                // foreach ($request->cost as $k => $cost){ //перебираем массив стоимостей
                //     $is_double = strpos($cost, '-'); //если стоимость в промежутке от и до
                //     if ($is_double !== false) {
                //         $ar_cost = explode('-', $cost);
                //         dd($ar_cost);
                //         if (count($ar_cost) > 2){//если массив состоит более чем из 2ух элементов
                //             continue;
                //         } 
                //         else {
                //             $q->where('price_for_inter', '>=', (int)$ar_cost[0])->where('price_for_inter', '<=', (int)$ar_cost[1]);
                //         }
                //     }
                //     else{
                //         $q->where('price_for_inter', '>=', (int)$cost);
                //     }   
                // }
            });
        }
           
            

        if ($this->request->has('duration') && is_array($this->request->duration))
            $this->query->whereHas('relPrograms', function($q) use ($request){
                foreach ($request->duration as $duration ){
                    if ($duration == 4)
                        $q->orWhere('duration_year', '>=', $duration);
                    else 
                        $q->orWhere('duration_year', $duration);
                }
            });

        if ($this->request->has('is_campus') && $this->request->is_campus)
            $this->query->whereHas('relData', function($q) use ($request){
                $q->where('is_campus', 1);
            });

        if ($this->request->has('is_med_insurance') && $this->request->is_med_insurance)
            $this->query->whereHas('relData', function($q) use ($request){
                $q->where('is_med_insurance', 1);
            });

        if ($this->request->has('is_library') && $this->request->is_library)
            $this->query->whereHas('relData', function($q) use ($request){
                $q->where('is_library', 1);
            });

        if ($this->request->has('is_inter_programm') && $this->request->is_inter_programm)
            $this->query->whereHas('relData', function($q) use ($request){
                $q->where('is_inter_programm', 1);
            });

        if ($this->request->has('is_career') && $this->request->is_career)
            $this->query->whereHas('relData', function($q) use ($request){
                $q->where('is_career', 1);
            });

        if ($this->request->has('is_clubs') && $this->request->is_clubs)
            $this->query->whereHas('relData', function($q) use ($request){
                $q->where('is_clubs', 1);
            });

        if ($this->request->has('sort_as') && $this->request->sort_as=='by_name_asc')
            $this->query->orderBy('name', 'desc');

        if ($this->request->has('sort_as') && $this->request->sort_as=='by_name_desc')
            $this->query->orderBy('name', 'asc');

        if ($this->request->has('sort_as') && $this->request->sort_as=='by_updated_asc')
            $this->query->orderBy('updated_at', 'desc');

        if ($this->request->has('sort_as') && $this->request->sort_as=='by_updated_desc'){
            $this->query->orderBy('updated_at', 'asc');
        }

        if ($this->request->has('sort_as') && $this->request->sort_as=='by_qs_desc'){
            $this->query->orderBy('rank_word', 'asc');
        }

            
    }

}
