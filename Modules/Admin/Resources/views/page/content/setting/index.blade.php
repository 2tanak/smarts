@extends('admin::layout')

@section('title', $title)

@section('content')
    <div class="row">
		<disclaymer :model="$model" type="index" />   
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">{{ $title }}</h5>
                </div>
                <div class="panel-body">
                    <form action="{{ route($route_path.'_save') }}" method="post" enctype="multipart/form-data" class="need_validate_form " novalidate>
                        <input-text name="twitter" :model='$model'   />
                        <input-text name="insta" :model='$model'    />
                        <input-text name="facebook" :model='$model'   />
                        <input-text name="youtube" :model='$model'    />

                        <input-text name="meta_note_ar[ru]" :model='$model' :value="$model->getMetaNote('ru')" required  />
                        <input-text name="meta_note_ar[en]" :model='$model' :value="$model->getMetaNote('en')" required  />

                        <input-text name="meta_key_word_ar[ru]" :model='$model' :value="$model->getMetaKeyWord('ru')" required  />
                        <input-text name="meta_key_word_ar[en]" :model='$model' :value="$model->getMetaKeyWord('en')" required  />
                        
                        <button type="submit" class="btn btn-primary pull-right">@lang('main.button_save')</button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection