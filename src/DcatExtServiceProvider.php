<?php

namespace NJHSGDBD\DcatExt;

use Dcat\Admin\Extend\ServiceProvider;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use NJHSGDBD\DcatExt\Form\TextModifyField;

class DcatExtServiceProvider extends ServiceProvider
{
	protected $js = [
        'js/index.js',
    ];
	protected $css = [
		'css/index.css',
	];

	public function register()
	{
		//
	}

	public function init()
	{
		parent::init();

		//
        #自定义表单文本输入框
        Form::extend('textM2', TextModifyField::class);
	}

	public function settingForm()
	{
		return new Setting($this);
	}
}
