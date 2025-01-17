<?php

namespace NJHSGDBD\DcatExt\Grid;

use Dcat\Admin\Admin;
use Dcat\Admin\Grid\Displayers\AbstractDisplayer;
use Throwable;

class SwitchModifyColumn extends AbstractDisplayer
{
    /**
     * @throws Throwable
     */
    public function display(): string
    {
        $this->style();
        $open = '#5cb85c';
        $close = '#d9534f';
        $value = $this->value ? 1 : 0;
        $elementName = $this->getElementName();
        $url = $this->resource() . '/' . $this->getKey();
        return admin_view('njhsgdbd.dcat-ext::displayer.grid-switch', compact('value', 'elementName',
            'url', 'open', 'close'));

    }

    public function style()
    {
        Admin::style(<<<CSS
.bootstrap-switch-nowrap span{
    white-space: nowrap;
}
.bootstrap-switch-handle-off,.bootstrap-switch-handle-on{
    font-size: 9px !important;
    font-weight: bold;
}
CSS
        );
    }

}
