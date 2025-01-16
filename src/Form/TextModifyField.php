<?php

namespace NJHSGDBD\DcatExt\Form;

use Dcat\Admin\Form\Field\Text;

class TextModifyField extends Text
{
    public function view(): string
    {
        return 'njhsgdbd.dcat-ext::field.form-input';
    }

    public function noPadding(): static
    {
        $this->setFieldClass('p-0');
        return $this;
    }

    public function noSubmit()
    {
        $this->setElementName(' ');
        return $this;
    }
}
