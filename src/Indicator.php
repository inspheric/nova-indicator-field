<?php

namespace Inspheric\Fields;

use Laravel\Nova\Fields\Field;

class Indicator extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'indicator';

    /**
     * Specify the values and classes that should be displayed.
     *
     * @param  array  $statuses
     * @return $this
     */
    public function statuses(array $statuses)
    {
        return $this->withMeta(['statuses' => $statuses]);
    }

    /**
     * The label to display when the value is not one of the defined statuses.
     *
     * @param  string $label
     * @return $this
     */
    public function unknown(string $label)
    {
        return $this->withMeta(['unknownLabel' => $label]);
    }
}
