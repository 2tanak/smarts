@extends('admin::layout')

@section('title', $title)

@section('content')
<div class="row">
    <disclaymer :model="$model" type="index" />  
    <form  method="get" >
		<filter >
			<slot name="top_line">
				<div class="row">
					<div class="col-md-3">
						<input-int name="id" :model="$model" :value="$request->id" />
					</div>
					<div class="col-md-9">
						<input-text name="name" :model="$model" :value="$request->name" />
					</div>
				</div>
			</slot>
		</filter>
	</form>
	<div class="col-md-12">
		<div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title">{{ $title }}</h5>
            </div>
			<table class="table table-togglable">
				<thead>
					<tr>
						<th >{{ $model->getLabel('id') }}</th>
						<th >{{ $model->getLabel('user_id') }}</th>
						<th >{{ $model->getLabel('status_id') }}</th>
						<th >{{ $model->getLabel('note') }}</th>
						<th data-breakpoints="all">{{ $model->getLabel('created_at') }}</th>
						<th data-breakpoints="all">{{ $model->getLabel('updated_at') }}</th>
						<th>
							
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($items as $i)
						<tr>
							<td>{{ $i->id }}</td>
							<td>{{ $i->user_name }}</td>
							<td>{{ $i->status_name }}</td>
							<td>{{ $i->note }}</td>
							<td>{{ $i->created_cool }}</td>
							<td>{{ $i->updated_cool }}</td>
							<th>
								<div class="btn-group">
									<button type="button" class="btn  btn-primary btn-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										<i class="icon-menu7"></i> 
									</button>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="{{ route($route_path.'_show', $i) }}">@lang('main.show') </a></li>
										<li>
										@if($i->status_id == 1 || $i->status_id == 3)
										<a href="{{ route($route_path.'_accept', $i) }}">@lang('main.accept') </a>
										@endif
										@if($i->status_id == 2)
										<a href="{{ route($route_path.'_accept', $i) }}">@lang('main.accept_4') </a>
										@endif
									
										
										</li>
										<li class="divider"></li>
										<li><a href="{{ route($route_path.'_delete', $i) }}">@lang('main.delete')</a></li>
									</ul>
								</div>
							</th>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="panel-footer text-right">
				{!! $items->appends($request->all())->links() !!}
			</div>
		</div>
	</div>
</div>
@endsection
