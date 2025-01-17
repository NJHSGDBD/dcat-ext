<?php

namespace NJHSGDBD\DcatExt;

use Dcat\Admin\Extend\ServiceProvider;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid\Column;
use NJHSGDBD\DcatExt\Form\SwitchModifyField;
use NJHSGDBD\DcatExt\Form\TextModifyField;
use NJHSGDBD\DcatExt\Grid\EditableModifyColumn;
use NJHSGDBD\DcatExt\Grid\SwitchModifyColumn;

class DcatExtServiceProvider extends ServiceProvider
{
    protected $js = [
        'js/index.js'
    ];
    protected $css = [
        'css/index.css'
    ];

    public function register()
    {
        //
    }

    public function init()
    {
        parent::init();

        #自定义表单文本输入框
        Form::extend('textM', TextModifyField::class);
        #自定义表单switch组件
        Form::extend('switchM', SwitchModifyField::class);

        #Grid添加自定义switch编辑
        Column::extend('switchM', SwitchModifyColumn::class);
        #Grid添加自定义switch编辑
        Column::extend('editableM', EditableModifyColumn::class);

        #bootstrap-switch插件
        Admin::asset()->alias('@bootstrap-switch', [
            'js'  => $this->formatAssetFiles(['js/bootstrap-switch.js']),
            'css' => $this->formatAssetFiles(['css/bootstrap-switch.css'])
        ]);
        #bootstrap-editable插件
        Admin::asset()->alias('@x-editable', [
            'js' => $this->formatAssetFiles(['js/bootstrap-editable.js']),
        ]);
    }

    public function settingForm()
    {
        return new Setting($this);
    }
}
