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
                <input-select-filter-front name="degree_id" :model="$program" :dataar="$program->getDegreeAr()" :value="$request->degree_id"   :class="'select2 js-states form-control'" />
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
        <input type="submit" class="btn button_green" value=@lang('main.filter_accept_link')>
        <a href="?clear_filter=1" class="btn button_yellow">@lang('main.filter_clear_link')</a>
    </div>
    <div class="clearfix"></div>
</form>
<div class='clearfix'></div>


