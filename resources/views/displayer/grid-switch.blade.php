<div class="bootstrap-switch-div" data-name="{{$elementName}}" data-open="{{$open}}" data-close="{{$close}}">
    <input type="checkbox" class="switch-m" {{$value?'checked':''}}>
    <form class="switch-m-form" action="{{$url}}" method="post">
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="{{$elementName}}" value="{{$value}}">
    </form>
</div>

<script require="@bootstrap-switch" init=".bootstrap-switch-div">
    let timer;
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
            updateValue(state)
        }
    });

    //美化边框
    function beautifyBorder() {
        const value = $this.find('input[name="' + $this.data('name') + '"]').val()
        const openColor = $this.data('open')
        let color = $this.data('close')
        if (parseInt(value) === 1) {
            color = openColor
        }
        $this.find('.bootstrap-switch').css('border-color', color)
        $this.find('.bootstrap-switch').css('background', color)
    }

    //更新切换的值
    function updateValue(state) {
        clearTimeout(timer)
        timer = setTimeout(function () {
            handleUpdateValue(state)
        }, 1000)
    }

    function handleUpdateValue(state) {
        Dcat.loading();
        let form = $this.find('.switch-m-form')
        form.find('input[name="' + $this.data('name') + '"]').val(state);
        beautifyBorder()
        Dcat.Form({
            form: form,
            success: function (response) {
                Dcat.success(response.data.message)
                Dcat.reload();
                return false
            },
            after: function () {
                Dcat.loading(false);
            }
        })
    }
</script>
