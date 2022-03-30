<div class="row">
    <div class="col-md-4">
        <input-select name="city_id" id="city_id" :model='$model' :dataar="$model->getCityAr()" required />
    </div>
    <div class="col-md-4">
	<input-text name="name" id="name" :model='$model' required/>
		  
    </div>
    <div class="col-md-4">
        <input-text name="origin_name" id="name" :model='$model' required/>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <input-photo name="logotip" id="logotip" :model='$model'   />
    </div>
    <div class="col-md-4">
        <input-int name="rank_word" id="rank_word" :model='$model'   />
    </div>
    <div class="col-md-4">
        <input-int name="rank_local" id="rank_local" :model='$model'   />
    </div>

    <div class="col-md-4">
        <input-int name="rank_unikum" id="rank_unikum" :model='$model' :checkval="route('admin_uni_check_rank').'?id='.$model->id.'&&rank_unikum='" />
    </div>
</div>

<div class="row" >
    <div class="col-md-12">
        @if($model->relCats)
            <input-select name="cat_id" id="cat_id" :model='$model->relCats' :value='$model->relCats->cat_id' :dataar="$model->getCatAr()"  />
        @else
            <input-select name="cat_id" id="cat_id" :model='$model' :value='$model' :dataar="$model->getCatAr()"  />
        @endif
    </div>
    <div class="col-md-12">
        <input-multi-select name="lang_id[]" id="lang_id" :model='$model' :value='$model->ar_lang_id' :dataar="$model->getLangAr()"  />
    </div>
</div>


<fieldset class="content-group">
    <legend class="text-bold">@lang('model.university.detail_data')</legend>
    <div class="row">
        <div class="col-md-6">
            <input-text name="web_sait" id="web_sait" :model='$model->getRelDataObj()' group='data'   />
        </div>
        <div class="col-md-6">
            <input-text name="sait_priem" id="sait_priem" :model='$model->getRelDataObj()' group='data'   />
        </div>
        
        <div class="col-md-6">
            <input-text name="address_off" id="address_off" :model='$model->getRelDataObj()' group='data'   />
        </div>
        <div class="col-md-6">
            <input-text name="address_legal" id="address_legal" :model='$model->getRelDataObj()' group='data'   />
        </div>
        <div class="col-md-6">
            <input-text name="phones" id="phones" :model='$model->getRelDataObj()' group='data'   />
        </div>
        <div class="col-md-6">
            <input-email name="email" id="email" :model='$model->getRelDataObj()' group='data'   />
        </div>
		
        <div class="col-md-12" style='border:1px solid white'>
            <input-textarea name="about_text" id="about_text" :model='$model->getRelDataObj()' group='data'   />
            <input-textarea name="student_life_text" id="student_life_text" :model='$model->getRelDataObj()' group='data'   />
        </div>
		
        <div class="col-md-4">
            <input-bool name="is_campus" id="is_campus" :model='$model->getRelDataObj()' group='data'   />
        </div>
        <div class="col-md-4">
            <input-bool name="is_library" id="is_library" :model='$model->getRelDataObj()' group='data'   />
        </div>
        <div class="col-md-4">
            <input-bool name="is_career" id="is_career" :model='$model->getRelDataObj()' group='data'   />
        </div>
        <div class="col-md-4">
            <input-bool name="is_clubs" id="is_clubs" :model='$model->getRelDataObj()' group='data'   />
        </div>
        <div class="col-md-4">
            <input-bool name="is_med_insurance" id="is_med_insurance" :model='$model->getRelDataObj()' group='data'   />
        </div>
        <div class="col-md-4">
            <input-bool name="is_inter_programm" id="is_inter_programm" :model='$model->getRelDataObj()' group='data'   />
        </div>
    </div>
</fieldset>


<fieldset class="content-group" >
    <legend class="text-bold">@lang('model.university.dormitory')</legend>
                                
    <label class="checkbox-inline" >
        <input type="checkbox" name="has_dormitory" id="has_dormitory" value="1" {{ $model->relDormitory ? 'checked' : '' }}> {{ $model->getLabel('has_dormitory') }} 
    </label>
    <div class="row js_dormitory_block">
        <div class="col-md-6">
            <input-int name="cost_min"  :model='$model->getRelDormitory()' group='dormitory'  />
        </div>
        <div class="col-md-6">
            <input-int name="cost_max" :model='$model->getRelDormitory()' group='dormitory'  />
        </div>
    </div>
    <div class="row js_dormitory_block" >
        <div class="col-md-12">
            <input-textarea name="note" :model='$model->getRelDormitory()'  group='dormitory' />
        </div>
    </div>
</fieldset>

