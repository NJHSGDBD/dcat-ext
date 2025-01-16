<div class="{{$viewClass['form-group']}}">

    <div class="{{$viewClass['label']}} control-label">
        <span>{!! $label !!}</span>
    </div>

    <div class="{{$viewClass['field']}}">

        <input {!! $attributes !!} />
        @include('admin::form.error')
        @include('admin::form.help-block')

    </div>
</div>
