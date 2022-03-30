@extends('admin::layout')

@section('title', $title)

@section('content')
    <div class="row">
		<disclaymer :model="$model" type="show" />    

        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
				    <h6 class="panel-title">{{ $title }}</h5>
                </div>
                <div class="panel-body">
                    <input-show name="user_id" :model="$model" :value="$model->user_name"  />
                    <input-show name="univer_id" :model="$model" :value="$model->univer_name"  />
                    <input-show name="program_id" :model="$model" :value="$model->program_name"  />
                    <input-show name="name" :model="$model"  />
                    <input-show name="note" :model="$model"  />
                    <input-show name="tags" :model="$model" :value="$model->tags_str"  />
                    <input-show name="status_id" :model="$model" :value="$model->status_name"  />

                    <show-detail-block :model="$model" />
                </div>
            </div>
        </div>
    </div>
@endsection