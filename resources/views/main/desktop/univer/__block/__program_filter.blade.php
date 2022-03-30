<form  method="get" >
    <div class="univerProgramHeader">

        <label class="univerProgramHeaderItem">
            <div class="univerProgramHeaderItemTop">
                {{ $program->getLabel('name') }}
            </div>
            <input-text-filter-front name="name" :model="$program" :value="$request->name"  :class="'univerProgramHeaderItemInput global_input'" />
        </label>

        <label class="univerProgramHeaderItem">
            <div class="univerProgramHeaderItemTop">
                {{ $program->getLabel('degree_id') }}
            </div>
            <div class="global_select mb-2">
                <input-multi-select-filter-front name="degree_id[]" id="degree_id" :model="$program" :dataar="$program->getDegreeAr()" :value="$request->degree_id"   :class="'select2 js-states form-control'" />
            </div>
        </label>

        <label class="univerProgramHeaderItem">
            <div class="univerProgramHeaderItemTop">
                {{ $program->getLabel('discipline_id[]') }}
            </div>
            <div class="global_select mb-2">
                <input-multi-select-filter-front name="discipline_id[]" id="discipline_id" :model='$program' :value='$request->discipline_id' :dataar="$program->getDisciplineAr()" :class="'select2 js-states form-control'" />
            </div>
        </label>
        <label class="univerProgramHeaderItem">
            <div class="univerProgramHeaderItemTop">
                </br>
            </div>
            <div class="global_select mb-2">
                <input type="submit" class="btn button_green" value=@lang('main.filter_accept_link')>
            </div>
        </label>
        <label class="univerProgramHeaderItem">
            <div class="univerProgramHeaderItemTop">
                </br>
            </div>
            <div class="global_select mb-2">
                <a href="?clear_filter=1" class="btn button_yellow">@lang('main.filter_clear_link')</a>
            </div>
        </label>
    </div>
    <!-- <div class="clearfix"></div>
    <div class="col-md-12">
        <a href="?clear_filter=1" class="btn btn-sm btn-warning col-md-4 pull-left">@lang('main.filter_clear_link')</a>
    </div> -->
</form>

<!--
<div class="col-md-12">
    <div class="univerProgramFilterList">
        <div class="univerProgramFilterItem">
            <div class="univerProgramFilterItemText">
                Бакалавриат
            </div>
            <button class="univerProgramFilterItemClose" style="background: url({{asset('images/icons/close.png')}}) no-repeat center/cover"></button>
        </div>
        <div class="univerProgramFilterItem">
            <div class="univerProgramFilterItemText">
                Архитектура
            </div>
            <button class="univerProgramFilterItemClose" style="background: url({{asset('images/icons/close.png')}}) no-repeat center/cover"></button>
        </div>
    </div>
</div>
</br></br>
-->
<div class='clearfix'></div>


