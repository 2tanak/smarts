<div class="community-card">
    <div class="__head">
        <div class="__user">
            <div class="__img" style="background: url({{ fileLink($model->relUser->photo) }})"></div>
            <p>{{ $model->relUser->name }}</p>
        </div>
        <p class="__date">{{ $model->created_at }}</p>
    </div>
    <div class="__body">
        <a href="{{ lroute('univer_view_comuna_detail', [$model->univer_id, $model->id]) }}">{{ $model->name }}</a>
        <p>{!! $model->note !!}</p>
    </div>

    @if (!isset($off_foter))
        <div class="__footer">
            <a href="{{ lroute('univer_view_comuna_detail', [$model->univer_id, $model->id]) }}">
                <p class="__comment"><img src="/images/icons/comment.png" alt=""> {{ $model->relMessages()->accepted()->count() }} @lang('front_main.comuna.comments') </p>
            </a>
            <div class="__tags">
                <p>@lang('front_main.comuna.tags'): </p>
                <ul>
                    @foreach ($model->tags_ar as $t)
                        <li>
                            <p>{{ trans('front_main.comuna.tag_'.$t) }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>