<fieldset class="content-group" >
    <legend class="text-bold">@lang('model.university.stat_block')</legend>
    <div class="row">
        <div class="col-md-4">
            <input-int name="num_student_total" id="num_student_total" :model='$model->relStat' group='stat'   />
        </div>
        <div class="col-md-4">
            <input-int name="num_student_citizen" id="num_student_citizen" :model='$model->relStat' group='stat'   />
        </div>
        <div class="col-md-4">
            <input-int name="num_student_inter" id="num_student_inter" :model='$model->relStat' group='stat'   />
        </div>
        <div class="col-md-4">
            <input-int name="num_teacher_total" id="num_teacher_total" :model='$model->relStat' group='stat'   />
        </div>
        <div class="col-md-4">
            <input-int name="num_teacher_citizen" id="num_teacher_citizen" :model='$model->relStat' group='stat'   />
        </div>
        <div class="col-md-4">
            <input-int name="num_teacher_inter" id="num_teacher_inter" :model='$model->relStat' group='stat'   />
        </div>
    </div>
</fieldset>

<fieldset class="content-group">
    <legend class="text-bold">@lang('model.university.fees_block')</legend>
    <div class="row">
        @foreach ($model->getDegreeAr() as $id=>$name)
            <div class="col-md-4">
                {{ $name }}
            </div>
            <div class="col-md-4">
                <input-int name="for_citizen_min" id="for_citizen_min" :model='$model->getRelFeeObj($id)' :group='"fee[".$id."]"'   />
            </div>
            <div class="col-md-4">
                <input-int name="for_inter_min" id="for_inter_min" :model='$model->getRelFeeObj($id)' :group='"fee[".$id."]"'   />
            </div>
        @endforeach
    </div>
</fieldset>

<fieldset class="content-group">
    <legend class="text-bold">@lang('model.university.social')</legend>
    <div class="row">
        <div class="col-md-3">
            <input-text name="instagram" id="instagram" :model='$model->getRelSocialObj()' group='social'   />
        </div>
        <div class="col-md-3">
            <input-text name="facebook" id="facebook" :model='$model->getRelSocialObj()' group='social'   />
        </div>
        <div class="col-md-3">
            <input-text name="twitter" id="twitter" :model='$model->getRelSocialObj()' group='social'   />
        </div>
        <div class="col-md-3">
            <input-text name="youtube" id="youtube" :model='$model->getRelSocialObj()' group='social'   />
        </div>
    </div>
</fieldset>


<fieldset class="content-group">
    <legend class="text-bold">@lang('model.university.deadline_block')</legend>
    <div class="dormitory_block_hidden">
        <div class="row">
            @foreach ($sys_lang->getAr() as $k => $v) 
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Дата '{{ $v }}'</label>   
                        <input type="text" name="deadline[date][{{ $k }}][]"   class="form-control"  >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Текст '{{ $v }}'</label>   
                        <input type="text" name="deadline[note][{{ $k }}][]"   class="form-control"  >
                    </div>
                </div>
            @endforeach
            
            <input type="button" class="btn btn-warning btn-block btn-xs dormitory_block_remove" id="" value="Удалить">
            <hr/>
        </div>
    </div>
    <div class="dormitory_block">
        <input type="button" class="btn btn-info btn-block btn-xs" id="dormitory_block_add" value="Добавить">
        @foreach($model->relDeadLineApps as $app)
            <div class="row">
                @foreach ($sys_lang->getAr() as $k => $v) 
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Дата '{{ $v }}'</label>   
                            <input type="text" name="deadline[date][{{ $k }}][]" value="{{ $app->getDate($k) }}"   class="form-control"  >
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Текст '{{ $v }}'</label>   
                            <input type="text" name="deadline[note][{{ $k }}][]"   class="form-control" value="{{ $app->getNote($k) }}"  >
                        </div>
                    </div>
                @endforeach
                
                <input type="button" class="btn btn-warning btn-block btn-xs dormitory_block_remove" id="" value="Удалить">
                <hr/>
            </div>
        @endforeach
    </div>  
   
</fieldset>



