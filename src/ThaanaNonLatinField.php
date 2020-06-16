<?php

namespace Aiman\ThaanaLatinField;

use Laravel\Nova\Element;
use Laravel\Nova\Fields\Field;

class ThaanaNonLatinField extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'thaana-non-latin-field';

    public function convert($latinField = 'latin'): Element
    {
        return $this->withMeta([
            'latin' => $latinField,
        ]);
    }
}
