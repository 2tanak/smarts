<input-text name="name" id="name" :model='$model' required  />

@if (!$request->lang || $request->lang == 'ru')
    <input-select name="univer_id" id="univer_id" :model='$model' :dataar="$model->getUniverAr()" required />
    <input-select name="degree_id" id="degree_id" :model='$model' :dataar="$model->getDegreeAr()" required />
    <input-multi-select name="discipline_id[]" id="discipline_id" :model='$model' :value='$model->ar_discipline_id' :dataar="$model->getDisciplineAr()"  />


    <fieldset class="content-group">
        <legend class="text-bold">@lang('model.programs.child_block')  <input type="button" class="btn btn-info pull-right btn-xs" id="child_block_add" value="Добавить дисциплину"> </legend>
        <div class="child_block_hidden">
            <div class="row">
                <div class="col-md-10">
                    @foreach ($sys_lang->getAr() as $k => $v) 
                        <div class="col-md-6">
                            <input type="text" name="child[note][{{ $k }}][]"   class="form-control" placeholder="Наименование дисциплины ({{ $v }})"  >
                        </div>
                    @endforeach
                </div>
                <div class="col-md-2">
                    <input type="button" class="btn btn-warning btn-block btn-xs child_block_remove" id="" value="Удалить">
                </div>
                <hr />
            </div>
        </div>
        <div class="child_block">
            @foreach($model->relChilds as $c)
                <div class="row">
                    <div class="col-md-10">
                        @foreach ($sys_lang->getAr() as $k => $v) 
                            <div class="col-md-6">
                                <input type="text" name="child[note][{{ $k }}][]" value="{{ $c->getNote($k) }}"  class="form-control" placeholder="Наименование дисциплины ({{ $v }})"  >
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-2">
                        <input type="button" class="btn btn-warning btn-block btn-xs child_block_remove" id="" value="Удалить">
                    </div>
                    <hr />
                </div>
            @endforeach
        </div> 
    
        <input-textarea name="discipline_note" id="discipline_note" :model='$model'    />
    </fieldset>
@else 
    <input-textarea name="discipline_note" id="discipline_note" :model='$model'    />
@endif



@section('js_block')
	@parent
    <script type="text/javascript" src="//api-maps.yandex.ru/2.1/?lang=ru-RU" ></script>
	
    <script >
        $(document).ready(function () {
            $('.child_block_hidden').hide();

            $('#child_block_add').click(function(){
                var html = $('.child_block_hidden').html();
                $('.child_block').append(html);
            });

            $( ".child_block" ).on( "click", ".child_block_remove", function() {
                $(this).parent().parent().remove();
            });
        });
    </script>
@endsection


   
	
