<fieldset class="content-group">
    <legend class="text-bold">@lang('model.university.requirement_block')</legend>
    <div class="requirement_block_hidden">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Требование </label>   
                    <select name="requirement[requirement_id][]" class="form-control  ">
                        @foreach ($model->getRequirementAr() as $k => $v)
                            <option value="{{ $k }}">{{ $v }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @foreach ($sys_lang->getAr() as $k => $v) 
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Текст '{{ $v }}'</label>   
                        <input type="text" name="requirement[note][{{ $k }}][]"   class="form-control"  >
                    </div>
                </div>
            @endforeach
            
            <input type="button" class="btn btn-warning btn-block btn-xs requirement_block_remove" id="" value="Удалить">
            <hr/>
        </div>
    </div>
    <div class="requirement_block">
        <input type="button" class="btn btn-info btn-block btn-xs" id="requirement_block_add" value="Добавить">
        @foreach($model->relRequirements as $req)
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Требование </label>   
                        <select name="requirement[requirement_id][]" class="form-control  ">
                            @foreach ($model->getRequirementAr() as $k => $v)
                                <option value="{{ $k }}" {{ $req->requirement_id == $k ? 'selected' : '' }}>{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @foreach ($sys_lang->getAr() as $k => $v) 
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Текст '{{ $v }}'</label>   
                            <input type="text" name="requirement[note][{{ $k }}][]"  value="{{ $req->getNote($k) }}"  class="form-control"  >
                        </div>
                    </div>
                @endforeach
                
                <input type="button" class="btn btn-warning btn-block btn-xs requirement_block_remove" id="" value="Удалить">
                <hr/>
            </div>
        @endforeach
    </div>  
</fieldset>


<fieldset class="content-group">
    <legend class="text-bold">@lang('model.university.coor_block')</legend>
    <div class="row">
        <div class="col-md-12">
            <div id='map' style="width: 100%; height: 300px;" ></div>
        </div>
        <input type="hidden" name="data[coor]" value="{{ $model->getRelDataObj()->coor }}" id="data_coor">
    </div>  
</fieldset>














@section('js_block')
	@parent
    <script type="text/javascript" src="//api-maps.yandex.ru/2.1/?lang=ru-RU" ></script>
	
    <script >
        $(document).ready(function () {
            $('.requirement_block_hidden').hide();

            $('#requirement_block_add').click(function(){
                var html = $('.requirement_block_hidden').html();
                $('.requirement_block').append(html);
            });

            $( ".requirement_block" ).on( "click", ".requirement_block_remove", function() {
                
                $(this).parent().remove();
            });

            $('.dormitory_block_hidden').hide();

            $('#dormitory_block_add').click(function(){
                var html = $('.dormitory_block_hidden').html();
                $('.dormitory_block').append(html);
            });

            $( ".dormitory_block" ).on( "click", ".dormitory_block_remove", function() {
                
                $(this).parent().remove();
            });

            function showDormitory(){
                if ($("#has_dormitory").is(':checked'))
                    $('.js_dormitory_block').show();
                else 
                    $('.js_dormitory_block').hide();
            }

            $('.js_dormitory_block').hide();
            showDormitory();
            $('#has_dormitory').change(function(){
                showDormitory();
            });


            function calcTotalStudent(){
                let st_1 = parseInt($('#num_student_citizen').val());
                let st_2 = parseInt($('#num_student_inter').val());
                
                if (isNaN(st_1))
                    st_1 = 0;
                if (isNaN(st_2))
                    st_2 = 0;

                $('#num_student_total').val(st_1 + st_2);
            }

            $('#num_student_citizen').change(function(){
                calcTotalStudent();
            });
            $('#num_student_inter').change(function(){
                calcTotalStudent();
            });

            
            function calcTotalTeacher(){
                let st_1 = parseInt($('#num_teacher_citizen').val());
                let st_2 = parseInt($('#num_teacher_inter').val());
                
                if (isNaN(st_1))
                    st_1 = 0;
                if (isNaN(st_2))
                    st_2 = 0;

                $('#num_teacher_total').val(st_1 + st_2);
            }

            $('#num_teacher_citizen').change(function(){
                calcTotalTeacher();
            });
            $('#num_teacher_inter').change(function(){
                calcTotalTeacher();
            });




            var myMap;
            ymaps.ready(init);
            var ar_coor = [];

            function init()
            {

                try {
                    ar_coor = JSON.parse($('#data_coor').val());
                } catch (err) {
                    ar_coor = [];
                }


                myMap = new ymaps.Map("map",{
                    center: [51.14345176, 71.44592914],
                    zoom: 3,
                    behaviors: ["default", "scrollZoom"]
                },
                {
                    balloonMaxWidth: 300
                });

                
                $.each( ar_coor, function( key, value ) {
                    myPlacemark = new ymaps.Placemark(value);
                    myPlacemark.unix_id = ar_coor.length - 1;
                    myMap.geoObjects.add(myPlacemark);

                    myPlacemark.events.add('click', function (e) {
                        var pl = e.get('target');

                        ar_coor.splice(pl.unix_id, 1);
                        myMap.geoObjects.remove(pl);

                        
                        $('#data_coor').val(JSON.stringify(ar_coor));
                    });
                    
                });


                myMap.events.add("click", function(e){
                    var coords = e.get("coords");

                    ar_coor.push([coords[0].toPrecision(10), coords[1].toPrecision(10)])
                    

                    myPlacemark = new ymaps.Placemark([coords[0].toPrecision(10), coords[1].toPrecision(10)]);
                    myPlacemark.unix_id = ar_coor.length - 1;
                    myMap.geoObjects.add(myPlacemark);
                

                    myPlacemark.events.add('click', function (e) {
                        var pl = e.get('target');

                        ar_coor.splice(pl.unix_id, 1);
                        myMap.geoObjects.remove(pl);

                        
                        $('#data_coor').val(JSON.stringify(ar_coor));
                    });

                    $('#data_coor').val(JSON.stringify(ar_coor));
                });

            }
        });
    </script>
@endsection


   
	
















