<div class="{{$viewClass['form-group']}}">

    <label class="{{$viewClass['label']}} control-label">{{$label}}</label>

    <div class="{{$viewClass['field']}}">


        <div {!! $attributes !!}>
            <input type="checkbox" class="switch-m" {{$value?'checked':''}}>
        </div>


        <input type="hidden" name="{{$name}}" value="{{ old($column, $value) }}"/>

        @include('admin::form.error')
        @include('admin::form.help-block')

    </div>
</div>

<!-- script标签加上 "init" 属性后会自动使用 Dcat.init() 方法动态监听元素生成 -->
<script require="@bootstrap-switch" init="{!! $selector !!}">
    $this.find('.switch-m').bootstrapSwitch({
        onText: '开启',
        offText: '关闭',
        onColor: 'success',
        offColor: 'danger',
        size: 'small',
        wrapperClass: 'nowrap',
        onInit: function () {
            beautifyBorder()
        },
        onSwitchChange: function (event, state) {
            if (state === true) {
                state = 1;
            } else {
                state = 0;
            }
            $this.parents('.form-field').find('input[type="hidden"]').val(state);
            beautifyBorder()
        }
    });

    //美化边框
    function beautifyBorder() {
        const value = $this.parents('.form-field').find('input[type="hidden"]').val()
        const openColor = $this.data('open')
        let color = $this.data('close')
        if (parseInt(value) === 1) {
            color = openColor
        }
        $this.find('.bootstrap-switch').css('border-color', color)
        $this.find('.bootstrap-switch').css('background', color)
    }
</script>
