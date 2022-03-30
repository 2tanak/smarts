@extends('admin::layout')

@section('title', $title)

@section('content')
    <div class="row">
		<disclaymer :model="$model" type="galary" />    

        <div class="col-md-10">
            <div class="panel panel-flat">
                <div class="panel-heading">
				    <h6 class="panel-title">Форма добавления</h5>  
                </div>
                <div class="panel-body">
                    <form action="{{ route('admin_uni_gal_save', $model) }}" method="post" enctype="multipart/form-data" class="need_validate_form " novalidate>
                        @foreach ($sys_lang->getAr() as $k => $v) 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Текст '{{ $v }}'</label>   
                                    <input type="text" name="note[{{ $k }}]"   class="form-control"  >
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-12">
                            <input-photo name="photo" id="photo" :model='$model'   />
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">@lang('main.button_save')</button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </div>
            </div>

            <div class="row">
                @foreach ($items as $i)
                    <div class="col-md-3">
                        <div class="panel panel-flat">
                            <div class="panel-body">
                                <img src="{{ fileLink($i->photo) }}" class="img-rounded img-responsive" alt="">
                                @foreach ($sys_lang->getAr() as $k => $v) 
                                    <p>
                                        Текст '{{ $v }}': {{ $i->getNote($k) }}
                                    </p>
                                @endforeach
                                <a href="{{ route('admin_uni_gal_delete', [$model, $i]) }}" class="btn btn-danger btn-sm">Удалить</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-2"> 
            @include('admin::page.univer.univer.__sidebar')
        </div>
    </div>
@endsection