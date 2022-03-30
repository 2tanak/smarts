<style>
.global_select .select2-container--default .select2-selection--single{
	background:none;
}
</style>
<form style="margin:0;">
    <div class="global_select">
	
        <select class="js_flag_select  js-states form-control js_sort" name="sort_as">
		    <option value="">@lang('front_main.sort')</option>
            <option value="by_name_asc" {{ $request->sort_as == 'by_name_asc' ? 'selected' : '' }}>@lang('front_main.by_name_asc')</option>
            <option value="by_name_desc" {{ $request->sort_as == 'by_name_desc' ? 'selected' : '' }}> @lang('front_main.by_name_desc')</option>
            <option value="by_updated_asc" {{ $request->sort_as == 'by_updated_asc' ? 'selected' : '' }}>@lang('front_main.by_updated_asc')</option>
            <option value="by_updated_desc" {{ $request->sort_as == 'by_updated_desc' ? 'selected' : '' }}>@lang('front_main.by_updated_desc')</option>
            <option value="by_qs_desc" {{ $request->sort_as == 'by_qs_desc' ? 'selected' : '' }}>@lang('front_main.by_qs_desc')</option>
        </select>
    </div>

    @foreach ($request->all() as $k => $v)
        @if (in_array($k, ['page', 'sort_as']))
            @continue
        @endif

        @if (is_array($v))
            @foreach ($v as $k2 => $v2)
                <input type="hidden" name="{{ $k }}[]" value="{{ $v2 }}">
            @endforeach
        @else
            <input type="hidden" name="{{ $k }}" value="{{ $v }}">
        @endif

    @endforeach

</form>
