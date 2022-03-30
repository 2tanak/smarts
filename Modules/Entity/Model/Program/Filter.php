<?php
namespace Modules\Entity\Model\Program;

use Modules\Entity\Services\ModelFilter;
use Modules\Entity\Model\Program\TransProgram;

class Filter extends ModelFilter {
    public function filter(){
        $request  = $this->request;

        if ($this->request->has('id') && $this->request->id) 
            $this->query->where('id', $this->request->id);

        if ($this->request->has('name') && !empty($this->request->name)){
            if($request->lang == 'en'){
                $trans_id_ar = TransProgram::where('name', 'like', '%'.$request->name.'%')->pluck('el_id')->toArray();
                // dd($items);
                $this->query->whereIn('id', $trans_id_ar);
                // $this->query->with(['relTrans'=>function($q) use ($request){
                //     $q->where('name', 'like', '%'.$request->name.'%');;
                // }]);
                // dd($this->query->get());
            }else{
                $this->query->where('name', 'like', '%'.$this->request->name.'%');
            }
            // dd($this->query->get());
        }
        
        if ($this->request->has('country_id') && $this->request->country_id)
            $this->query->whereHas('relUniversity', function($q) use ($request){
                $q->where('country_id', $request->country_id);
            });
            
        if ($this->request->has('univer_id') && $this->request->univer_id)
            $this->query->whereHas('relUniversity', function($q) use ($request){
                $q->where('univer_id', $request->univer_id);
            });
        
        if ($this->request->has('city_id') && $this->request->city_id)
            $this->query->whereHas('relUniversity', function($q) use ($request){
                $q->where('city_id', $request->city_id);
            });

        if ($this->request->has('degree_id')){
            if (is_array($this->request->degree_id) && isset($this->request->degree_id[0])) {
                $this->query->whereIn('degree_id', $request->degree_id);
            }
            elseif(!is_array($this->request->degree_id) && $this->request->degree_id != null) {
                $this->query->where('degree_id', $request->degree_id);
            }
		}
		
        if ($this->request->has('discipline_id') && is_array($this->request->discipline_id) && isset($this->request->discipline_id[0])){
			$this->query->whereHas('relDiscipline', function($q) use ($request){
                $q->whereIn('discipline_id', $request->discipline_id);
            });
        }
					
			

        if ($this->request->has('cost') && is_array($this->request->cost))
            $this->query->where(function($q) use ($request){
                foreach ($request->cost as $k => $cost){
                    $ar_cost = explode("-", $cost);
                    if ($ar_cost[0] == 0 || $ar_cost[0] == '0')
                        $q->where('price_for_inter', '<=', $ar_cost[1]);
                    else if (!isset($ar_cost[1]))
                        $q->orWhere('price_for_inter', '>=', $ar_cost[0]);
                    else 
                        $q->orWhere(function($b) use ($ar_cost){
                            $b->where('price_for_inter', '>=',  $ar_cost[0])->where('price_for_inter', '<=', $ar_cost[1]);
                        });
                }
            });

        if ($this->request->has('duration') && is_array($this->request->duration))
            $this->query->where(function($q) use ($request){
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

        if ($this->request->has('sort_as') && $this->request->sort_as=='by_name_asc')
            $this->query->orderBy('name', 'desc');

        else if ($this->request->has('sort_as') && $this->request->sort_as=='by_name_desc')
            $this->query->orderBy('name', 'asc');

        else if ($this->request->has('sort_as') && $this->request->sort_as=='by_updated_asc')
            $this->query->orderBy('updated_at', 'desc');
        else if ($this->request->has('sort_as') && $this->request->sort_as=='by_updated_desc')
            $this->query->orderBy('updated_at', 'asc');
        else if ($this->request->has('sort_as') && $this->request->sort_as=='by_qs_desc'){
            $this->query->with('relUniversity')
                    ->join('university', 'programs.univer_id', '=', 'university.id')
                    ->orderBy('university.rank_word', 'desc');
        }
        else 
            $this->query->latest();


    }

}
