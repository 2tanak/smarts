<div class="community-card">
    <div class="__head">
        <div class="__user">
            <div class="__img" style="background: url({{ fileLink($model->relUser->photo) }})"></div>
            <p>{{ $model->relUser->name }}</p>
        </div>
        <p class="__date">{{ $model->created_at }}</p>
    </div>
    <div class="__body">
        <p>{!! $model->note !!}</p>
    </div>
</div>