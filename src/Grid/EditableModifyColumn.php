<?php

namespace NJHSGDBD\DcatExt\Grid;

use Dcat\Admin\Grid\Displayers\AbstractDisplayer;
use Throwable;

class EditableModifyColumn extends AbstractDisplayer
{
    /**
     * @throws Throwable
     */
    public function display(): string
    {
        $value = $this->value;
        $elementName = $this->getElementName();
        $url = $this->resource() . '/' . $this->getKey();
        return admin_view('njhsgdbd.dcat-ext::displayer.grid-editable', compact('value', 'elementName',
            'url'));

    }

}
