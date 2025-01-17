<div class="editable-m h-100 d-flex align-items-center">
    <a class="text-md" style="border-bottom: dashed 1px #0088cc;" data-name="{{$elementName}}">
        {{$value}}
    </a>
    <form class="editable-m-form" action="{{$url}}" method="post">
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="{{$elementName}}" value="{{$value}}">
    </form>
</div>
<script require="@x-editable" init=".editable-m">
    $this.find('a').editable({
        type: "text",                //编辑框的类型。支持text|textarea|select|date|checklist等
        disabled: false,             //是否禁用编辑
        inputclass: 'w-100 pl-0 text-md',
        showbuttons: false,
        emptytext: "未填写",          //空值的默认文本
        mode: "inline",              //编辑框的模式：支持popup和inline两种模式，默认是popup
        validate: function (value) { //字段验证
            if (!$.trim(value)) {
                return '不能为空';
            }
        },
        url: function (params) {
            let form = $(this).closest('td').find('.editable-m-form')
            form.find('input[name="' + $(this).data('name') + '"]').val(params.value);
            Dcat.Form({
                form: form,
                success: function (response) {
                    Dcat.success(response.data.message)
                    Dcat.reload();
                    return false
                }
            })
        }
    });
    $this.on('click', function (e) {
        if (e.target === this) {
            $this.find('a').editable('show');
        }
        e.stopPropagation();
    })
</script>
