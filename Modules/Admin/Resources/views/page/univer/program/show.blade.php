@extends('admin::layout')

@section('title', $title)

@section('content')
    <div class="row">
		<disclaymer :model="$model" type="show" />    

        <div class="col-md-10">
            <div class="panel panel-flat">
                <div class="panel-heading">
				    <h6 class="panel-title">{{ $title }}</h5>
                </div>
                <div class="panel-body">     
                    <input-text name="name" id="name" :model='$model' required  />
                    <input-select name="univer_id" id="univer_id" :model='$model' :dataar="$model->getUniverAr()" disabled />
                    <input-select name="degree_id" id="degree_id" :model='$model' :dataar="$model->getDegreeAr()" disabled />
                    
                    <input-show name="discipline_note" id="discipline_note" :model='$model'    />

                                        
                    <fieldset class="content-group">
                        <legend class="text-bold">@lang('model.programs.child_block')</legend>
                        
                        <div class="child_block">
                            @foreach($model->relChilds as $c)
                                <div class="row">
                                   
                                    @foreach ($sys_lang->getAr() as $k => $v) 
                                        <div class="col-md-6">
                                            <input type="text" name="child[note][{{ $k }}][]" value="{{ $c->getNote($k) }}" disabled  class="form-control" placeholder="Наименование дисциплины ({{ $v }})"  >
                                        </div>
                                    @endforeach
                                    <hr />
                                </div>
                            @endforeach
                        </div> 
                    
                        <input-textarea name="discipline_note" id="discipline_note" :model='$model'    />
                    </fieldset>


                    <show-detail-block :model="$model" />
                </div>
            </div>
        </div>
        <div class="col-md-2">  
            <trans-state-block :model="$model" :syslang="$sys_lang" />
        </div>
    </div>
@endsection